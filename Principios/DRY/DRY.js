const util = require('../Util');

// vamos agora aplicar o DRY no codigo anterior e ver como podemos refatorar esse codigo

const getFullNameByPerson = (person) => {
    const { firstName, secondName } = person;
    return firstName + ' ' + secondName;
};

const getPeapleWithFullNameGreaterThenNine= (peaple) => {
    const NUMBER_NINE = 9;

    const filteredPeaple = peaple.filter((person) => {
        const fullName = getFullNameByPerson(person);
        return fullName.length >= NUMBER_NINE;
    })
    return filteredPeaple;
};

const getPeapleWithFullnameMultiOfSix = (peaple) => {
    const NUMBER_SIX = 6;

    const filteredPeaple = peaple.filter((person) => {
        const fullName = getFullNameByPerson(person);
        return fullName.length % NUMBER_SIX == 0;
    })
    return filteredPeaple;
};

// pronto agora paramos de repetir o mesmo trexo de codigo utilizando o DRY