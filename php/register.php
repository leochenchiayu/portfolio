<?php

    require_once 'db.php';

    $username = $_POST["username"];
    $name = $_POST["name"];
    $password = sha1($_POST["password"]);

    $stm = $mysql->query("SELECT count(*) from `user` WHERE `account` = '$username'or `name` = '$name';")->fetchColumn();
    if($stm>0){
        echo "yes";
    }else{
        $query = $mysql->query("INSERT INTO `user` (`account`,`password`,`name`) VALUES ('$username','$password','$name');");
        $count = $query->rowCount();
        echo $count;
        $_SESSION["register_success"];
    }



?>