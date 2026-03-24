import {
    GeneratorConfig,
    Operation,
    Model,
    appendImport,
    PHPCodeGen,
    AnyStaticContext,
    PhpPropertyType, fqcnToClassName, nullFirstTypeComparator, onlyUnique,
} from '@rebilly/regenerator';


export function typesToTypeHints(types: PhpPropertyType[], consume: boolean): string | null {
    if (types.length === 0) {
        return null;
    }
    const typeHints: string[] = [];
    let hadContainedType = false;
    for (const type of types) {
        if (!type.containedTypes) {
            typeHints.push(fqcnToClassName(type.name));
        } else if (type.isDictionary) {
            const dictionaryInnerHint = typesToTypeHints(type.containedTypes, consume);
            typeHints.push(dictionaryInnerHint ? `array<string,${dictionaryInnerHint}>` : 'array');
            hadContainedType = dictionaryInnerHint !== null;
        } else {
            for (const containedType of type.containedTypes) {
                hadContainedType = true;
                typeHints.push(
                    type.isModel
                        ? `${fqcnToClassName(type.name)}<${fqcnToClassName(containedType.name)}>`
                        : fqcnToClassName(containedType.name) + '[]',
                );
                if (!consume) {
                    continue;
                }
                if (containedType.isModel) {
                    typeHints.push('array[]');
                } else if (containedType.name === 'DateTimeImmutable' || containedType.name === 'float') {
                    typeHints.push('string[]');
                }
            }
        }
    }
    const uniqueTypeHints = typeHints.filter(onlyUnique);
    if (
        !consume &&
        !hadContainedType &&
        uniqueTypeHints.length === 2 &&
        uniqueTypeHints.some((name) => name === 'null')
    ) {
        return '?' + uniqueTypeHints.find((name) => name !== 'null');
    }

    return uniqueTypeHints.sort(nullFirstTypeComparator).join('|');
}

