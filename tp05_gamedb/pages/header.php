<?php
//$logged = isset($_SESSION['nickname']) ;
?>

<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="nav-content">
            <a class="navbar-brand" href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>games_list.php">
<!--                <img src="images/MagicLogo4.png" alt="" height="40"  class="d-inline-block align-top">-->
                <div style="width: 0.5em"></div>
                <h1>Game Corner</h1>
            </a>
            <a class="navbar-brand" href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>games_list.php">
                Games
            </a>
            <a class="navbar-brand" href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>game_form.php">
                Create
            </a>
            <div style="flex: 1"></div>
        </div>
    </nav>
</header>
