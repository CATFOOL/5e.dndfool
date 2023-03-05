<html lang="en, cn">
<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/comp/header.php"?>
    <title>Speed Sidebar Template</title>
    <link rel="stylesheet" href="<?php echo CURRENT_ROOT?>/styles/pl-sheet.css">
</head>

<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/comp/nav.php"?>

<div id="sidebar" style="display: flex">
    <div id="sidebar-controls">
        <a class="closebtn" onclick="CloseSidebar()">&times;</a>
    </div>
    <div id="sidebar-content">
        <div id="sidebar-header">速度</div>
        <div id="sidebar-factors">
            <div class="sidebar-customise-factor">
                <div class="sidebar-customise-factor-label">
                    行走
                </div>
                <div id='sidebar-speed-factor-value-walking' class="sidebar-factor-value">
                </div>
            </div>
            <div class="sidebar-customise-factor">
                <div class="sidebar-customise-factor-label">
                    攀爬
                </div>
                <div id='sidebar-speed-factor-value-climbing' class="sidebar-factor-value">

                </div>
            </div>
            <div class="sidebar-customise-factor">
                <div class="sidebar-customise-factor-label">
                    游泳
                </div>
                <div id='sidebar-speed-factor-value-swimming' class="sidebar-factor-value">

                </div>
            </div>
            <div class="sidebar-customise-factor">
                <div class="sidebar-customise-factor-label">
                    飞行
                </div>
                <div id='sidebar-speed-factor-value-flying' class="sidebar-factor-value">

                </div>
            </div>
            <div class="sidebar-customise-factor">
                <div class="sidebar-customise-factor-label">
                    挖掘
                </div>
                <div id='sidebar-speed-factor-value-burrowing' class="sidebar-factor-value">

                </div>
            </div>
        </div>

        <div id="sidebar-customise">
            <div id="sidebar-customise-button" onclick="SwitchCustomise()">
                <div id="sidebar-customise-button-text">自定义覆盖值</div> <i id="sidebar-customise-button-icon" class="fa fa-caret-down"></i>
            </div>
            <div id="sidebar-customise-content" style="display: none;">
                <div class="sidebar-customise-factor">
                    <div class="sidebar-customise-factor-label">
                        行走
                    </div>
                    <label>
                        <input id='sidebar-speed-factor-value-walking-override' type="number" placeholder="--" value="">
                    </label>
                    <label>
                        <input id='sidebar-speed-factor-value-walking-notes' type="text" placeholder="备注" value="" size="10">
                    </label>
                </div>
                <div class="sidebar-customise-factor">
                    <div class="sidebar-customise-factor-label">
                        攀爬
                    </div>
                    <label>
                        <input id='sidebar-speed-factor-value-climbing-override' type="number" placeholder="--" value="">
                    </label>
                    <label>
                        <input id='sidebar-speed-factor-value-climbing-notes' type="text" placeholder="备注" value="" size="10">
                    </label>
                </div>
                <div class="sidebar-customise-factor">
                    <div class="sidebar-customise-factor-label">
                        游泳
                    </div>
                    <label>
                        <input id='sidebar-speed-factor-value-swimming-override' type="number" placeholder="--" value="">
                    </label>
                    <label>
                        <input id='sidebar-speed-factor-value-swimming-notes' type="text" placeholder="备注" value="" size="10">
                    </label>
                </div>
                <div class="sidebar-customise-factor">
                    <div class="sidebar-customise-factor-label">
                        飞行
                    </div>
                    <label>
                        <input id='sidebar-speed-factor-value-flying-override' type="number" placeholder="--" value="">
                    </label>
                    <label>
                        <input id='sidebar-speed-factor-value-flying-notes' type="text" placeholder="备注" value="" size="10">
                    </label>
                </div>
                <div class="sidebar-customise-factor">
                    <div class="sidebar-customise-factor-label">
                        挖掘
                    </div>
                    <label>
                        <input id='sidebar-speed-factor-value-burrowing-override' type="number" placeholder="--" value="">
                    </label>
                    <label>
                        <input id='sidebar-speed-factor-value-burrowing-notes' type="text" placeholder="备注" value="" size="10">
                    </label>
                </div>
            </div>
            <div class="sidebar-customise-factor">
                <label for="displaying-speed" class="sidebar-customise-factor-label">角色卡速度显示：</label>
                <select id="displaying-speed">
                    <option value="walking">行走</option>
                    <option value="climbing">攀爬</option>
                    <option value="swimming">游泳</option>
                    <option value="flying">飞行</option>
                    <option value="burrowing">挖掘</option>
                </select>
            </div>
        </div>

        <div id="sidebar-description" class="bookContent">
        </div>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/comp/sidebar/sidebar.php"?>

</body>
</html>
