class Language {
    name : string;

    constructor(name : string) {
        this.name = name;
    }

    returnCode() : void {
        console.log(`good code in ${this.name}`);
    }
    ;
}

class Php extends Language {
    private static readonly LANGUAGE_NAME : string = 'php';

    constructor() {
        super(Php.LANGUAGE_NAME);
    }
}

class Developer {
    language : Language;

    constructor(language : Language) {
        this.language = language;
    }

    public doGoodCode() {
        this.language.returnCode();
    }
}

const dev = new Developer(new Php)
dev.doGoodCode();
