class Weapon {
    attackPower : number;

    constructor(attackPower : number) {
        this.attackPower = attackPower;
    }

    getAttackPower() : number {
        return this.attackPower;
    }
}

class Armor {
    defensePower : number;

    constructor(defensePower : number) {
        this.defensePower = defensePower;
    }

    getDefensePower() : number {
        return this.defensePower;
    }
}

class Novice {
    weapon : Weapon|null;
    armor : Armor|null;

    constructor(weapon : Weapon|null, armor : Armor|null) {
        this.weapon = weapon;
        this.armor = armor;
    }

    attack() : number {
        return this.weapon ? this.weapon.getAttackPower() : 1;
    }

    defend() : number {
        return this.armor ? this.armor.getDefensePower() : 1;
    }
}

interface mageSetSkill {
    fireBall() : number;
    iceSpear() : number;
}

class Mage extends Novice implements mageSetSkill {

    fireBall(): number {
        return this.attack() * 2.5;
    }

    iceSpear(): number {
        return this.attack() * 1.8;
    }
}