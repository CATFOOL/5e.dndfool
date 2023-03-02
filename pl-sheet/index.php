<html lang="en, cn">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <title>角色卡</title>
    <link rel="icon" type="image/x-icon" href="../img/dnd_fool_logo_black.ico">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/pl-sheet.css">
    <link rel="stylesheet" href="../styles/book.css">
    <link rel="stylesheet" href="../styles/pl-sheet-sidebar.css">
    <link rel="stylesheet" href="../styles/pl-sheet-setting.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/showdown@2.1.0/dist/showdown.min.js"></script>
    <script src="https://kit.fontawesome.com/33a4ff806b.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="navbar-container">
    <div class="navbar_menu_button" onclick="navBar_menu_button()">
        <i class='fas fa-bars'></i>
    </div>
    <div class="navbar">
        <a>首页</a>
        <div class="nav-dropdown">
            <button class="nav-dropdown-btn">书籍 <i class="fa fa-caret-down"></i></button>
            <div class="nav-dropdown-content">
                <div class="nav-dropdown2">
                    <button class="nav-dropdown-btn2">规则书 <i class="fa fa-caret-down"></i></button>
                    <div class="nav-dropdown-content2">
                        <a>魔邓肯出品：多元宇宙的怪物</a>
                        <a>Careers</a>
                        <a>Company</a>
                        <a>Careers</a>
                        <a>Company</a>
                        <a>Careers</a>
                        <a>Company</a>
                        <a>Careers</a>
                        <a>Company</a>
                        <a>Careers</a>
                        <a>Company</a>
                        <a>Careers</a>
                    </div>
                </div>
                <div class="nav-dropdown2">
                    <button class="nav-dropdown-btn2">冒险模组 <i class="fa fa-caret-down"></i></button>
                    <div class="nav-dropdown-content2">
                        <a>Dragonlance: Shadow of the Dragon Queen</a>
                        <a>Careers</a>
                        <a>Company</a>
                        <a>Careers</a>
                        <a>Company</a>
                        <a>Careers</a>
                        <a>Company</a>
                        <a>Careers</a>
                        <a>Company</a>
                        <a>Careers</a>
                        <a>Company</a>
                        <a>Careers</a>
                        <a>Careers</a>
                        <a>Company</a>
                        <a>Careers</a>
                    </div>
                </div>
            </div>
        </div>
        <div tabindex="0" class="nav-dropdown">
            <button class="nav-dropdown-btn">玩家选项 <i class="fa fa-caret-down"></i></button>
            <div class="nav-dropdown-content">
                <a>角色卡</a>
                <a>职业</a>
                <a>种族</a>
                <a>背景</a>
                <a>专长</a>
                <a>动作</a>
            </div>
        </div>
        <div tabindex="0" class="nav-dropdown">
            <button class="nav-dropdown-btn">参考数据 <i class="fa fa-caret-down"></i></button>
            <div class="nav-dropdown-content">
                <a>法术</a>
                <a>怪兽图鉴</a>
                <a>状态&疾病</a>
                <a>神祇</a>
                <a>物品</a>
                <a>语言</a>
            </div>
        </div>
        <a>DM工具</a>

    </div>
