class Entrepreneur {
    takeOrder = (order : string) : void => console.log(`encaminhando o pedido: ${order}, para a cozinha`);

    cookOrder = (order: string) : void => console.log(`cozinhando ${order}`);
};

// aplicando o SRP

class Attendant {
    takeOrder = (order : string) : void => console.log(`encaminhando o pedido: ${order}, para a cozinha`);
}

class Chef {
    cookOrder = (order: string) : void => console.log(`cozinhando ${order}`);
}