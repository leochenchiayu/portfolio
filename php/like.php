<?php
    require_once 'db.php';
    require_once 'json_api.php';
        // session_start();

    
        $post_id = trim($_GET["post_id"]);
        $user_id = trim($_GET["user_id"]);
        $boolval = trim($_GET["boolval"]);
        $data_no = trim($_GET["data_no"]);
        // echo $data_no;
        $date_to_thumb_up = date("Y-m-d");
    
        if($boolval == "no"){
            $stm = $mysql->query("INSERT INTO `thumb_up`(`post_id`,`user_id`,`thumb_up_time`) VALUES ($post_id,$user_id,'$date_to_thumb_up');");
            echo "no";
        }else{
            echo "yes";    
            $stm = $mysql->query("DELETE FROM thumb_up WHERE id = {$data_no} ");
        }
        create_json("thumb_up");


    
    
    
    
?>