<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>APP作品</title>
    <link rel="shortcut icon" href="./image/Logo.png"/>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <link rel="stylesheet" href="./css/app.css?v=<?php echo time();?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/global.css?v=<?php echo time();?>">
</head>
<body>
    <?php require_once './php/db.php';?>
    <?php require_once 'nav.php';
    if(isset($_SESSION["id"])){
        $user_id = $_SESSION['id'];
    }else{
        $user_id = "";
    }
    if(isset($_SESSION["user"])){
        $user = $_SESSION["user"];
    }
    ?>
    
    <header class="full-width" id="app">
        <h1>APP作品</h1>
    </header>

    <div class="full-width clearfix my_work">
        <div class="fixed-width">
            <div class="col-xl-12 col-12">
                <h1 class="t-center">作品尚在整理中!</h1>
            </div>
        </div>
    </div>

 
</body>
<script>
    


</script>
</html>