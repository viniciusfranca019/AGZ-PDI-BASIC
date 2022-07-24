// então vamos criar o objeto PeapleCollection, que irá ter agora
// a função de lidar com as alterações que collection sofra

const util = require('../Util/index');
const { Person} = require('./Person')

class PeapleCollection {
    constructor() {
        this.peaple = [];
        this.init(this.peaple);
        console.log(this.peaple);
    }

    init = (peaple) => {
        const peapleFromJson = util.getPeaple();
        peapleFromJson.forEach((person) => peaple.push(new Person(person)));
    };
}

const test = new PeapleCollection;