<?php
    require_once 'db.php';
        // session_start();
    $id = trim($_GET["id"]);
    $stm = $mysql->query("SELECT
     `work`.`id` work_id,
     `work_path`,
     `work_description`,
     `work_name`,
     `comment`.`id` comment_id,
     `comment`,
     `date_to_comment`,
     `comment`.`user_id`,
     `comment`.`post_id`,
     `user`.`name`
      FROM `work` LEFT OUTER JOIN `comment` ON comment.post_id = $id
      LEFT OUTER JOIN `user` ON `user`.`id` = `comment`.`user_id` WHERE `work`.`id` = $id ;");
    $stm->execute();
    $data = $stm->fetchAll();
    // echo $data;
    echo json_encode($data);

    
?>