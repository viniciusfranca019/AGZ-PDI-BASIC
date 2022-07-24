class Person {
    constructor({ firstName, secondName, age, bloodType, city }) {
        this.firstName = firstName;
        this.secondName = secondName;
        this.age = age;
        this.city = city;
        this.bloodType = bloodType;
    };
};

module.exports = {
    Person,
}