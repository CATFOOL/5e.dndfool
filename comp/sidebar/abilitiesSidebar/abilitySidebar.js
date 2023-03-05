let abilitySidebarTemplate = undefined;

function OpenAbilitySidebar(abilityName, data=null) {

    let mdPath = dataPath + "/abilities/" + abilityName.en + ".md/";
    if (data == null){
        OpenPlainSideBar(mdPath);
        return;
    }

    GetSidebarTemplate(abilitySidebarTemplate, sidebarPath + "/abilitiesSidebar/abilitySidebarTemplate.php");

    GetSidebarDescription(mdPath);
    document.getElementById("sidebar-ability-factor-value-base").textContent = data[abilityName.short].base;
    document.getElementById("sidebar-ability-factor-value-racial").textContent = SignNum(data[abilityName.short].racial);
    document.getElementById("sidebar-ability-factor-value-improvement").textContent = SignNum(data[abilityName.short].improvement);
    document.getElementById("sidebar-ability-factor-value-misc").textContent = SignNum(data[abilityName.short].misc);
    document.getElementById("sidebar-ability-factor-value-stacking").textContent = SignNum(data[abilityName.short].stacking);
    document.getElementById("sidebar-ability-factor-value-min").textContent = data[abilityName.short].min;

    let other = document.getElementById("sidebar-ability-factor-value-other");
    SetCustomise(other, data[abilityName.short], "other", true);

    let override = document.getElementById("sidebar-ability-factor-value-override");
    SetCustomise(override, data[abilityName.short], "override");


    const subTitle = " " + data[abilityName.short].scoreString + "<span id='sidebar-header-mod'>(" + data[abilityName.short].modString + ")</span>"
    document.getElementById("sidebar-header").innerHTML = abilityName.cn + subTitle;

    OpenSidebar();
}