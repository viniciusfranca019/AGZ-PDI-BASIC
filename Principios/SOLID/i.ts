import Person from "./Person";

interface chef {
    cook() : void;
}

class Chef extends Person implements chef {
    cook(): void {
        console.log('cooking something'); 
    }
};

interface teache {
    teache() : void;
}

class GastronomyTeacher extends Chef implements teache {
    teache() {
        console.log('pass great knowledgment about gastronomy');
    };
}
