// e como o KISS pode ser usado
// para termos um codigo simples de execução, leitura e entendimento

const util = require('../Util');


const getPeapleWhoBirthsBefore2003 = (peaple) => {
    const now = new Date('2022-07-23 00:00:00');
    const year2003 = new Date('2003-01-01 00:00:00');

    const ageForPeapleBithOn2003 = now.getFullYear() - year2003.getFullYear();

    return peaple.filter(person => person.age > ageForPeapleBithOn2003);
};

// o codigo pode aparentar fazer mais coisa, porem a logica implicada no metodo agora
// alem de não conter um bug no qual não retornava o nosso querido sun wukong
// agora utiliza uma grandeza de mais facil leitura e compreensão humana que é a idade
