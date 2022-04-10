<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./image/Logo.png"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/login.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="./css/global.css?v=<?php echo time();?>">
    <title>後台登入</title>
</head>
<body>


    <?php require_once 'nav.php';?>
    <?php include("./google/gconfig.php");?>
    <?php $_SESSION["mode"] = "login";?>
    <?php if(isset($_SESSION["has_login"]) && $_SESSION["has_login"]==true){
        echo "<div class='has_login'>
                <div class='has_login_warning'>
                    <p class='t-center'>您已經登入了，請問您要用其他帳號做登入嗎?</p>
                </div>     
              </div>";
    }?>
    
    <style>
            .has_login{
                position:fixed;
                width:100%;
                height:100%;
                background:rgba(0,0,0,.3);
            }

            .has_login_warning{
                margin:auto;
                width:60%;
                height:50px;
            }

            /* .nav_bar{
                position:fixed; */
            /* } */

            a{
                text-decoration:none !important;
                color:black !important;
            }

            nav{
                position: static;
            }
        
        /* @media(min-width: 1200px){
            .nav_bar{
                position:fixed;
            }
            
        } */

    </style>
    
    
    <h1>後台登入</h1>
    


    <form class="login">
    <?php
        if(isset($_SESSION["login_error"]) && $_SESSION["login_error"]){
    ?>
        <div class="alert alert-danger t-center login_error" role="alert">
            無此帳號，請先註冊!!
        </div>
    
    <?php }?>
        <h4>使用GOOGLE登入</h4>
        <a href="<?php echo $google_client->createAuthUrl();?>"><img src="https://img.icons8.com/bubbles/2x/google-logo.png" alt=""></a>
        <h4>使用一般帳號登入</h4>
        <div class="form-group acc">
            <label for="username">帳號</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="請輸入帳號" required>
        </div>
        <div class="form-group pw">
            <label for="password">密碼</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="請輸入密碼" required>
        </div>
        <button type="submit" class="btn btn-info">
            登入
        </button>
    </form>

    

</body>
<script>
    $(document).ready(function(){
        $("form.login").submit(function(e){
            e.preventDefault();

            // var info = new FormData();
            // info.append("account",$("#username").val());
            // info.append("pwd",$("#password").val());
            // var info = {
            //     account: $("#username").val(),
            //     pwd: $("#password").val()
            // };

            $.ajax({
            type : "POST",
            url : "./php/login.php", //因為此 login.php 是放在 admin 資料夾內，若要前往 php，就要回上一層 ../ 找到 php 才能進入 verify_user.php
            data : {
                account: $("#username").val(),
                pwd: $("#password").val()
            },
            dataType : 'html' //設定該網頁回應的會是 html 格式
          }).done(function(data) {
            //成功的時候
            console.log(data);

            if(data!="go"){
                alert(data);
            }else{
                <?php if(isset($_GET["page"])){?>
                    window.location.href="<?php echo $_GET["page"]; ?>";
                <?php }else{ ?>
                    window.location.href="index.php";
                <?php } ?>   
                // window.location.href="";
            }
            
          }).fail(function(jqXHR, textStatus, errorThrown) {
            //失敗的時候
            alert("有錯誤產生，請看 console log");
            console.log(jqXHR.responseText);
          });
        });
    });
</script>
</html>