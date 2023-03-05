<?php
$verifyPath = "/styles";
$currentRoot = "./";
while (!is_dir($verifyPath)){
    $verifyPath = "../" . $verifyPath;
    $currentRoot = "../" . $currentRoot;
}
define("CURRENT_ROOT", $currentRoot);
?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="<?php echo CURRENT_ROOT?>/img/dnd_fool_logo_black.ico">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/showdown@2.1.0/dist/showdown.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <link rel="stylesheet" href="<?php echo CURRENT_ROOT?>/styles/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?php echo CURRENT_ROOT?>/styles/book.css">
    <script src="<?php echo CURRENT_ROOT?>/styles/dnd-style.js"></script>

<script>
    let CURRENT_ROOT = "<?php echo CURRENT_ROOT?>";
    let dataPath = CURRENT_ROOT + "/data/";
</script>