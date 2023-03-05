<html lang="en, cn">
<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/comp/header.php"?>
    <title>Ability Sidebar Template</title>
    <link rel="stylesheet" href="<?php echo CURRENT_ROOT?>/styles/pl-sheet.css">
</head>

<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/comp/nav.php"?>

<div id="sidebar" style="display: flex">
    <div id="sidebar-controls">
        <a class="closebtn" onclick="CloseSidebar()">&times;</a>
    </div>
    <div id="sidebar-content">
        <div id="sidebar-header">力量 8<span id="sidebar-header-mod">(-1)</span></div>
        <div id="sidebar-factors">
            <div class="sidebar-customise-factor">
                <div class="sidebar-customise-factor-label">
                    基础值
                </div>
                <div id='sidebar-ability-factor-value-base' class="sidebar-factor-value">

                </div>
            </div>
            <div class="sidebar-customise-factor">
                <div class="sidebar-customise-factor-label">
                    种族属性
                </div>
                <div id='sidebar-ability-factor-value-racial' class="sidebar-factor-value">

                </div>
            </div>
            <div class="sidebar-customise-factor">
                <div class="sidebar-customise-factor-label">
                    成长属性
                </div>
                <div id='sidebar-ability-factor-value-improvement' class="sidebar-factor-value">

                </div>
            </div>
            <div class="sidebar-customise-factor">
                <div class="sidebar-customise-factor-label">
                    杂项、专长
                </div>
                <div id='sidebar-ability-factor-value-misc' class="sidebar-factor-value">

                </div>
            </div>
            <div class="sidebar-customise-factor">
                <div class="sidebar-customise-factor-label">
                    叠加、魔法物品
                </div>
                <div id='sidebar-ability-factor-value-stacking' class="sidebar-factor-value">

                </div>
            </div>
            <div class="sidebar-customise-factor">
                <div class="sidebar-customise-factor-label">
                    最小值
                </div>
                <div id='sidebar-ability-factor-value-min' class="sidebar-factor-value">

                </div>
            </div>
        </div>

        <div id="sidebar-customise">
            <div id="sidebar-customise-content">
                <div class="sidebar-customise-factor">
                    <div class="sidebar-customise-factor-label">
                        其他加值
                    </div>
                    <label>
                        <input id='sidebar-ability-factor-value-other' type="number" placeholder="--" value="">
                    </label>
                </div>
                <div class="sidebar-customise-factor">
                    <div class="sidebar-customise-factor-label">
                        覆盖值
                    </div>
                    <label>
                        <input id='sidebar-ability-factor-value-override' type="number" placeholder="--" value="">
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
