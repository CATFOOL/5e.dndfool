<html lang="en, cn">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <title>Character Sheet</title>
    <link rel="stylesheet" href="../css/pl-sheet.css">
    <link rel="stylesheet" href="../css/pl-sheet-sidebar.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://kit.fontawesome.com/33a4ff806b.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="pl-sheet">
        <div id="pl-sheet-header">
            <div class="left">
                <div id="pl-sheet-characterIcon">
                    <img src="../img/userIcon/default.jpg" alt="user's profile icon">
                </div>
                <div id="pl-sheet-characterInfo">
                    <div class="name">Peabeey</div>
                    <div class="class-race">半精灵(木) | 牧师(生命) 5</div>
                    <div class="level">5</div>
                </div>
            </div>
            <div class="right">
                <div id="pl-sheet-shortRest">
                    <i class="fas fa-campground"></i> 短休
                </div>
                <div id="pl-sheet-longRest">
                    <i class="fas fa-moon"></i> 长休
                </div>
                <div id="pl-sheet-build">
                    <i class="fas fa-user-cog"></i> 设置&升级
                </div>
            </div>
        </div>
        <div id="pl-sheet-quickInfo" style="margin-top: 15px">
            <div id="pl-sheet-abilities">
                <div id="pl-sheet-ability-STR" class="pl-sheet-ability">
                    <div class="title">力量</div>
                    <div class="modifier">+2</div>
                    <div class="score">14</div>
                </div>
                <div id="pl-sheet-ability-DEX" class="pl-sheet-ability">
                    <div class="title">敏捷</div>
                    <div class="modifier">+2</div>
                    <div class="score">14</div>
                </div>
                <div id="pl-sheet-ability-CON" class="pl-sheet-ability">
                    <div class="title">体质</div>
                    <div class="modifier">+2</div>
                    <div class="score">14</div>
                </div>
                <div id="pl-sheet-ability-INT" class="pl-sheet-ability">
                    <div class="title">智力</div>
                    <div class="modifier">+2</div>
                    <div class="score">14</div>
                </div>
                <div id="pl-sheet-ability-WIS" class="pl-sheet-ability">
                    <div class="title">感知</div>
                    <div class="modifier">+2</div>
                    <div class="score">14</div>
                </div>
                <div id="pl-sheet-ability-CHA" class="pl-sheet-ability">
                    <div class="title">魅力</div>
                    <div class="modifier">+2</div>
                    <div class="score">14</div>
                </div>
            </div>
            <div id="pl-sheet-quickInfo-right">
                <div id="pl-sheet-proficiency">
                    <div class="title">熟练</div>
                    <div class="modifier">+2</div>
                    <div class="title2">加值</div>
                </div>
                <div id="pl-sheet-speed">
                    <div class="title">移动</div>
                    <div class="modifier">30</div>
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
                        <button id="pl-sheet-health-cal-heal">回复</button>
                        <label for="pl-sheet-health-cal-input"></label><input type="number" min="0" id="pl-sheet-health-cal-input">
                        <button id="pl-sheet-health-cal-damage">伤害</button>
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
                        <label for="pl-sheet-health-primary-current-num"></label>
                        <input type="number" min="0" id="pl-sheet-health-primary-current-num" value="999" placeholder="--" name="pl-sheet-health-primary-current-num">
                    </div>
                    <button class="pl-sheet-health-deathSaving" onclick="HealthDeathSavingSwitch()" style="display: none"><i class="fas fa-skull-crossbones"></i></button>
                </div>
                <div id="pl-sheet-deathSaving" style="display: none">
                    <div id="pl-sheet-deathSaving-title">死亡豁免</div>
                    <div id="pl-sheet-deathSaving-icon"><i class="fas fa-skull-crossbones"></i></div>
                    <div id="pl-sheet-deathSaving-markers">
                        <div id="pl-sheet-deathSaving-marker-success">
                            <div class="title">成功</div>
                            <label for="pl-sheet-deathSaving-marker-success1"></label><input type="checkbox" id="pl-sheet-deathSaving-marker-success1">
                            <label for="pl-sheet-deathSaving-marker-success2"></label><input type="checkbox" id="pl-sheet-deathSaving-marker-success2">
                            <label for="pl-sheet-deathSaving-marker-success3"></label><input type="checkbox" id="pl-sheet-deathSaving-marker-success3">
                        </div>
                        <div id="pl-sheet-deathSaving-marker-fail">
                            <div class="title">失败</div>
                            <label for="pl-sheet-deathSaving-marker-fail1"></label><input type="checkbox" id="pl-sheet-deathSaving-marker-fail1" onclick="FailDeathSaving()">
                            <label for="pl-sheet-deathSaving-marker-fail2"></label><input type="checkbox" id="pl-sheet-deathSaving-marker-fail2" onclick="FailDeathSaving()">
                            <label for="pl-sheet-deathSaving-marker-fail3"></label><input type="checkbox" id="pl-sheet-deathSaving-marker-fail3" onclick="FailDeathSaving()">
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
            <a class="closebtn" onclick="closeSidebar()">&times;</a>
        </div>
        <div id="sidebar-content">
        </div>
    </div>
</body>
</html>

<script>

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
        const icon = document.getElementById("pl-sheet-inspiration-icon")
        if (icon.style.opacity === "1"){
            icon.style.opacity = "0"
        }
        else icon.style.opacity = "1"
    }

    function NumToModifier(num){
        if (num >= 0) return "+" + num.toString()
        else if (num < 0) return  "-" + num.toString()
    }



    function closeSidebar(){
        const sidebar = document.getElementById("sidebar")
        sidebar.style.display = "none";
    }
</script>