const config: GeneratorConfig<PHPCodeGen, AnyStaticContext> = {
    packageInfo: {
        name: 'rebilly/client-php',
        description: 'Rebilly PHP Client',
        keywords: ['payment processing', 'api', 'transactions', 'subscriptions'],
        homepage: 'http://rebilly.com/',
        authors: [
            {
                name: 'Rebilly',
                homepage: 'https://github.com/rebilly',
            },
        ],
        autoload: {
            'psr-4': {
                'Rebilly\\Sdk\\': 'src',
            },
        },
        'autoload-dev': {
            'psr-4': {
                'Rebilly\\Sdk\\Tests\\': ['tests', 'examples'],
            },
        },
        scripts: {
            test: 'phpunit',
            'diff-files': 'f() { git diff --name-only --diff-filter=ACMRTUXB $1 | grep -i \\.php$ ; }; f',
            cs: 'php-cs-fixer fix -vv --dry-run || true',
            'cs-fix': 'php-cs-fixer fix -vv || true',
            'cs-feature': 'composer cs -- "$(composer diff-files origin/main)"',
            'cs-fix-feature': 'composer cs-fix -- "$(composer diff-files origin/main)"',
            'cs-changes': 'composer cs -- "$(composer diff-files HEAD)"',
            'cs-fix-changes': 'composer cs-fix -- "$(composer diff-files HEAD)"',
        },
        extra: {
            'branch-alias': {
                'dev-main': '3.x-dev',
                'dev-v2.x': '2.x-dev',
            },
        },
    },

    buildConfig: {
        outputFilename: 'templates',
    },

    rootNameSpace: 'Rebilly\\Sdk',

    customTemplates: {
        models: {
            ConfigurablePlan: (model: Model<any>) => ({
                'model-factory-ConfigurablePlan.php.handlebars': `src/Model/${model.className}Factory.php`,
            }),
            FlexiblePlan: (model: Model<any>) => ({
                'model-factory-Plan.php.handlebars': `src/Model/${model.className}Factory.php`,
            }),
            Plan: (model: Model<any>) => ({
                'model-factory-Plan.php.handlebars': `src/Model/${model.className}Factory.php`,
            }),
        },
    },

    codegen: {
        processOperation: <T extends Operation<any, any>>(operation: T, context: any): T => {
            for (const response of operation.responses) {
                if (
                    response.responseType?.some((type: any) => type.containedTypes) &&
                    operation.arguments.has('limit') &&
                    operation.arguments.has('offset')
                ) {
                    appendImport(operation.imports, [
                        {
                            source: context.rootNameSpace,
                            target: 'Collection',
                            isDefault: false,
                        },
                        {
                            source: context.rootNameSpace,
                            target: 'Paginator',
                            isDefault: false,
                        },
                    ]);
                }
                if (response.mimeType === 'application/pdf') {
                    appendImport(operation.imports, {
                        source: 'Psr\\Http\\Message',
                        target: 'StreamInterface',
                        isDefault: false,
                    });
                }
            }

            return operation;
        },
    },

    operationTemplates: (operation: Operation<any, any>, defaultTemplates: any[]): any[] => {
        const templates = [...defaultTemplates];

        for (const response of operation.responses) {
            switch (response.mimeType) {
                case 'application/json':
                    if (
                        response.responseType?.some((type: any) => type.containedTypes) &&
                        operation.arguments.has('limit') &&
                        operation.arguments.has('offset')
                    ) {
                        const allContainedTypes: any[] = [];
                        for (const type of response.responseType) {
                            const containedTypes = type.containedTypes as any[] | undefined;
                            if (containedTypes) {
                                allContainedTypes.push(...containedTypes);
                            }
                        }

                        templates.push({
                            name: 'operation-json-collection',
                            context: {
                                methodName: operation.methodName,
                                accept: response.mimeType,
                                returnType: 'Collection',
                                returnTypeHint: typesToTypeHints(
                                    [
                                        {
                                            name: 'Collection',
                                            format: null,
                                            isPrimitive: false,
                                            isStdLib: false,
                                            isModel: true,
                                            containedTypes: allContainedTypes,
                                            isDictionary: false,
                                        },
                                    ],
                                    false,
                                ),
                                responseType: response.responseType,
                            },
                        });

                        templates.push({
                            name: 'operation-paginator',
                            context: {
                                methodName: `${operation.methodName}Paginator`,
                                originalMethodName: operation.methodName,
                                accept: response.mimeType,
                                returnType: 'Paginator',
                                returnTypeHint: typesToTypeHints(
                                    [
                                        {
                                            name: 'Paginator',
                                            format: null,
                                            isPrimitive: false,
                                            isStdLib: false,
                                            isModel: true,
                                            containedTypes: allContainedTypes,
                                            isDictionary: false,
                                        },
                                    ],
                                    false,
                                ),
                            },
                        });

                        const jsonArrayOperations = templates.findIndex(
                            (template: any) => template.name === 'operation-json-array',
                        );
                        if (jsonArrayOperations !== -1) {
                            templates.splice(jsonArrayOperations, 1);
                        }
                    }
                    break;
            }
        }

        return templates;
    },

    staticTemplates: (context: any, defaultTemplates: any[]): any[] => {
        // TODO: use servers in Rebilly PHP SDK
        const filteredDefaults = defaultTemplates.filter(
            (template: any) =>
                ![
                    'static/src/ApiServer.php.handlebars',
                    'static/src/ApiServerVariable.php.handlebars',
                ].includes(template.name),
        );

        const rebillyStaticFiles = [
            {
                name: 'static/src/Collection.php.handlebars',
                targetLocation: 'src/Collection.php',
                context,
            },
            {
                name: 'static/src/Paginator.php.handlebars',
                targetLocation: 'src/Paginator.php',
                context,
            },
            {
                name: 'static/src/CombinedService.php.handlebars',
                targetLocation: 'src/CombinedService.php',
                context,
            },
            {
                name: 'static/src/Exception/DataValidationException.php.handlebars',
                targetLocation: 'src/Exception/DataValidationException.php',
                context,
            },
            {
                name: 'static/src/Middleware/BaseUri.php.handlebars',
                targetLocation: 'src/Middleware/BaseUri.php',
                context,
            },
        ];

        return [...filteredDefaults, ...rebillyStaticFiles];
    },

    partials: {
        'operation-json-collection': 'operation-json-collection.php.handlebars',
        'operation-paginator': 'operation-paginator.php.handlebars',
    },

    templateDirs: ['./sdk-generator/templates', '@bundled/php'],
};

export default config;
