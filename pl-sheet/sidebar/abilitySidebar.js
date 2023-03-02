function OpenAbilitySidebar(data, abilityName) {
    const sidebar = document.getElementById("sidebar")
    sidebar.style.display = "flex";

    const content = "<div id=\"sidebar-header\">力量 8<span id=\"sidebar-header-mod\">(-1)</span></div>\n" +
        "            <div id=\"sidebar-ability-manager\">\n" +
        "                <div id=\"sidebar-ability-factors\">\n" +
        "                    <div class=\"sidebar-ability-factor\">\n" +
        "                        <div class=\"sidebar-ability-factor-label\">\n" +
        "                            基础值\n" +
        "                        </div>\n" +
        "                        <div id='sidebar-ability-factor-value-base' class=\"sidebar-ability-factor-value\">\n" +
        "                            \n" +
        "                        </div>\n" +
        "                    </div>\n" +
        "                    <div class=\"sidebar-ability-factor\">\n" +
        "                        <div class=\"sidebar-ability-factor-label\">\n" +
        "                            种族属性\n" +
        "                        </div>\n" +
        "                        <div id='sidebar-ability-factor-value-racial' class=\"sidebar-ability-factor-value\">\n" +
        "                            \n" +
        "                        </div>\n" +
        "                    </div>\n" +
        "                    <div class=\"sidebar-ability-factor\">\n" +
        "                        <div class=\"sidebar-ability-factor-label\">\n" +
        "                            成长属性\n" +
        "                        </div>\n" +
        "                        <div id='sidebar-ability-factor-value-improvement' class=\"sidebar-ability-factor-value\">\n" +
        "                            \n" +
        "                        </div>\n" +
        "                    </div>\n" +
        "                    <div class=\"sidebar-ability-factor\">\n" +
        "                        <div class=\"sidebar-ability-factor-label\">\n" +
        "                            杂项、专长\n" +
        "                        </div>\n" +
        "                        <div id='sidebar-ability-factor-value-misc' class=\"sidebar-ability-factor-value\">\n" +
        "                            \n" +
        "                        </div>\n" +
        "                    </div>\n" +
        "                    <div class=\"sidebar-ability-factor\">\n" +
        "                        <div class=\"sidebar-ability-factor-label\">\n" +
        "                            叠加、魔法物品\n" +
        "                        </div>\n" +
        "                        <div id='sidebar-ability-factor-value-stacking' class=\"sidebar-ability-factor-value\">\n" +
        "                            \n" +
        "                        </div>\n" +
        "                    </div>\n" +
        "                    <div class=\"sidebar-ability-factor\">\n" +
        "                        <div class=\"sidebar-ability-factor-label\">\n" +
        "                            最小值\n" +
        "                        </div>\n" +
        "                        <div id='sidebar-ability-factor-value-min' class=\"sidebar-ability-factor-value\">\n" +
        "                            \n" +
        "                        </div>\n" +
        "                    </div>\n" +
        "                </div>\n" +
        "                \n" +
        "                <div id=\"sidebar-ability-fill-factors\">\n" +
        "                    <div class=\"sidebar-ability-factor\">\n" +
        "                        <div class=\"sidebar-ability-factor-label\">\n" +
        "                            其他加值\n" +
        "                        </div>\n" +
        "                        <label>\n" +
        "                            <input id='sidebar-ability-factor-value-other' type=\"number\" placeholder=\"--\" value=\"\">\n" +
        "                        </label>\n" +
        "                    </div>\n" +
        "                    <div class=\"sidebar-ability-factor\">\n" +
        "                        <div class=\"sidebar-ability-factor-label\">\n" +
        "                            覆盖值\n" +
        "                        </div>\n" +
        "                        <label>\n" +
        "                            <input id='sidebar-ability-factor-value-override' type=\"number\" placeholder=\"--\" value=\"\">\n" +
        "                        </label>\n" +
        "                    </div>\n" +
        "                </div>\n" +
        "            </div>\n" +
        "            <div id=\"sidebar-ability-description\">\n" +
        "            </div>"

    const sidebar_content = document.getElementById("sidebar-content");
    sidebar_content.innerHTML = content;
    const sidebar_describe = document.getElementById("sidebar-ability-description");
    const sidebar_header = document.getElementById("sidebar-header");

    document.getElementById("sidebar-ability-factor-value-base").textContent = data[abilityName].base;
    document.getElementById("sidebar-ability-factor-value-racial").textContent = data[abilityName].racial;
    document.getElementById("sidebar-ability-factor-value-improvement").textContent = data[abilityName].improvement;
    document.getElementById("sidebar-ability-factor-value-misc").textContent = data[abilityName].misc;
    document.getElementById("sidebar-ability-factor-value-stacking").textContent = data[abilityName].stacking;
    document.getElementById("sidebar-ability-factor-value-min").textContent = data[abilityName].min;
    document.getElementById("sidebar-ability-factor-value-other").value = data[abilityName].other;
    document.getElementById("sidebar-ability-factor-value-override").value = data[abilityName].override;

    const numString = " " + data[abilityName].scoreString + "<span id='sidebar-header-mod'>(" + data[abilityName].modString + ")</span>"
    let description;
    let path = sidebarPath + "sidebarText/abilities/";
    if (abilityName === ability.STR) {
        sidebar_header.innerHTML = "力量" + numString;
        description = readTextFile(path + "strength.md");
    }
    else if(abilityName === ability.DEX){
        sidebar_header.innerHTML = "敏捷" + numString;
        description = readTextFile(path + "dexterity.md");
    }
    else if(abilityName === ability.CON){
        sidebar_header.innerHTML = "体质" + numString;
        description = readTextFile(path + "constitution.md");
    }
    else if(abilityName === ability.INT){
        sidebar_header.innerHTML = "智力" + numString;
        description = readTextFile(path + "intelligence.md");
    }
    else if(abilityName === ability.WIS){
        sidebar_header.innerHTML = "感知" + numString;
        description = readTextFile(path + "wisdom.md");
    }
    else if(abilityName === ability.CHA){
        sidebar_header.innerHTML = "魅力" + numString;
        description = readTextFile(path + "charisma.md");
    }

    showdown.setFlavor('github');
    let converter = new showdown.Converter();
    sidebar_describe.innerHTML = converter.makeHtml(description);
}