const damageTypes = {
    Healing: "healing",
    True: "true",
    Bludgeoning: "bludgeoning", // 钝击Bludgeoning。钝力的攻击（锤击、坠地、绞压等）造成钝击伤害。
    Piercing: "piercing", // 钝击Bludgeoning。钝力的攻击（锤击、坠地、绞压等）造成钝击伤害。
    Slashing: "slashing", // 挥砍Slashing。剑、斧、怪物的爪击等皆造造成挥砍伤害。
    Acid: "acid", // 强酸Acid。黑龙吐息的腐蚀性喷溅，以及黑布丁怪分泌的溶解酶造成强酸伤害。
    Cold: "cold", // 冷冻Cold。冰魔鬼的矛产生的炼狱刺寒，以及白龙的吐息造成冷冻伤害。
    Fire: "fire", // 火焰Fire。红龙吐息的火焰，以及各种生成烈焰的咒法法术造成火焰伤害。
    Force: "force", // 力量Force。力场是被塑造成致伤形态的纯魔法能量。大部分造成力场伤害的都是法术效应。
    Lightning: "lightning", // 闪电Lightning。法术闪电束lightning bolt，以及蓝龙的吐息造成闪电伤害。
    Necrotic: "necrotic", // 黯蚀Necrotic。某些不死生物和法术（例如冻寒之触chill touch）造成黯蚀伤害，其力量腐化物件并侵蚀心灵。
    Poison: "poison", // 毒素Poison。毒刺和绿龙吐息的毒气造成毒素伤害。
    Psychic: "psychic", // 心灵Psychic。心智能力（例如夺心魔的心灵冲击）造成心灵伤害。
    Radiant: "radiant", // 光耀Radiant。牧师法术焰击术flame strike，或者天使的神圣武器造成光耀伤害，其力量烧灼肉体并让心灵过载。
    Thunder: "thunder", // 雷鸣Thunder。雷鸣伤害由突发的冲击性音波产生，例如法术雷鸣波thunderwave所造成的效应。
}


function changeHealth(data, value, type){
    if (isNaN(parseInt(value))) return;

    if (type === damageTypes.Healing){
        data.healthState.current += parseInt(value);
    }
    else {
        data.healthState.current -= parseInt(value);
    }

    if (data.healthState.current > data.healthState.max){
        data.healthState.current = data.healthState.max;
    }
    if (data.healthState.current < 0){
        data.healthState.current = 0;
    }

    DetectingDeath(data.healthState.current);
}