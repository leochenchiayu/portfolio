<?php
    require_once 'db.php';
    
    $account = $_POST["account"];
    $password = sha1($_POST["pwd"]);

    $stm = $mysql->query("SELECT count(*) from `user` WHERE `account` = '$account' AND `password` = '$password';")->fetchColumn();
    if($stm<1){
        echo "帳號不存在!!";
        $_SESSION["login_error"]=true;
    }else{
        $stm = $mysql->query("SELECT * FROM `user` WHERE `account` = '$account';");
        while($data = $stm->fetch()) {
            $_SESSION["user"] = $data["name"];
            $_SESSION["id"] = $data["id"];
        }
        $_SESSION["has_login"]=true;        
        echo "go";
    }

?>