</div>


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
            <div id="pl-sheet-ability-STR" class="pl-sheet-ability" onclick="OpenAbilitySidebar(myCharacter, ability.STR)">
                <div class="title">力量</div>
                <div id="pl-sheet-ability-STR-mod" class="modifier">+2</div>
                <div id="pl-sheet-ability-STR-score" class="score">14</div>
            </div>
            <div id="pl-sheet-ability-DEX" class="pl-sheet-ability" onclick="OpenAbilitySidebar(myCharacter, ability.DEX)">
                <div class="title">敏捷</div>
                <div id="pl-sheet-ability-DEX-mod" class="modifier">+2</div>
                <div id="pl-sheet-ability-DEX-score" class="score">14</div>
            </div>
            <div id="pl-sheet-ability-CON" class="pl-sheet-ability" onclick="OpenAbilitySidebar(myCharacter, ability.CON)">
                <div class="title">体质</div>
                <div id="pl-sheet-ability-CON-mod" class="modifier">+2</div>
                <div id="pl-sheet-ability-CON-score" class="score">14</div>
            </div>
            <div id="pl-sheet-ability-INT" class="pl-sheet-ability" onclick="OpenAbilitySidebar(myCharacter, ability.INT)">
                <div class="title">智力</div>
                <div id="pl-sheet-ability-INT-mod" class="modifier">+2</div>
                <div id="pl-sheet-ability-INT-score" class="score">14</div>
            </div>
            <div id="pl-sheet-ability-WIS" class="pl-sheet-ability" onclick="OpenAbilitySidebar(myCharacter, ability.WIS)">
                <div class="title">感知</div>
                <div id="pl-sheet-ability-WIS-mod" class="modifier">+2</div>
                <div id="pl-sheet-ability-WIS-score" class="score">14</div>
            </div>
            <div id="pl-sheet-ability-CHA" class="pl-sheet-ability" onclick="OpenAbilitySidebar(myCharacter, ability.CHA)">
                <div class="title">魅力</div>
                <div id="pl-sheet-ability-CHA-mod" class="modifier">+2</div>
                <div id="pl-sheet-ability-CHA-score" class="score">14</div>
            </div>
        </div>
        <div id="pl-sheet-quickInfo-right">
            <div id="pl-sheet-proficiency">
                <div class="title">熟练</div>
                <div id="pl-sheet-proficiencyBonus" class="modifier">+2</div>
                <div class="title2">加值</div>
            </div>
            <div id="pl-sheet-speed">
                <div class="title">移动</div>
                <div id="pl-sheet-speed-walking" class="modifier">30</div>
                <div class="title2">速度</div>
            </div>
            <div id="pl-sheet-inspiration">
                <div id="pl-sheet-inspiration-icon-container" onclick=InspirationSwitch()>
                <i class='fas fa-dice-d20' id="pl-sheet-inspiration-icon" style="opacity: 1"></i>
                </div>
                <div class="title2">激励骰</div>
            </div>
            <div id="pl-sheet-health">
                <div id="pl-sheet-health-title">生命值</div>
                <!---->
                <div id="pl-sheet-health-cal">
                    <button id="pl-sheet-health-cal-heal"
                            onclick="changeHealth(myCharacter, document.getElementById('pl-sheet-health-cal-input').value, damageTypes.Healing)">回复</button>
                    <label for="pl-sheet-health-cal-input"></label><input type="number" min="0" id="pl-sheet-health-cal-input">
                    <button id="pl-sheet-health-cal-damage"
                            onclick="changeHealth(myCharacter, document.getElementById('pl-sheet-health-cal-input').value, damageTypes.True)">伤害</button>
                </div>
                <!---->
                <div id="pl-sheet-health-primary">
                    <div id="pl-sheet-health-primary-current">
                        <div class="title">当前</div>
                        <label for="pl-sheet-health-primary-current-num"></label>
                        <input type="number" min="0" id="pl-sheet-health-primary-current-num" placeholder="--" value="998" onblur="DetectingDeath(this.value)"
                               name="pl-sheet-health-primary-current-num">
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
                    <input type="number" min="0" id="pl-sheet-health-primary-temp-num" value="999" placeholder="--" name="pl-sheet-health-primary-temp-num">
                </div>
                <button class="pl-sheet-health-deathSaving" onclick="HealthDeathSavingSwitch()" style="display: none"><i class="fas fa-skull-crossbones"></i></button>
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
                <button class="pl-sheet-health-deathSaving" onclick="HealthDeathSavingSwitch()" style="display: none"><i class="fas fa-heartbeat"></i></button>
            </div>
        </div>
    </div>

    <div id="pl-sheet-subInfo">
        <div id="pl-">
        </div>
    </div>
</div>

<div id="sidebar">
    <div id="sidebar-controls">
        <a class="closebtn" onclick="CloseSidebar()">&times;</a>
    </div>
    <div id="sidebar-content">

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



</body>
</html>

<script src="../styles/navbar.js"></script>
<script src="./pl-data.js"></script>
<script src="sidebar/sidebar.js"></script>
<script src="sidebar/abilitySidebar.js"></script>
<script src="sidebar/healthSidebar.js"></script>

<script>
    let sidebarPath = "./sidebar/";

    LoadPlData(pl_data);

    function GroupCheckboxes(element){
        element.checked = !element.checked;
        let checkboxes = element.parentElement.getElementsByClassName("checkbox");
        let checkboxes_array = Array.prototype.slice.call(checkboxes);
        let onclickIndex = checkboxes_array.indexOf(element) + 1;
        let totalChecked = 0;
        for (const checkbox of checkboxes) {
            if (checkbox.checked){
                totalChecked++;
            }
        }
        if (onclickIndex > totalChecked){
            CheckFirst(checkboxes);
        }
        else{
            UncheckLast(checkboxes);
        }
    }

    function CheckFirst(checkboxes){
        for (const checkbox of checkboxes) {
            if (!checkbox.checked){
                checkbox.checked = true;
                break;
            }
        }
    }

    function UncheckLast(checkboxes){
        for (let i = checkboxes.length-1; i >= 0; i--) {
            if (checkboxes[i].checked){
                checkboxes[i].checked = false;
                break;
            }
        }
    }

    function DetectingDeath(currentHealth){
        currentHealth = parseInt(currentHealth)
        const health_deathSaving_icons = document.getElementsByClassName("pl-sheet-health-deathSaving")
        if (currentHealth <= 0){
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

    function CloseSidebar(){
        const sidebar = document.getElementById("sidebar")
        sidebar.style.display = "none";
    }
</script>
