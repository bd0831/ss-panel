<?php
include_once 'lib/config.php';
include_once 'header.php';
$count=$db->count("user");
?>


<div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <br><br>
            <h1 class="header center orange-text"><?php echo $site_name; ?></h1>
            <div class="row center">
                <h5 class="header col s12 light">轻松!!!</h5>
            </div>
            <div class="row center">
                <a href="user/register.php" id="download-button" class="btn-large waves-effect waves-light orange">立即注册</a>
            </div>
            <br><br>
        </div>
</div>


<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
                    <h5 class="center">Super Fast</h5>

                    <p class="light">
                        Bleeding edge techniques using Asynchronous I/O and Event-driven programming.
                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
                    </br>
                    <h5 class="center">已有<?php echo $count;?>人使用本服务</h5>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
                    <h5 class="center">Easy to work with</h5>

                    <p class="light">
                        Available on multiple platforms, including PC, MAC, Mobile (Android and iOS) and Routers (OpenWRT).
                    </p>
                </div>
            </div>
        </div>

    </div>
    <br><br>

    <div class="section">

    </div>
</div>
<?php include_once 'footer.php';?>
