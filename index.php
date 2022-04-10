<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>陳佳佑作品集</title>
    <link rel="shortcut icon" href="./image/Logo.png"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="./css/global.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="./css/index.css?v=<?php echo time();?>">
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    
    <?php 
        session_start();
        if(isset($_SERVER["HTTP_REFERER"])){
            $previous = $_SERVER["HTTP_REFERER"];
        }else{
            $previous = "";
        }
        // echo $previous;
        // if($previous == "http://localhost/portfolio/php/logout.php"){
        //     echo "<script>
        //                 alert('登出成功!');
        //         </script>";
        // }

        if(isset($_GET["logout"]) && $_GET["logout"] == true && $previous == "http://localhost/portfolio/index.php"){
                echo "<script>
                        alert('登出成功!');
                </script>";
                $href = "http://localhost/portfolio/index.php?logout=true";

                $query = parse_url( $href, PHP_URL_QUERY );
                parse_str( $query, $params );

                // set custom paramerets
                $params['logout'] = false;

                // build query string
                $query = http_build_query( $params );

                // build url
                explode( '?', $href )[0] . '?' . $query;
        }
    ?>
    <style>
        @media(min-width:1200px){
            .nav_bar{
                position: static !important;
            }

            .nav_bar_content{
                position: absolute;
            }

            .back_to_index{
                position:static !important;
            }
        }

    </style>
    <?php require_once 'nav.php';?>
    <header class="full-width index_header">
        <div class="bg_color ">
            <div class="allh1">
                <h1 class="n1">陳佳佑</h1>
                <span></span>
                <h1 class="n2">作品集</h1>
                <span></span>
                <h1 class="n3">portfolio</h1>
                <span></span>
            </div>
        </div>     
    </header>

    <div class="full-width" id="photography">
        <div class="fixed-width vam">
            <div class="col-xl-7 col-7 layer2">
                <a href="photography.php">
                    <div class="bg_img slide-in from-left">
                        <img src="./image/index_main.jpg" alt="">
                        <div class="on_img">
                            查看內容
                        </div>
                    </div>
                    
                </a>
                <h2 class="t-center title">攝影作品</h2>
            </div>
            
            <div class="col-xl-4 col-4">
                    <p class="topic">
                        大一下(數位攝影實務)，大三上(數位攝影進階)的作品。
                    </p>
            </div>
        </div>
    </div>
    
    <div class="full-width" id="web">
        <div class="fixed-width vam">
            
            
            <div class="col-xl-4 col-4">
                    <p class="topic">
                        網頁設計作品。
                    </p>
            </div>

            <div class="col-xl-8 col-8 layer3">
                <a href="web.php">
                    <div class="bg_img slide-in from-right">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQncsjqnx8RdcZSyg0ruHHhhbEKTJ8BtnHcKg&usqp=CAU&ec=45761791" alt="">
                        <div class="on_img">
                            查看內容
                        </div>
                    </div>
                    
                </a>
                <h2 class="t-center title">網頁作品</h2>
            </div>
        </div>
    </div>
    
    <div class="full-width" id="unity">
        <div class="fixed-width vam">
            <div class="col-xl-7 col-7 layer2">
                <a href="unity.php">
                    <div class="bg_img slide-in from-left">
                        <img src="https://image.gameapps.hk/images/201410/14/u1.jpg" alt="">
                        <div class="on_img">
                            查看內容
                        </div>
                    </div>
                    
                </a>
                <h2 class="t-center title">Unity遊戲設計</h2>
            </div>
            
            <div class="col-xl-4 col-4">
                    <p class="topic">
                        Unity遊戲設計還有簡單的AR設計
                    </p>
            </div>
        </div>
    </div>
    <div class="full-width" id="app">
        <div class="fixed-width vam">
            
            
            <div class="col-xl-5 col-5">
                    <p class="topic">
                        APP-android程式設計作品。
                    </p>
            </div>

            <div class="col-xl-7 col-7 layer3">
                <a href="app.php">
                    <div class="bg_img slide-in from-right">
                        <img src="https://techcrunch.com/wp-content/uploads/2017/02/android-studio-logo.png?w=730&crop=1" alt="">
                        <div class="on_img">
                            查看內容
                        </div>
                    </div>
                    
                </a>
                <h2 class="t-center title">APP作品</h2>
            </div>
        </div>
    </div>

    <div class="full-width" id="painting">
        <div class="fixed-width vam">
            <div class="col-xl-7 col-7 layer2">
                <a href="painting.php">
                    <div class="bg_img slide-in from-right">
                        <img src="./image/super_April.jpg" alt="">
                        <div class="on_img">
                            查看內容
                        </div>
                    </div>
                    
                </a>
                <h2 class="t-center title">電腦繪圖作品</h2>
            </div>
            
            <div class="col-xl-4 col-4">
                    <p class="topic">
                        含造型設計及影像處理(之後會有CIS設計)
                    </p>
            </div>
        </div>
    </div>

    <div class="full-width" id="music_maker">
        <div class="fixed-width vam">

            <div class="col-xl-5 col-5">
                <p class="topic t-right">
                    數位內容應用作品
                </p>
            </div>

            <div class="col-xl-7 col-7 layer3">
                <a href="music_maker.php">
                    <div class="bg_img slide-in from-left">
                        <img src="https://www.magix.com/fileadmin/user_upload/Produkte/Musik/Music_Maker_2021/Neuheiten/music-maker-news-improved-ui-screenshot-int.jpg" alt="">
                        <div class="on_img">
                            查看內容
                        </div>
                    </div>
                    
                </a>
                <h2 class="t-center title">MusicMaker數位音樂作品</h2>
            </div>
            
            
        </div>
    </div>


    
</body>
<script>
    var start1 = document.getElementsByClassName("n1");
    start1[0].className="n1_active";
    var start2 = document.getElementsByClassName("n2");
    start2[0].className="n2_active";
    var start3 = document.getElementsByClassName("n3");
    start3[0].className="n3_active";

    

    const faders = document.querySelectorAll('.fade-in');
    const sliders = document.querySelectorAll('.slide-in');
    const appearOptions = {
        // root:
        threshold: 0,
        rootMargin:"0px 0px 0px 0px"
    };
    const appearOnScroll = new IntersectionObserver(function(entries,appearOnScroll) {
        entries.forEach(entry => {
            if (!entry.isIntersecting) {
                console.log("XXX");
                return;
            } else {
                console.log("yes");
                entry.target.classList.add("appear");
                appearOnScroll.unobserve(entry.target);
            }
        });
    },
    appearOptions);

    faders.forEach(fader => {
        appearOnScroll.observe(fader);
    });

    sliders.forEach(slider => {
        appearOnScroll.observe(slider);
    });

  
</script>
</html>