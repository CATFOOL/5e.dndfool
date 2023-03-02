function SignNum(num){
    if (num >= 0) return "+" + num.toString()
    else if (num < 0) return num.toString()
}

function ScoreToModifier(score){
    return Math.floor((score-10)/2);
}

const ability = {
    STR: "str",
    DEX: "dex",
    CON: "con",
    INT: "int",
    WIS: "wis",
    CHA: "cha",
}

class Ability{
    constructor(abilityName, abilityData){
        this._abilityData = abilityData;
        this._abilityName = abilityName;
        this.Refresh();
    }

    get score(){
        return this.CalAbilityScore();
    }

    get scoreString(){
        return this.score.toString();
    }

    get mod(){
        return ScoreToModifier(this.score);
    }

    get modString(){
        return SignNum(this.mod);
    }

    set base(newValue){
        this._abilityData.base = newValue;
        this.Refresh();
    }

    get base(){
        return this._abilityData.base;
    }

    set racial(newValue){
        this._abilityData.racial = newValue;
        this.Refresh();
    }

    get racial(){
        return this._abilityData.racial;
    }

    set improvement(newValue){
        this._abilityData.improvement = newValue;
        this.Refresh();
    }

    get improvement(){
        return this._abilityData.improvement;
    }

    set misc(newValue){
        this._abilityData.misc = newValue;
        this.Refresh();
    }

    get misc(){
        return this._abilityData.misc;
    }

    set stacking(newValue){
        this._abilityData.stacking = newValue;
        this.Refresh();
    }

    get stacking(){
        return this._abilityData.stacking;
    }

    set min(newValue){
        this._abilityData.min = newValue;
        this.Refresh();
    }

    get min(){
        return this._abilityData.min;
    }

    set other(newValue){
        this._abilityData.other = newValue;
        this.Refresh();
    }

    get other(){
        return this._abilityData.other;
    }

    set override(newValue){
        this._abilityData.override = newValue;
        this.Refresh();
    }

    get override(){
        return this._abilityData.override;
    }

    CalAbilityScore(){
        if (this._abilityData.override !== null) return this._abilityData.override;
        let score = this._abilityData.base + this._abilityData.racial + this._abilityData.improvement + this._abilityData.misc;
        score = Math.min(score, 20);
        score += this._abilityData.stacking;
        score = Math.max(score, this._abilityData.min);
        if (this._abilityData.other === null) this._abilityData.other = 0;
        score += this._abilityData.other;
        return score
    }

    Refresh(){
        document.getElementById("pl-sheet-ability-" + this._abilityName.toUpperCase() + "-mod").textContent = this.modString;
        document.getElementById("pl-sheet-ability-" + this._abilityName.toUpperCase() + "-score").textContent = this.scoreString;
    }

}

class MovementSpeed{
    constructor(speedName, speedData) {
        this._speedName = speedName;
        this._speedData = speedData;
        this.Refresh();
    }

    get speed(){
        return this._speedData.speed;
    }

    set speed(new_Value){
        this._speedData.speed = new_Value;
        this.Refresh();
    }

    get speedString(){
        return this._speedData.speed.toString();
    }

    get notes(){
        return this._speedData.notes;
    }

    set notes(new_Value){
        this._speedData.notes = new_Value;
        this.Refresh();
    }

    Refresh(){
        const pl_speed_block = document.getElementById("pl-sheet-speed-" + this._speedName.toLowerCase());
        if (pl_speed_block !== null)
            pl_speed_block.textContent = this.speedString;
    }
}

class HealthState{
    constructor(healthState) {
        this._healthState = healthState;
        this.current = this._healthState.current;
        this.maxMod = this._healthState.maxMod;
        this.maxOverride = this._healthState.maxOverride;
        this.temp = this._healthState.temp;
    }
    get current(){
        return this._healthState.current;
    }

    set current(new_Value){
        this._healthState.current = new_Value;
        document.getElementById("pl-sheet-health-primary-current-num").value = this.current;
    }

    get max(){
        if (this._healthState.maxOverride !== null) return this._healthState.maxOverride;
        return this._healthState.max + this._healthState.maxMod;
    }

    get maxMod(){
        return this._healthState.maxMod;
    }

    set maxMod(new_Value){
        this._healthState.maxMod = new_Value;
        document.getElementById("pl-sheet-health-primary-max-num").textContent = this.max;
    }

    get maxOverride(){
        return this._healthState.maxOverride;
    }

    set maxOverride(new_Value){
        this._healthState.maxOverride = new_Value;
        document.getElementById("pl-sheet-health-primary-max-num").textContent = this.max;
    }

    get temp(){
        return this._healthState.temp;
    }

