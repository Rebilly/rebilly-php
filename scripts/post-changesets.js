const fs = require('fs');

const package = JSON.parse(fs.readFileSync('./package.json').toString());

// Bump SDK version in Client.php
const clientSource = fs.readFileSync('./src/Client.php').toString();
const modifiedClientSource = clientSource.replace(/SDK_VERSION = '[^']+'/, `SDK_VERSION = '${package.version}'`);

fs.writeFileSync('./src/Client.php', modifiedClientSource);
