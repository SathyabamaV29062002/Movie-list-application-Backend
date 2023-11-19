<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div id="sidebar">
    <div class="sidebar-header">
        <h3><img src="img/sathyabama.jpg" class="img-fluid" /><span>Sathyabama</span></h3>
    </div>
    <ul class="list-unstyled component m-0">
        <li class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
            <a href="index.php" class="dashboard"><i class="material-icons">dashboard</i>Movie </a>
        </li>
        <li class="<?php echo ($current_page == 'mvreport.php') ? 'active' : ''; ?>">
            <a href="mvreport.php" class="dashboard"><i class="material-icons">dashboard</i>Movie Report</a>
        </li>
    </ul>
</div>
