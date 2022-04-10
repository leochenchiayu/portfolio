<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="./image/Logo.png"/>

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/register.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="./css/global.css?v=<?php echo time();?>">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />

    <title>註冊</title>
</head>
<body>
    <div class="warning">
        <div class="notice">
            <h2 class="t-center pt-5">提示訊息</h2>
            <p id="content"></p>
            <a class="t-center" href="login.php">點我往登入頁面</a>
        </div>
        <div class="overlay"></div>
    </div>    
    <?php require_once 'nav.php';?>
    <?php include("./google/gconfig.php");?>
    <?php $_SESSION["mode"] = "register";?>
    <style>
            /* .nav_bar{
                position:fixed;
            } */

            
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
                 */
            /* } */



    </style>

    <h1>註冊</h1>
    <form class="register">
    <?php
        if(isset($_SESSION["has_account"]) && $_SESSION["has_account"]){
    ?>
        <div class="alert alert-danger t-center login_error" role="alert">
            已經有註冊了!!請直接登入    <a href="login.php">按我登入</a>
        </div>
    
    <?php }?>

    <?php
        if(isset($_SESSION["has_registered"]) && $_SESSION["has_registered"]){   
    ?>
        <div class="alert alert-danger t-center login_error" role="alert">
            註冊成功!    <a href="login.php">按我登入</a>
        </div>
    <?php }?>


    <form class="register">

        <h4>使用GOOGLE註冊</h4>
        <a href="<?php echo $google_client->createAuthUrl();?>"><img src="https://img.icons8.com/bubbles/2x/google-logo.png" alt=""></a>
        <h4>使用一般帳號註冊</h4>

        <div class="form-group name">
            <label for="name">姓名</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="請輸入姓名" required>
        </div>

        <div class="form-group acc">
            <label for="username">帳號</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="請輸入帳號" required>
        </div>

        <div class="form-group pw">
            <label for="password">密碼</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="請輸入密碼" required>
        </div>
        
        <div class="form-group pw" id="retype_password">
            <label for="password">確認密碼</label>
            <input type="password" class="form-control" id="repassword" name="password" placeholder="請再輸入密碼一次" required>

        </div>
        <button type="submit" class="btn btn-info">
            登入
        </button>
    </form>

</body>

<script>
    $(document).ready(function(){
        // $("#repassword").keyup(function(){
        //     if($("#password").val() ==  $("#retype_password").val()){
        //         alert($("#password").val() +":" + $("#repassword").val());
        //         $(".pw p").removeClass("error");
        //         $("form.register button[type='submit']").removeClass('disabled');
        //     }else{
        //         alert($("#password").val() +":" + $("#repassword").val());
        //         $(".pw p").addClass("error");
        //         $("form.register button[type='submit']").addClass('disabled');
        //     }
        // });
        $("form.register").submit(function(e){
            e.preventDefault();
            // if(pwd == retypepwd){
                $.ajax({
                    type:"POST",
                    url:"./php/register.php",
                    data:{
                        // "name" : name,
                        // "username" : username,
                        // "password" : password
                        name:$("#name").val(),
                        username:$("#username").val(),
                        password:$("#password").val()
                    },
                    dataType:'html'  
                }).done(function(data){
                    if(data=="yes"){
                        $(".warning").css("display","block");
                        $(".notice > #content").text("已經有註冊過了!請點往登入連結登入");
                    }else{
                        $(".warning").css("display","block");
                        $(".notice > #centent").text("註冊成功，請直接登入!");
                    }
                }).fail(function(jqXHR, textStatus, errorThrown){
                    console.log(data);

                });
            // }else{
            //     alert("密碼不相同!");
            // }
        });
    })
</script>

</html>