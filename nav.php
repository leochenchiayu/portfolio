<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./script/hamburger.js"></script>
    <link rel="stylesheet" href="./css/global.css?v=<?php echo time();?>">
    <!-- <title>Document</title> -->
</head>
<body>
<?php
        @session_start();
        $current_file = $_SERVER['PHP_SELF'];
        $current_file = basename($current_file);    
    ?>
    <nav class="nav_bar clearfix">

        <ul id="hamburger_ul">
            <li>
                <a href="javascript:void(0)" class="hamburger">
                    <span></span>
                </a>
            </li>
        </ul>

        <div class="index">
            <ul>
                <li><a id="fontid" href="index.php">回首頁</a></li>
                <li id="split">|</li>
                <?php
                    if(isset($_SESSION['user']) && $_SESSION['user']!=""){
                ?>
                <li><a class="user" href="#"><?php echo $_SESSION['user'],"您好!";?></a></li>
                <?php }?> 
            </ul>

        </div>

        <div class="collapse_menu">
            <!-- <div class="menu"> -->
                <ul>
                    <li id="split">|</li>
                    <li><a id="fontid" href="unity.php" <?php echo ($current_file == "unity.php")?'class="this_page"':'' ;?>>unity遊戲設計</a></li>
                    <li id="split">|</li>
                    <li><a id="fontid" href="music_maker.php" <?php echo ($current_file == "music_maker.php")?'class="this_page"':'' ;?>>MusicMaker</a></li>
                    <li id="split">|</li>
                    <li><a id="fontid" href="painting.php" <?php echo ($current_file == "painting.php")?'class="this_page"':''; ?>>電腦繪圖</a></li>
                    <li id="split">|</li>
                    <li><a id="fontid" href="photography.php" <?php echo ($current_file == "photography.php")?'class="this_page"':'' ?>>攝影</a></li>
                    <li id="split">|</li>
                    <li><a id="fontid" href="web.php" <?php echo ($current_file == "web.php")?'class="this_page"':''; ?>>網頁</a></li>
                    <li id="split">|</li>
                    <li><a id="fontid" href="app.php" <?php echo ($current_file == "app.php")?'class="this_page"':'' ;?>>APP</a></li>
                    <li id="split">|</li>
                    <li><a id="fontid" href="register.php" <?php echo ($current_file == "register.php")?'class="this_page"':'' ;?>>註冊</a></li>
                    <li id="split">|</li>
                    <?php if(!isset($_SESSION["has_login"]) || $_SESSION["has_login"]==false){ ?>
                        <li><a id="fontid" href="login.php" <?php echo ($current_file == "login.php")?'class="this_page"':'' ;?>>後台登入</a></li>
                    <?php }else{ ?>
                        <li><a id="fontid" href="./php/logout.php" <?php echo ($current_file == "./php/logout.php")?'class="this_page"':'' ;?>>登出</a></li>
                    <?php }?>
                </ul>
            <!-- </div> -->
        </div>
    </nav>
</body>



</html>