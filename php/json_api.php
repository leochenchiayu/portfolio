<?php
    require_once 'db.php';
    function create_json($table){
        $response = array();
        $mysql = new PDO("mysql:host=localhost;dbname=portfolio", "root", "L125539477");
        $stm1 = $mysql->query("SELECT * from `{$table}` ; "); 
        $data1 = $stm1->fetchAll();
        $info = json_encode($data1);
        $file_name = $table.".json";
        if(file_put_contents($file_name,$info)){
            echo "success";  
        }else{
            echo "fail";
        }
    }


    




?>