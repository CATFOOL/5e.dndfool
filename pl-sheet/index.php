<html lang="en, cn">
<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/comp/header.php"?>
    <title>角色卡</title>
    <link rel="stylesheet" href="<?php echo CURRENT_ROOT?>/styles/pl-sheet.css">
    <link rel="stylesheet" href="<?php echo CURRENT_ROOT?>/styles/pl-sheet-setting.css">
</head>

<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/comp/nav.php"?>

<div id="pl-sheet">
    <div id="pl-sheet-header">
        <div class="left">
            <div id="pl-sheet-characterIcon">
                <img src="../img/userIcon/default.jpg" alt="user's profile icon">
            </div>
            <div id="pl-sheet-characterInfo">
                <div id="pl-characterInfo-name" class="name"></div>
                <div id="pl-characterInfo-class-race" class="class-race">半精灵(木) | 牧师(生命) 5</div>
                <div id="pl-characterInfo-level" class="level">5</div>
            </div>
        </div>
        <div class="right">
            <div id="pl-sheet-shortRest">
                <i class="fas fa-campground"></i> 短休
            </div>
            <div id="pl-sheet-longRest">
                <i class="fas fa-moon"></i> 长休
            </div>
            <div id="pl-sheet-build" onclick="OpenSetting()">
                <i class="fas fa-user-cog"></i> 设置&升级
            </div>
        </div>
    </div>
    <div id="pl-sheet-quickInfo" style="margin-top: 15px">
        <div id="pl-sheet-abilities">
            <div id="pl-sheet-ability-STR" class="pl-sheet-ability" onclick="OpenAbilitySidebar(ability.STR, myCharacter)">
                <div class="title">力量</div>
                <div id="pl-sheet-ability-STR-mod" class="modifier">+2</div>
                <div id="pl-sheet-ability-STR-score" class="score">14</div>
            </div>
            <div id="pl-sheet-ability-DEX" class="pl-sheet-ability" onclick="OpenAbilitySidebar(ability.DEX, myCharacter)">
                <div class="title">敏捷</div>
                <div id="pl-sheet-ability-DEX-mod" class="modifier">+2</div>
                <div id="pl-sheet-ability-DEX-score" class="score">14</div>
            </div>
            <div id="pl-sheet-ability-CON" class="pl-sheet-ability" onclick="OpenAbilitySidebar(ability.CON, myCharacter)">
                <div class="title">体质</div>
                <div id="pl-sheet-ability-CON-mod" class="modifier">+2</div>
                <div id="pl-sheet-ability-CON-score" class="score">14</div>
            </div>
            <div id="pl-sheet-ability-INT" class="pl-sheet-ability" onclick="OpenAbilitySidebar(ability.INT, myCharacter)">
                <div class="title">智力</div>
                <div id="pl-sheet-ability-INT-mod" class="modifier">+2</div>
                <div id="pl-sheet-ability-INT-score" class="score">14</div>
            </div>
            <div id="pl-sheet-ability-WIS" class="pl-sheet-ability" onclick="OpenAbilitySidebar(ability.WIS, myCharacter)">
                <div class="title">感知</div>
                <div id="pl-sheet-ability-WIS-mod" class="modifier">+2</div>
                <div id="pl-sheet-ability-WIS-score" class="score">14</div>
            </div>
            <div id="pl-sheet-ability-CHA" class="pl-sheet-ability" onclick="OpenAbilitySidebar(ability.CHA, myCharacter)">
                <div class="title">魅力</div>
                <div id="pl-sheet-ability-CHA-mod" class="modifier">+2</div>
                <div id="pl-sheet-ability-CHA-score" class="score">14</div>
            </div>
        </div>
        <div id="pl-sheet-quickInfo-right">
            <div id="pl-sheet-proficiency" onclick="OpenPlainSideBar(dataPath+'/abilities/proficiencyBonus.md')">
                <div class="title">熟练</div>
                <div id="pl-sheet-proficiencyBonus" class="modifier">+2</div>
                <div class="title2">加值</div>
            </div>
            <div id="pl-sheet-speed" onclick="OpenSpeedSidebar(myCharacter)">
                <div id="pl-sheet-speed-type" class="title">移动</div>
                <div id="pl-sheet-speed-num" class="modifier">00</div>
                <div class="title2">速度</div>
            </div>
            <div id="pl-sheet-inspiration">
                <div id="pl-sheet-inspiration-icon-container" onclick=InspirationSwitch()>
                    <i class='fas fa-dice-d20' id="pl-sheet-inspiration-icon" style="opacity: 0"></i>
                </div>
                <div class="title2" onclick="OpenPlainSideBar(dataPath+'/inspiration/inspiration.md')">
                    激励骰
                </div>
            </div>
            <div id="pl-sheet-health" onclick="OpenHealthSidebar(myCharacter)">
                <div id="pl-sheet-health-title">
                    生命值
                </div>
                <!---->
                <!--suppress JSDeprecatedSymbols -->
                <div id="pl-sheet-health-cal" onclick="event.stopPropagation();">
                    <button id="pl-sheet-health-cal-heal"
                            onclick="changeHealth(myCharacter, document.getElementById('pl-sheet-health-cal-input').value, damageTypes.Healing)">回复</button>
                    <label for="pl-sheet-health-cal-input"></label><input type="number" min="0" id="pl-sheet-health-cal-input" onchange="if(parseInt(this.value) < 0) this.value = 0">
                    <button id="pl-sheet-health-cal-damage"
                            onclick="changeHealth(myCharacter, document.getElementById('pl-sheet-health-cal-input').value, damageTypes.True)">伤害</button>
                </div>
                <!---->
                <div id="pl-sheet-health-primary">
                    <div id="pl-sheet-health-primary-current">
                        <div class="title">当前</div>
                        <label for="pl-sheet-health-primary-current-num"></label>
                        <!--suppress JSDeprecatedSymbols -->
                        <input type="number" min="0" id="pl-sheet-health-primary-current-num" placeholder="--" value="998" name="pl-sheet-health-primary-current-num"
                               onchange="DetectingDeath(this.value); myCharacter.healthState.current = this.value;"
                               onclick="event.stopPropagation();">
                    </div>
                    <div id="pl-sheet-health-primary-mid">
                        <div class="title" style="color: white">/</div>
                        <div id="pl-sheet-health-primary-mid-string">/</div>
                    </div>
                    <div id="pl-sheet-health-primary-max">
                        <div class="title">最大</div>
                        <div id="pl-sheet-health-primary-max-num">999</div>
                    </div>
                </div>
                <div id="pl-sheet-health-temp">
                    <div class="title">临时</div>
                    <label for="pl-sheet-health-primary-temp-num"></label>
                    <!--suppress JSDeprecatedSymbols -->
                    <input type="number" min="0" id="pl-sheet-health-primary-temp-num" value="999" placeholder="--" name="pl-sheet-health-primary-temp-num"
                           onblur="myCharacter.healthState.temp = this.value;" onclick="event.stopPropagation();">
                </div>
                <!--suppress JSDeprecatedSymbols -->
                <button class="pl-sheet-health-deathSaving" onclick="HealthDeathSavingSwitch(); event.stopPropagation();" style="display: none">
                    <i class="fas fa-skull-crossbones"></i>
                </button>
            </div>
            <div id="pl-sheet-deathSaving" style="display: none">
                <div id="pl-sheet-deathSaving-title">死亡豁免</div>
                <div id="pl-sheet-deathSaving-icon"><i class="fas fa-skull-crossbones"></i></div>
                <div id="pl-sheet-deathSaving-markers">
                    <div id="pl-sheet-deathSaving-marker-success">
                        <div class="title">成功</div>
                        <label for="pl-sheet-deathSaving-marker-success1"></label>
                        <input class="checkbox" type="checkbox" id="pl-sheet-deathSaving-marker-success1" onclick="GroupCheckboxes(this)">
                        <label for="pl-sheet-deathSaving-marker-success2"></label>
                        <input class="checkbox" type="checkbox" id="pl-sheet-deathSaving-marker-success2" onclick="GroupCheckboxes(this)">
                        <label for="pl-sheet-deathSaving-marker-success3"></label>
                        <input class="checkbox" type="checkbox" id="pl-sheet-deathSaving-marker-success3" onclick="GroupCheckboxes(this)">
                    </div>
                    <div id="pl-sheet-deathSaving-marker-fail">
                        <div class="title">失败</div>
                        <label for="pl-sheet-deathSaving-marker-fail1"></label>
                        <input class="checkbox" type="checkbox" id="pl-sheet-deathSaving-marker-fail1" onclick="GroupCheckboxes(this)" onchange="FailDeathSaving()">
                        <label for="pl-sheet-deathSaving-marker-fail2"></label>
                        <input class="checkbox" type="checkbox" id="pl-sheet-deathSaving-marker-fail2" onclick="GroupCheckboxes(this)" onchange="FailDeathSaving()">
                        <label for="pl-sheet-deathSaving-marker-fail3"></label>
                        <input class="checkbox" type="checkbox" id="pl-sheet-deathSaving-marker-fail3" onclick="GroupCheckboxes(this)" onchange="FailDeathSaving()">
                    </div>
                </div>
                <!--suppress JSDeprecatedSymbols -->
                <button class="pl-sheet-health-deathSaving" onclick="HealthDeathSavingSwitch(); event.stopPropagation();" style="display: none">
                    <i class="fas fa-heartbeat"></i>
                </button>
            </div>
        </div>
    </div>

    <div id="pl-sheet-subInfo">
        <div id="pl-">
        </div>
    </div>
