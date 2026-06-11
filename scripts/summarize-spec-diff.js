#!/usr/bin/env node
/**
 * Collapse oasdiff JSON into a human-readable, narrative changelog suitable
 * for use as a changeset summary.
 *
 * Reads oasdiff `changelog -f json` output from argv[2], writes markdown to
 * stdout. Empty output (no spec changes) is signalled by exit code 0 with no
 * bytes written.
 */
const fs = require('fs');

const PROP_PATH = /`([^`]+)`/g;
const SCHEMA_REF = /#\/components\/schemas\/([A-Za-z0-9_]+)/g;
const ALL_OF_PARENT_RE = /to the `([^`]*)` (?:request|response) property `allOf` list/;
const COMPOSITION_RX = /(oneOf|anyOf|allOf)\[[^\]]*\]/g;

const ALL_OF_ADDED_IDS = new Set([
    'response-property-all-of-added', 'request-property-all-of-added',
    'response-body-all-of-added',     'request-body-all-of-added',
]);
const TYPE_CHANGED_IDS = new Set([
    'response-property-type-changed', 'request-property-type-changed',
]);
const REMOVED_IDS = new Set([
    'response-required-property-removed', 'response-optional-property-removed',
    'request-property-removed',
]);
const ENUM_IDS = new Set([
    'request-property-enum-value-added', 'response-property-enum-value-added',
    'request-property-enum-value-removed', 'response-property-enum-value-removed',
    'request-parameter-enum-value-added', 'request-parameter-enum-value-removed',
]);

// Map oasdiff change-type IDs onto display verbs and a target bucket.
// Each value: [verb, side, bucket]
//   side = "request" | "response" | null
//   bucket = "added" | "removed" | "changed" | "deprecated" | "endpoint"
const RULES = new Map([
    ['api-path-added',            ['Added endpoint',   null, 'endpoint']],
    ['api-operation-added',       ['Added operation',  null, 'endpoint']],
    ['endpoint-added',            ['Added endpoint',   null, 'endpoint']],
    ['api-path-removed',          ['Removed endpoint', null, 'endpoint']],
    ['api-operation-removed',     ['Removed operation',null, 'endpoint']],
    ['api-schema-removed',        ['Removed schema',   null, 'removed']],

    ['request-property-added',            ['Added',          'request',  'added']],
    ['new-required-request-property',     ['Added required', 'request',  'added']],
    ['new-optional-request-property',     ['Added optional', 'request',  'added']],
    ['response-required-property-added',  ['Added required', 'response', 'added']],
    ['response-optional-property-added',  ['Added optional', 'response', 'added']],

    ['request-property-removed',                ['Removed',          'request',  'removed']],
    ['response-required-property-removed',      ['Removed required', 'response', 'removed']],
    ['response-optional-property-removed',      ['Removed optional', 'response', 'removed']],

    ['request-property-became-required',  ['Made required',  'request',  'changed']],
    ['request-property-became-optional',  ['Made optional',  'request',  'changed']],
    ['response-property-became-required', ['Made required',  'response', 'changed']],
    ['response-property-became-optional', ['Made optional',  'response', 'changed']],
    ['request-property-became-nullable',  ['Made nullable',  'request',  'changed']],
    ['response-property-became-nullable', ['Made nullable',  'response', 'changed']],

    ['request-property-type-changed',         ['Type changed',    'request',  'changed']],
    ['response-property-type-changed',        ['Type changed',    'response', 'changed']],
    ['request-property-pattern-changed',      ['Pattern changed', 'request',  'changed']],
    ['response-property-pattern-changed',     ['Pattern changed', 'response', 'changed']],
    ['request-property-default-value-added',  ['Default added',   'request',  'changed']],
    ['response-property-default-value-added', ['Default added',   'response', 'changed']],

    ['request-property-became-enum', ['Restricted to enum', 'request', 'changed']],

    ['new-optional-request-parameter', ['Added optional parameter', 'request', 'added']],
    ['new-required-request-parameter', ['Added required parameter', 'request', 'added']],
    ['request-parameter-added',        ['Added parameter',          'request', 'added']],
    ['request-parameter-removed',      ['Removed parameter',        'request', 'removed']],

    ['request-body-any-of-added',                    ['Added union member',             'request',  'added']],
    ['response-body-any-of-added',                   ['Added union member',             'response', 'added']],
    ['request-property-one-of-added',                ['Added discriminator variant',    'request',  'added']],
    ['response-property-one-of-added',               ['Added discriminator variant',    'response', 'added']],
    ['request-property-one-of-removed',              ['Removed discriminator variant',  'request',  'removed']],
    ['response-property-one-of-removed',             ['Removed discriminator variant',  'response', 'removed']],
    ['request-property-any-of-added',                ['Added union member',             'request',  'added']],
    ['request-property-any-of-removed',              ['Removed union member',           'request',  'removed']],
    ['response-body-discriminator-mapping-changed',  ['Discriminator mapping changed',  'response', 'changed']],
    ['request-body-discriminator-mapping-changed',   ['Discriminator mapping changed',  'request',  'changed']],
    ['request-property-discriminator-mapping-added', ['Discriminator mapping added',    'request',  'changed']],
    ['response-property-discriminator-mapping-added',['Discriminator mapping added',    'response', 'changed']],

    ['request-optional-property-became-read-only',  ['Became read-only', 'request',  'changed']],
    ['response-optional-property-became-read-only', ['Became read-only', 'response', 'changed']],

    ['response-success-status-added',     ['Added success status',    'response', 'added']],
    ['response-non-success-status-added', ['Added error status',      'response', 'added']],
    ['response-success-status-removed',   ['Removed success status',  'response', 'removed']],
    ['response-non-success-status-removed',['Removed error status',   'response', 'removed']],
    ['response-media-type-added',         ['Added media type',        'response', 'added']],

    ['request-property-deprecated',  ['Deprecated', 'request',  'deprecated']],
    ['response-property-deprecated', ['Deprecated', 'response', 'deprecated']],
]);

function findAll(rx, text) {
    if (!text) return [];
    const out = [];
    for (const m of text.matchAll(new RegExp(rx.source, rx.flags))) out.push(m[1]);
    return out;
}

function leaf(path) {
    if (!path) return null;
    const cleaned = path.replace(COMPOSITION_RX, '');
    const parts = cleaned.split(/[\/.]/).filter(p => {
        if (!p) return false;
        if (p.startsWith('[')) return false;
        if (p.includes('#') || p.includes(']')) return false;
        return p !== 'items' && p !== '_embedded';
    });
    return parts.length ? parts[parts.length - 1] : path;
}

function deepestSchema(text) {
    const matches = findAll(SCHEMA_REF, text);
    return matches.length ? matches[matches.length - 1] : null;
}

function firstProp(text) {
    const refs = findAll(PROP_PATH, text);
    return refs.length ? refs[0] : null;
}

function enumValueAndProp(text) {
    const refs = findAll(PROP_PATH, text);
    if (refs.length >= 2) return [refs[0], refs[1]];
    return [refs[0] || '', ''];
}

function endpointOf(it) {
    const op = (it.operation || '').trim();
    const p = (it.path || '').trim();
    if (!p) return null;
    return op ? `\`${op} ${p}\`` : `\`${p}\``;
}

function parentOf(propPath) {
    if (!propPath) return '';
    const i = propPath.lastIndexOf('/');
    return i >= 0 ? propPath.slice(0, i) : '';
}

function parentFromText(text) {
    if (!text) return '';
    const m = text.match(ALL_OF_PARENT_RE);
    if (m) return m[1].replace(/\/$/, '');
    const refs = findAll(PROP_PATH, text);
    return refs.length ? refs[0].replace(/\/$/, '') : '';
}

function getOrCreate(map, key, factory) {
    let v = map.get(key);
    if (v === undefined) {
        v = factory();
        map.set(key, v);
    }
    return v;
}

function suppressCompositionNoise(data) {
    const suppressKeys = new Set();
    const composedSchemas = new Map();
    for (const it of data) {
        if (!ALL_OF_ADDED_IDS.has(it.id)) continue;
        const parent = parentFromText(it.text);
        const k = `${it.operation || ''}\x1f${it.path || ''}\x1f${parent}`;
        suppressKeys.add(k);
        const rec = getOrCreate(composedSchemas, k, () => ({ op: it.operation || '', path: it.path || '', parent, schemas: new Set() }));
        for (const s of findAll(SCHEMA_REF, it.text)) rec.schemas.add(s);
    }

    if (!suppressKeys.size) return data;

    const kept = [];
    for (const it of data) {
        if (REMOVED_IDS.has(it.id)) {
            const prop = firstProp(it.text) || '';
            const k = `${it.operation || ''}\x1f${it.path || ''}\x1f${parentOf(prop)}`;
            if (suppressKeys.has(k)) continue;
        }
        if (TYPE_CHANGED_IDS.has(it.id)) {
            const k = `${it.operation || ''}\x1f${it.path || ''}\x1f${parentFromText(it.text)}`;
            if (suppressKeys.has(k)) continue;
        }
        if (ALL_OF_ADDED_IDS.has(it.id)) continue;
        kept.push(it);
    }

    for (const { op, path, parent, schemas } of composedSchemas.values()) {
        const clean = [...schemas].filter(s => s && !s.startsWith('subschema')).sort();
        if (!clean.length) continue;
        kept.push({
            id: '__composition_refactor__',
            _parent: parent || '(root)',
            _schemas: clean,
            level: 1,
            operation: op,
            path,
        });
    }
    return kept;
}

function renderOne(verb, sides, leafName, schemas, breaking, bucket) {
    const schemaPart = schemas.size ? ` on \`${[...schemas].sort().join(', ')}\`` : '';
    const bk = breaking ? ' **(breaking)**' : '';
    if (bucket === 'endpoint') {
        return `- ${verb} \`${leafName}\`${bk}`;
    }
    let sideHint = '';
    if (sides.size === 1) {
        const only = [...sides][0];
        if (only) sideHint = ` (${only} only)`;
    }
    return `- ${verb} \`${leafName}\`${schemaPart}${sideHint}${bk}`;
}

const OTHER_VERBS = {
    'min-decreased':                  'Lowered minimum on',
    'min-increased':                  'Raised minimum on',
    'max-decreased':                  'Lowered maximum on',
    'max-increased':                  'Raised maximum on',
    'min-length-decreased':           'Shortened minimum length on',
    'min-length-increased':           'Raised minimum length on',
    'max-length-decreased':           'Shortened maximum length on',
    'max-length-increased':           'Raised maximum length on',
    'discriminator-mapping-added':    'Added discriminator mapping for',
    'discriminator-mapping-deleted':  'Removed discriminator mapping for',
    'discriminator-mapping-changed':  'Changed discriminator mapping for',
    'all-of-added':                   'Composed schema with',
    'all-of-removed':                 'Uncomposed schema from',
    'any-of-added':                   'Added union member to',
    'any-of-removed':                 'Removed union member from',
    'one-of-added':                   'Added discriminator variant to',
    'one-of-removed':                 'Removed discriminator variant from',
    'became-nullable':                'Made nullable',
    'became-not-nullable':            'Made not nullable',
    'default-value-added':            'Default added on',
    'default-value-removed':          'Default removed on',
    'min-items-decreased':            'Lowered minItems on',
    'max-items-decreased':            'Lowered maxItems on',
    'min-items-increased':            'Raised minItems on',
    'max-items-increased':            'Raised maxItems on',
};

function otherChangeFamily(id) {
    // Strip request/response/-body-/-property- prefixes and discriminator wrappers.
    return id
        .replace(/^(request|response)(-body|-property)?-/, '')
        .replace(/^(request|response)-/, '');
}

function recordEndpoint(rec, ep) {
    if (!ep || rec.endpoints.has(ep)) return;
    rec.endpoints.add(ep);
    if (rec.examples.length < 3) rec.examples.push(ep);
}

function main() {
    if (process.argv.length < 3) {
        console.error('Usage: node scripts/summarize-spec-diff.js <oasdiff.json>');
        process.exit(1);
    }
    let data = JSON.parse(fs.readFileSync(process.argv[2], 'utf8'));
    if (!Array.isArray(data)) data = Array.isArray(data?.changes) ? data.changes : [];
    if (!data.length) return;

    data = suppressCompositionNoise(data);

    const grouped = new Map();
    const enumRows = new Map();
    const refactorRows = new Map();
    const unknown = new Map();

    for (const it of data) {
        if (ENUM_IDS.has(it.id)) {
            const [value, prop] = enumValueAndProp(it.text);
            const verb = it.id.includes('added') ? 'added' : 'removed';
            const side = it.id.includes('request') ? 'request' : 'response';
            const key = `${verb}\x1f${leaf(prop) || '?'}`;
            const rec = getOrCreate(enumRows, key, () => ({
                verb, prop: leaf(prop) || '?',
                values: [], sides: new Set(), breaking: false, schemas: new Set(),
            }));
            if (value && !rec.values.includes(value)) rec.values.push(value);
            rec.sides.add(side);
            const sch = deepestSchema(it.text);
            if (sch) rec.schemas.add(sch);
            if ((it.level || 1) >= 3) rec.breaking = true;
            continue;
        }
        if (it.id === '__composition_refactor__') {
            const schemas = it._schemas;
            const key = `${it._parent}\x1f${schemas.join(',')}`;
            const rec = getOrCreate(refactorRows, key, () => ({
                parent: it._parent, schemas, endpoints: new Set(), examples: [],
            }));
            recordEndpoint(rec, endpointOf(it));
            continue;
        }
        const rule = RULES.get(it.id);
        if (!rule) {
            const prop = firstProp(it.text) || '';
            const leafName = leaf(prop);
            const family = otherChangeFamily(it.id);
            const key = `${family}\x1f${leafName || '?'}`;
            const rec = getOrCreate(unknown, key, () => ({
                family, leafName,
                sides: new Set(), schemas: new Set(), items: [],
            }));
            rec.sides.add(it.id.includes('request') ? 'request' : 'response');
            const sch = deepestSchema(it.text);
            if (sch) rec.schemas.add(sch);
            rec.items.push(it);
            continue;
        }
        const [verb, side, bucket] = rule;
        const prop = firstProp(it.text) || '';
        const leafName = leaf(prop) || it.text.slice(0, 50);
        const schema = deepestSchema(it.text);
        // Strip the request/response split: collapse same logical change.
        const baseVerb = verb.replace(/^Added (required|optional|union member|discriminator variant|parameter)$/, 'Added').replace(/^Removed (required|optional|union member|discriminator variant|parameter)$/, 'Removed');
        const key = `${bucket}\x1f${baseVerb}\x1f${leafName}`;
        const rec = getOrCreate(grouped, key, () => ({
            bucket, verb: baseVerb, leafName,
            schemas: new Set(), sides: new Set(), breaking: false,
        }));
        if (schema) rec.schemas.add(schema);
        if (side) rec.sides.add(side);
        if ((it.level || 1) >= 3) rec.breaking = true;
    }

    const sections = {
        endpoint:   '### Endpoints',
        added:      '### Added',
        removed:    '### Removed',
        changed:    '### Changed',
        deprecated: '### Deprecated',
    };
    const byCodePoint = (a, b) => (a < b ? -1 : a > b ? 1 : 0);
    const out = [];
    for (const bucket of ['endpoint', 'added', 'removed', 'changed', 'deprecated']) {
        const rows = [...grouped.values()].filter(r => r.bucket === bucket);
        if (!rows.length) continue;
        rows.sort((a, b) => {
            if (a.breaking !== b.breaking) return a.breaking ? -1 : 1;
            return byCodePoint(a.leafName, b.leafName);
        });
        out.push(sections[bucket]);
        for (const r of rows) out.push(renderOne(r.verb, r.sides, r.leafName, r.schemas, r.breaking, bucket));
        out.push('');
    }

    if (enumRows.size) {
        out.push('### Enum changes');
        const rows = [...enumRows.values()].sort((a, b) =>
            byCodePoint(a.verb + a.prop, b.verb + b.prop)
        );
        for (const r of rows) {
            const schemasS = r.schemas.size ? ` on \`${[...r.schemas].sort().join(', ')}\`` : '';
            const bk = r.breaking ? ' **(breaking)**' : '';
            const sampleV = r.values.slice(0, 6).map(v => `\`${v}\``).join(', ');
            const moreV = r.values.length > 6 ? ` + ${r.values.length - 6} more` : '';
            const verbPhrase = r.verb === 'added' ? 'accepts new values' : 'no longer accepts';
            let sideHint = '';
            if (r.sides.size === 1) sideHint = ` (${[...r.sides][0]} only)`;
            out.push(`- \`${r.prop}\`${schemasS}${sideHint} ${verbPhrase}: ${sampleV}${moreV}${bk}`);
        }
        out.push('');
    }

    if (refactorRows.size) {
        out.push('### Schema composition refactors');
        const rows = [...refactorRows.values()].sort((a, b) =>
            byCodePoint(a.parent + a.schemas.join(','), b.parent + b.schemas.join(','))
        );
        for (const r of rows) {
            const schemasS = r.schemas.map(s => `\`${s}\``).join(', ');
            const sample = r.examples.slice(0, 2).join(', ');
            const more = r.endpoints.size > 2 ? ` + ${r.endpoints.size - 2} more` : '';
            const location = r.parent && r.parent !== '(root)' ? `under \`${r.parent}\`` : 'at root';
            out.push(`- Refactored ${location} to compose ${schemasS} — ${sample}${more}`);
        }
        out.push('');
    }

    if (unknown.size) {
        out.push('### Other');
        const rows = [...unknown.values()].sort((a, b) =>
            byCodePoint((a.family || '') + (a.leafName || ''), (b.family || '') + (b.leafName || ''))
        );
        for (const r of rows) {
            const verb = OTHER_VERBS[r.family];
            const schemaPart = r.schemas.size ? ` on \`${[...r.schemas].sort().join(', ')}\`` : '';
            let sideHint = '';
            if (r.sides.size === 1) sideHint = ` (${[...r.sides][0]} only)`;
            if (verb && r.leafName) {
                out.push(`- ${verb} \`${r.leafName}\`${schemaPart}${sideHint}`);
            } else if (r.leafName) {
                out.push(`- ${r.family} on \`${r.leafName}\`${schemaPart}${sideHint}`);
            } else {
                // Fallback for changes without a clear property path.
                const ex = r.items[0].text.slice(0, 120);
                out.push(`- ${r.family} (${r.items.length}x) — e.g. ${ex}`);
            }
        }
        out.push('');
    }

    const text = out.join('\n').replace(/\s+$/, '');
    if (!text) return;
    process.stdout.write(text + '\n');
}

main();