    set temp(new_Value){
        this._healthState.temp = new_Value;
        document.getElementById("pl-sheet-health-primary-temp-num").value = this.temp;
    }
}

class PlData{
    constructor(pl_data){
        this._pl_data = pl_data;
        this.name = this._pl_data.name;
        this.level = this._pl_data.level;
        this.str = new Ability(ability.STR, this._pl_data.abilities.str);
        this.dex = new Ability(ability.DEX, this._pl_data.abilities.dex);
        this.con = new Ability(ability.CON, this._pl_data.abilities.con);
        this.int = new Ability(ability.INT, this._pl_data.abilities.int);
        this.wis = new Ability(ability.WIS, this._pl_data.abilities.wis);
        this.cha = new Ability(ability.CHA, this._pl_data.abilities.cha);
        this.proficiencyBonus = this._pl_data.proficiencyBonus;
        this.walking = new MovementSpeed("walking", this._pl_data.movementSpeed.walking)
        this.inspiration = this._pl_data.inspiration;
        this.healthState = new HealthState(this._pl_data.healthState);
    }
    get name(){
        return this._pl_data.name;
    }

    set name(newName){
        this._pl_data.name = newName;
        document.getElementById("pl-characterInfo-name").textContent = this.name;
    }

    get level(){
        return this._pl_data.level;
    }

    set level(newLevel){
        this._pl_data.level = newLevel;
        document.getElementById("pl-characterInfo-level").textContent = this.level;
    }

    get class_race_text(){
        let text = this._pl_data.races.subrace;
        if (!this._pl_data.races.subrace.includes("(")){
            text = `${this._pl_data.races.race} (${this._pl_data.races.subrace})`;
        }
        for (const _class of this._pl_data.classes) {
            text += ` | ${_class.name}(${_class.subclass}) ${_class.level}`;
        }
        return text;
    }

    get proficiencyBonus(){
        return this._pl_data.proficiencyBonus;
    }

    set proficiencyBonus(newValue){
        this._pl_data.proficiencyBonus = newValue;
        document.getElementById("pl-sheet-proficiencyBonus").textContent = SignNum(this.proficiencyBonus);
    }

    get inspiration(){
        return this._pl_data.inspiration;
    }

    set inspiration(newValue){
        this._pl_data.inspiration = newValue;
        const icon = document.getElementById("pl-sheet-inspiration-icon");
        if (this.inspiration){
            icon.style.opacity = "1";
        }
        else{
            icon.style.opacity = "0";
        }
    }
}

let pl_data = {
    "name": "Peabeey",
    "level": 5,
    "races": {
        "race": "半精灵",
        "subrace": "半精灵(木)"
    },
    "classes": [
        {
            "name": "牧师",
            "subclass": "生命",
            "level": 5,
        }
    ],
    "abilities": {
        "str": {
            "base": 8, // 基础值
            "racial": 0, // 种族
            "improvement": 0, // 成长
            "misc": 0, // 杂项、专长
            "stacking": 0, // 魔法物品加值，可突破20上限
            "min": 0, // 最小值
            "other": 0, // 其它修正
            "override": null, // 覆盖值
        },
        "dex": {
            "base": 10,
            "racial": 0,
            "improvement": 0,
            "misc": 0,
            "stacking": 0,
            "min": 0,
            "other": 0,
            "override": null,
        },
        "con": {
            "base": 15,
            "racial": 1,
            "improvement": 0,
            "misc": 0,
            "stacking": 0,
            "min": 0,
            "other": 0,
            "override": null,
        },
        "int": {
            "base": 14,
            "racial": 0,
            "improvement": 0,
            "misc": 0,
            "stacking": 0,
            "min": 0,
            "other": 0,
            "override": null,
        },
        "wis": {
            "base": 15,
            "racial": 1,
            "improvement": 2,
            "misc": 0,
            "stacking": 0,
            "min": 0,
            "other": 0,
            "override": null,
        },
        "cha": {
            "base": 8,
            "racial": 2,
            "improvement": 0,
            "misc": 0,
            "stacking": 0,
            "min": 0,
            "other": 0,
            "override": null,
        }
    },
    "proficiencyBonus": 3,
    "movementSpeed": {
        "walking": {
            "speed": 30,
            "notes": "",
        },
    },
    "inspiration": false,
    "healthState": {
        "current": 9,
        "max": 43,
        "maxMod": 0,
        "maxOverride": null,
        "temp": 0,
    }
}



let myCharacter;
function LoadPlData(pl_data){
    myCharacter = new PlData(pl_data);
    document.getElementById("pl-characterInfo-class-race").textContent = myCharacter.class_race_text;
}