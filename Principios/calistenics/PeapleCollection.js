// então vamos criar o objeto PeapleCollection, que irá ter agora
// a função de lidar com as alterações que collection sofra

// logo todos os metodos que exijam um tipo de iteração com a collection deverá ser feito através do peapleCollection

const util = require('../Util/index');
const { Person} = require('./Person')

class PeapleCollection {
    constructor() {
        this.peaple = [];
        this.init(this.peaple);
    }

    init = (peaple) => {
        const peapleFromJson = util.getPeaple();
        peapleFromJson.forEach((person) => peaple.push(new Person(person)));
    };
}

const test = new PeapleCollection;