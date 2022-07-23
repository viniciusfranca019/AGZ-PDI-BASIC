// para o não exemplo do KISS podemos pensar na seguinte situação
// KISS ele preza que o codigo seja facil de executar, ler e entender
// logo vamos filtrar as pessoa que nasceram antes do ano 2003, considerando o now 2022-07-23 00:00:00 e ver o que podemos fazer de contra exemplo

const getPeapleWhoBirthsBefore2003 = (peaple) => {
    const now = new Date('2022-07-23 00:00:00');
    const year2003 = new Date('2003-01-01 00:00:00');
    return peaple.filter(person => getBirthYear(person.age, now) < year2003);
};

const getBirthYear = (age, now) => {
    return new Date(`${now.getFullYear() - age}-01-01 00:00:00`)
};

// perceba que o codigo acima compara um estado que são data
// esse estado é muito mais dificil do ser humano compreender
// e da forma como o codigo acima está feito possui um bug
// pois não irá retornar sun wukong