</div>



<div id="pl-sheet-setting">
    <div id="pl-sheet-setting-nav">
        <div>种族</div>
        <div>职业</div>
        <div>属性</div>
        <div>背景</div>
        <div>装备</div>
        <div><i class='fas fa-save'></i>保存</div>
    </div>
    <div class="pl-sheet-setting-content" id="pl-sheet-setting-race">
        abc
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/comp/sidebar/sidebar.php"?>

</body>
</html>


<script src="./pl-data.js"></script>

<script>
    LoadPlData(pl_data);

    function DetectingDeath(currentHealth){
        currentHealth = parseInt(currentHealth)
        const health_deathSaving_icons = document.getElementsByClassName("pl-sheet-health-deathSaving")
        if (currentHealth <= 0 || isNaN(currentHealth)){
            HealthDeathSavingSwitch()
            for (const health_deathSaving_icon of health_deathSaving_icons) {
                health_deathSaving_icon.style.display = "flex";
            }
        }
        else{
            if (health_deathSaving_icons[0].style.display === "none") return;
            for (const health_deathSaving_icon of health_deathSaving_icons) {
                health_deathSaving_icon.style.display = "none";
            }
            for (let i = 1; i <= 3; i++) {
                document.getElementById("pl-sheet-deathSaving-marker-success"+i).checked = false;
                document.getElementById("pl-sheet-deathSaving-marker-fail"+i).checked = false;
            }
        }
    }

    function FailDeathSaving(){
        let count = 0;
        for (let i = 1; i <= 3; i++)
            if (document.getElementById("pl-sheet-deathSaving-marker-fail"+i).checked === true) count++;

        const health_deathSaving_icons = document.getElementsByClassName("pl-sheet-health-deathSaving")
        if (count === 3)
            for (const health_deathSaving_icon of health_deathSaving_icons)
                health_deathSaving_icon.style.display = "none";
        else
            for (const health_deathSaving_icon of health_deathSaving_icons)
                health_deathSaving_icon.style.display = "flex";
    }

    let health_deathSaving = true;
    function HealthDeathSavingSwitch(){
        if (health_deathSaving){
            document.getElementById("pl-sheet-deathSaving").style.display = "flex";
            document.getElementById("pl-sheet-health").style.display = "none";
            health_deathSaving = !health_deathSaving
        }
        else{
            document.getElementById("pl-sheet-health").style.display = "flex";
            document.getElementById("pl-sheet-deathSaving").style.display = "none";
            health_deathSaving = !health_deathSaving
        }
    }

    function InspirationSwitch(){
        myCharacter.inspiration = !myCharacter.inspiration;
    }


    function OpenSetting(){
        const setting = document.getElementById("pl-sheet-setting")
        setting.style.display = "flex";
        const pl_sheet = document.getElementById("pl-sheet")
        pl_sheet.style.display = "none";

    }
</script>
