<link rel="stylesheet" href="<?php echo CURRENT_ROOT?>/styles/sidebar.css">

<div id="sidebar-blank-smallScreen" onclick="CloseSidebar()">

</div>
<div id="sidebar" class="animate__animated animate__faster">
    <div id="sidebar-controls">
        <a class="closebtn" onclick="CloseSidebar()">&times;</a>
    </div>
    <div id="sidebar-content">
    </div>
</div>

<script>
    let sidebarPath = CURRENT_ROOT + "/comp/sidebar/";
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.js"></script>
<script src="<?php echo CURRENT_ROOT?>/comp/sidebar/sidebar.js"></script>
<script src="<?php echo CURRENT_ROOT?>/comp/sidebar/abilitiesSidebar/abilitySidebar.js"></script>
<script src="<?php echo CURRENT_ROOT?>/comp/sidebar/plainSidebar/plainSidebar.js"></script>
<script src="<?php echo CURRENT_ROOT?>/comp/sidebar/speedSidebar/speedSidebar.js"></script>
<script src="<?php echo CURRENT_ROOT?>/comp/sidebar/healthSidebar/healthSidebar.js"></script>