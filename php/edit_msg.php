<?php
    require_once 'db.php';
        // session_start();
    $id = $_GET["id"];
    $value = $_GET["value"];
    $stm = $mysql->query("UPDATE `comment` SET `comment` = '$value' WHERE `id` = $id ;");
  

    // if($boolval == "no"){
    //     $stm = $mysql->query("INSERT INTO `thumb_up`(`post_id`,`user_id`,`thumb_up_time`) VALUES ($post_id,$user_id,'$date_to_thumb_up');");
    //     if($stm > 0){
    //         echo "yes";
    //     }
    // }else if($boolval=="yes"){
    //     $stm = $mysql->query("DELETE FROM `thumb_up` WHERE id = $data_no");
    // }else{
    //     echo "else";
    // }    
    
?>