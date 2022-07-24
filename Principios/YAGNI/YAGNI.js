// o YAGNI é só fazer oq precisa ser feito, e nada mais que isso
// logo vamos imaginar a seguinte situação
// imaginemos que vamos pegar cada uma das pessoas do data.json e coletar um bolsa de sangue de cada um
// no bom e velho CRUD normalmente as pessoas querem fazer logo todas as 4 operações, porem
// o YAGNI se aplica aqui em criar metodos para realizar somente a operação que foi solicitada e nada mais

const fs = require('fs');

const BLOOD_BAG_JSON_PATH  = './Principios/YAGNI//bloodBags.json';

const getBloodBags = () => JSON.parse(fs.readFileSync(BLOOD_BAG_JSON_PATH, 'utf-8'));

const createBloodBag = (person) => {
    const BLOOD_BAG_VOLUME = 500;

    const actualBloodBags = getBloodBags();

    const createdBloodBag = {
        bloodType: person.bloodType,
        volume: BLOOD_BAG_VOLUME
    };

    const newBagArray = [...actualBloodBags, createdBloodBag]

    fs.writeFileSync(BLOOD_BAG_JSON_PATH, JSON.stringify(newBagArray, null, 2))
};

createBloodBag(util.getPeaple()[0])
