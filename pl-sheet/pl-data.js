function SignNum(num){
    if (num >= 0) return "+" + num.toString()
    else if (num < 0) return num.toString()
}

function ScoreToModifier(score){
    return Math.floor((score-10)/2);
}

function ToInt(value, defaultValue, ignoreZero=false){
    if (isNaN(parseInt(value))) return defaultValue;
    else if (parseInt(value) === 0 && ignoreZero) return defaultValue;
    else return parseInt(value);
}

const ability = {
    STR: {short: "str", en: "strength", cn: "力量"},
    DEX: {short: "dex", en: "dexterity", cn: "敏捷"},
    CON: {short: "con", en: "constitution", cn: "体质"},
    INT: {short: "int", en: "intelligence", cn: "智力"},
    WIS: {short: "wis", en: "wisdom", cn: "感知"},
    CHA: {short: "cha", en: "charisma", cn: "魅力"}
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
        this._abilityData.base = ToInt(newValue, 0);
        this.Refresh();
    }

    get base(){
        return this._abilityData.base;
    }

    set racial(newValue){
        this._abilityData.racial = ToInt(newValue, 0);
        this.Refresh();
    }

    get racial(){
        return this._abilityData.racial;
    }

    set improvement(newValue){
        this._abilityData.improvement = ToInt(newValue, 0);
        this.Refresh();
    }

    get improvement(){
        return this._abilityData.improvement;
    }

    set misc(newValue){
        this._abilityData.misc = ToInt(newValue, 0);
        this.Refresh();
    }

    get misc(){
        return this._abilityData.misc;
    }

    set stacking(newValue){
        this._abilityData.stacking = ToInt(newValue, 0);
        this.Refresh();
    }

    get stacking(){
        return this._abilityData.stacking;
    }

    set min(newValue){
        this._abilityData.min = ToInt(newValue, 0);
        this.Refresh();
    }

    get min(){
        return this._abilityData.min;
    }

    set other(newValue){
        this._abilityData.other = ToInt(newValue, null, true);
        this.Refresh();
    }

    get other(){
        return this._abilityData.other;
    }

    set override(newValue){
        this._abilityData.override = ToInt(newValue, null);
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
        if (this._abilityData.other === null) return score;
        score += this._abilityData.other;
        return score;
    }

    Refresh(){
        const mod = document.getElementById("pl-sheet-ability-" + this._abilityName.short.toUpperCase() + "-mod");
        const score = document.getElementById("pl-sheet-ability-" + this._abilityName.short.toUpperCase() + "-score");
        mod.textContent = this.modString;
        score.textContent = this.scoreString;
        if (this._abilityData.override !== null || (this._abilityData.other !== null && this._abilityData.other !== 0)) {
            mod.classList.add("customised");
            score.classList.add("customised");
        }
        else{
            mod.classList.remove("customised");
            score.classList.remove("customised");
        }
    }

}

const speed = {
    walking: {en: "walking", cn: "步行"},
    climbing: {en: "climbing", cn: "攀爬"},
    swimming: {en: "swimming", cn: "游泳"},
    flying: {en: "flying", cn: "飞行"},
    burrowing: {en: "burrowing", cn: "挖掘"},
}

class Speed{
    constructor(speedName, speedData) {
        this._speedName = speedName;
        this._speedData = speedData;
        this._isDisplaying = false;
        this.Refresh();
    }

    get base(){
        return this._speedData.base;
    }

    set base(newValue){
        this._speedData.base = ToInt(newValue, 0);
        this.Refresh();
    }

    get override(){
        return this._speedData.override;
    }

    set override(newValue){
        this._speedData.override = ToInt(newValue, null);
        this.Refresh();
    }

    get speed(){
        if (this._speedData.override !== null) return this._speedData.override;
        return this._speedData.base;
    }

    get speedString(){
        if (this.speed === null) return "0";
        return this.speed.toString();
    }

    get notes(){
        if (this._speedData.notes === null) return "";
        return this._speedData.notes;
    }

    set notes(newValue){
        this._speedData.notes = newValue;
        this.Refresh();
    }

    get isDisplaying(){
        return this._isDisplaying;
    }

    set isDisplaying(new_Value){
        this._isDisplaying = new_Value;
        this.Refresh();
    }

    Refresh(){
        if (!this._isDisplaying) return;
        const num = document.getElementById("pl-sheet-speed-num");
        const title = document.getElementById("pl-sheet-speed-type");
        num.textContent = this.speedString;
        title.textContent = this._speedName.cn;
        if (this._speedData.override !== null) {
            num.classList.add("customised");
            title.classList.add("customised");
        }
        else{
            num.classList.remove("customised");
            title.classList.remove("customised");
        }
    }
}

