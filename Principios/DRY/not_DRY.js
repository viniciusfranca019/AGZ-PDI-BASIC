// aqui vamos utilizar um contra exemplo do DRY
// imaginemos que queremos filtrar as pessoas que o nome completo (firstName + secondName) seja uma string maior que 9
// e filtrar as pessoas que o fullName seja uma string que o a length seja um multiplipo de 6
// perceba que em ambos os metodos eu necessito da construção do fullName, porem eu repito o mesmo processo duas vezes
// vamos no arquivo DRY.js para ver como aplicar DRY nessa situação

const getPeapleWithFullNameGreaterThenNine= (peaple) => {
    const NUMBER_NINE = 9;

    const filteredPeaple = peaple.filter((person) => {
        const { firstName, secondName } = person;
        const fullName = firstName + ' ' + secondName;
        return fullName.length >= NUMBER_NINE;
    })
    return filteredPeaple;
};

const getPeapleWithFullnameMultiOfSix = (peaple) => {
    const NUMBER_SIX = 6;

    const filteredPeaple = peaple.filter((person) => {
        const { firstName, secondName } = person;
        const fullName = firstName + ' ' + secondName;
        return fullName.length % NUMBER_SIX == 0;
    })
    return filteredPeaple;
};
