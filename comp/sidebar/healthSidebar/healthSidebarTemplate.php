<html lang="en, cn">
<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/comp/header.php"?>
    <title>Health Sidebar Template</title>
    <link rel="stylesheet" href="<?php echo CURRENT_ROOT?>/styles/pl-sheet.css">
</head>

<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/comp/nav.php"?>

<div id="sidebar" style="display: flex">
    <div id="sidebar-controls">
        <a class="closebtn" onclick="CloseSidebar()">&times;</a>
    </div>
    <div id="sidebar-content">
        <div id="sidebar-header">生命值</div>

        <div id="sidebar-customise">
            <div id="sidebar-customise-content">
<!--                <div style="display: flex; width: 100%; justify-content: center;">
                    <div id="pl-sheet-health-cal" style="flex-direction: row; width: 100%; justify-content: center;">
                        <button id="pl-sheet-health-cal-heal" style="max-width: 60px; height: 28px; margin: 0 5px"
                                onclick="changeHealth(myCharacter, document.getElementById('pl-sheet-health-cal-input').value, damageTypes.Healing)">回复</button>
                        <label for="pl-sheet-health-cal-input"></label><input type="number" min="0" id="pl-sheet-health-cal-input" style="max-width: 60px; height: 28px; margin: 0 5px">
                        <button id="pl-sheet-health-cal-damage" style="max-width: 60px; height: 28px; margin: 0 5px"
                                onclick="changeHealth(myCharacter, document.getElementById('pl-sheet-health-cal-input').value, damageTypes.True)">伤害</button>
                    </div>
                </div>-->
                <div class="sidebar-customise-factor two">
                    <div class="sidebar-customise-factor-label">
                        最大生命值加值
                    </div>
                    <label>
                        <input id='sidebar-factor-maxHealth-mod' type="number" placeholder="--" value="">
                    </label>
                </div>
                <div class="sidebar-customise-factor two">
                    <div class="sidebar-customise-factor-label">
                        最大生命值覆盖值
                    </div>
                    <label>
                        <input id='sidebar-factor-maxHealth-override' type="number" placeholder="--" value="" onchange="if(parseInt(this.value) < 0) this.value = 0">
                    </label>
                </div>
            </div>
        </div>

        <div id="sidebar-description" class="bookContent">
        </div>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/comp/sidebar/sidebar.php"?>

</body>
</html>