class HealthState{
    constructor(healthState) {
        this._healthState = healthState;
        this.current = this._healthState.current;
        this.maxMod = this._healthState.maxMod;
        this.maxOverride = this._healthState.maxOverride;
        this.temp = this._healthState.temp;
        this.hitPointRecord = this._healthState.hitPointRecord;
    }
    get current(){
        return this._healthState.current;
    }

    set current(newValue){
        this._healthState.current = ToInt(newValue, 0);
        if (ToInt(newValue, null) < 0) this._healthState.current = 0;
        if (ToInt(newValue, null) > this.max) this._healthState.current = this.max;
        document.getElementById("pl-sheet-health-primary-current-num").value = this.current;
    }

    get hitPointRecord(){
        return this._healthState.hitPointRecord;
    }

    set hitPointRecord(newValue){
        this._healthState.hitPointRecord = newValue;
        this.max = this.CalHitRecord(newValue);
    }

    get max(){
        if (this._healthState.maxOverride !== null) return this._healthState.maxOverride;
        if (this._healthState.max + this._healthState.maxMod < 0) return 0;
        return this._healthState.max + this._healthState.maxMod;
    }

    set max(newValue){
        this._healthState.max = ToInt(newValue, 0);
        if (ToInt(newValue, null) < 0) this._healthState.max = 0;
        this.RefreshMax();
    }

    get maxMod(){
        return this._healthState.maxMod;
    }

    set maxMod(newValue){
        this._healthState.maxMod = ToInt(newValue, null, true);
        this.RefreshMax();
    }

    get maxOverride(){
        return this._healthState.maxOverride;
    }

    set maxOverride(newValue){
        this._healthState.maxOverride = ToInt(newValue, null);
        if (ToInt(newValue, null) < 0) this._healthState.maxOverride = 0;
        this.RefreshMax();
    }

    get temp(){
        return this._healthState.temp;
    }

    set temp(newValue){
        this._healthState.temp = ToInt(newValue, 0, false);
        if (ToInt(newValue, null) < 0) this._healthState.temp = 0;
        document.getElementById("pl-sheet-health-primary-temp-num").value = this.temp;
    }

    CalHitRecord(hitPointRecord){
        let sum = 0;
        for (const hitPoint of hitPointRecord) {
            sum += hitPoint;
        }
        return sum;
    }

    RefreshMax(){
        const max = document.getElementById("pl-sheet-health-primary-max-num");
        max.textContent = this.max;
        if (this._healthState.maxOverride !== null || (this._healthState.maxMod !== null && this._healthState.maxMod !== 0)) {
            max.classList.add("customised");
        }
        else{
            max.classList.remove("customised");
        }
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
        this.walking = new Speed(speed.walking, this._pl_data.speed.walking)
        this.climbing = new Speed(speed.climbing, this._pl_data.speed.climbing)
        this.swimming = new Speed(speed.swimming, this._pl_data.speed.swimming)
        this.flying = new Speed(speed.flying, this._pl_data.speed.flying)
        this.burrowing = new Speed(speed.burrowing, this._pl_data.speed.burrowing)
        this.speedDisplaying = this._pl_data.speed.displaying;
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

    get speedDisplaying(){
        return this._pl_data.speed.displaying;
    }

    set speedDisplaying(newValue){
        this._pl_data.speed.displaying = newValue;
        this.walking.isDisplaying = newValue === speed.walking;
        this.climbing.isDisplaying = newValue === speed.climbing;
        this.swimming.isDisplaying = newValue === speed.swimming;
        this.flying.isDisplaying = newValue === speed.flying;
        this.burrowing.isDisplaying = newValue === speed.burrowing;
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
            "other": null, // 其它修正
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
    "speed": {
        "displaying": speed.walking,
        "walking": {
            "base": 30,
            "override": null,
            "notes": "",
        },
        "climbing": {
            "base": null,
            "override": null,
            "notes": "",
        },
        "swimming": {
            "base": null,
            "override": null,
            "notes": "",
        },
        "flying": {
            "base": null,
            "override": null,
            "notes": "",
        },
        "burrowing": {
            "base": null,
            "override": null,
            "notes": "",
        },
    },
    "inspiration": false,
    "healthState": {
        "current": 9,
        "max": 43,
        "hitPointRecord": [8, 9, 12],
        "maxMod": null,
        "maxOverride": null,
        "temp": 0,
    }
}



let myCharacter;
function LoadPlData(pl_data){
    myCharacter = new PlData(pl_data);
    document.getElementById("pl-characterInfo-class-race").textContent = myCharacter.class_race_text;
}