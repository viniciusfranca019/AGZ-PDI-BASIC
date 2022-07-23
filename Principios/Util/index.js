const fs = require('fs');

const FILE_PATH = 'Principios/data.json'

const getPeaple = (filePath = FILE_PATH) => {
    const data = fs.readFileSync(filePath, 'utf-8');
    return JSON.parse(data);
}

module.exports = {
    getPeaple,
};