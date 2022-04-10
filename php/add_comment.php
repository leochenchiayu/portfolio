<?php
    require_once 'db.php';
        // session_start();
    $id = trim($_GET["id"]);
    $user_id = trim($_GET["user_id"]);
    $comment = $_GET["comment"];
    $date_to_comment = date("Y-m-d");
    $stm = $mysql->query("INSERT INTO `comment`(`post_id`,`user_id`,`comment`,`date_to_comment`) VALUES ( $id,$user_id,'$comment','$date_to_comment');");
    
    $data = array();
    $data[0]["date_to_comment"] = $date_to_comment;
    $stm = $mysql->query("SELECT MAX(id) AS `max_id` FROM `comment`");
    while($i = $stm->fetch()){
        $data[0]["id"] = $i["max_id"];
    }
    echo json_encode($data);

    
?>