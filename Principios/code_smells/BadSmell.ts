import Novice from "../SOLID/o";

interface ReaperSkillSet {
    kill() : number;
    resurrect() : number;

}

class Reaper extends Novice implements ReaperSkillSet {

    kill(): number {
        return this.attack() * 99999999999;
    };

    // não utlizar pq o Reaper não deve ressucitar niguem
    resurrect(): number {
        return this.attack() * 99999999999;
    }
}

// aqui temos os seguintes bad smells
// 1. duplicação de codigo nas linhas 12 e 17
// 2. criação de codigo desnecessario jpa que resurrect não é pra ser usado no Reaper
// 3. utilização de comentário para explicar que o ressucitar não deve ser usado e pra explicar a existencias de todos esses bad smells :p