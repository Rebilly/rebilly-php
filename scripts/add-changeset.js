const fs = require('fs');
const { default: write } = require('@changesets/write');

async function run() {
    if (process.argv.length < 4) {
        console.error('Usage: node scripts/add-changeset.js <type> <summary>');
        process.exit(1);
    }
    const type = process.argv[2];
    const summary = process.argv.slice(3).join(' ');

    const cwd = process.cwd();
    const packageJson = JSON.parse(fs.readFileSync('./package.json').toString());

    const changesetId = await write({
        summary,
        releases: [
            {
                name: packageJson.name,
                type,
            },
        ],
    }, cwd);

    console.log(changesetId);
}

run();
