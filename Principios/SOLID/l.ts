interface implementsCode {
    implementsSomeGoodCode() : void;
}

class TechLead implements implementsCode {
    public implementsSomeGoodCode(): void {
        console.log('some good code');
    };
};

class JuniorDev implements implementsCode {
    implementsSomeGoodCode() : void {
        console.log('has a lot to learn here');
        
    };
}