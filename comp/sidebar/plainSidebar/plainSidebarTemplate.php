<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/comp/header.php"?>
    <title>Plain Sidebar Template</title>
    <link rel="stylesheet" href="<?php echo CURRENT_ROOT?>/styles/pl-sheet.css">
</head>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/comp/nav.php"?>

<div id="sidebar" style="display: flex">
    <div id="sidebar-controls">
        <a class="closebtn" onclick="CloseSidebar()">&times;</a>
    </div>
    <div id="sidebar-content">
        <div id="sidebar-description" class="bookContent">
        </div>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/comp/sidebar/sidebar.php"?>

</body>
</html>