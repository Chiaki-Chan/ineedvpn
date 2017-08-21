<?php
    include_once 'lib/config.php';
    include_once 'Public/Template/header.html';
?>
<div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <br><br>
            <a href="./index.php"><h1 class="header center blue-text"><?php echo $site_name; ?></h1></a>
            <div class="row center">
                <h6 class="header col s12 light">Across the Great Wall we can reach every corner in the world.</h6>
                <h5 class="header col s12 light">越过长城，走向世界</h5>
            </div>
            <!--div class="row center">
                <a href="user/register.php" id="download-button" class="btn-large waves-effect waves-light blue">注冊</a>
            </div-->
            <br>
        </div>
</div>


<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row"  align="center">
            <div class="col s12 m4">
                <div class="icon-block">
                <a href="send.php">
                    <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
                    <h5 class="center">免費申請</h5>
                </a>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="icon-block">
                <a href="user/login.php">
                    <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
                    <h5 class="center">登陸</h5>
                </a>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                <a href="help.php">
                    <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
                    <h5 class="center">教程/客戶端</h5>
                </a>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
    include_once 'Public/Template/footer.html';
?>