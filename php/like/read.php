<?php
    // require_once 'db.php';
    // function create_json($table){
    //     $response = array();
    //     $mysql = new PDO("mysql:host=localhost;dbname=portfolio", "root", "L125539477");
    //     $stm1 = $mysql->query("SELECT * from `{$table}` ; "); 
    //     $data1 = $stm1->fetchAll();
    //     $info = json_encode($data1);
    //     $file_name = $table.".json";
    //     if(file_put_contents($file_name,$info)){
    //         echo "success";  
    //     }else{
    //         echo "fail";
    //     }
    // }

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../like.php';
    include_once '../database.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Employee($db);

    $data = json_decode(file_get_contents("php://input"));
    
    $item->id = $data->id;
    $item->user_id = $data->user_id;
    $item->post_id = $data->post_id;
    $item->thumb_up_id = $data->thumb_up_id;
    $item->created = date('Y-m-d H:i:s');
    
    if($item->get_thumb_up(){
        echo 'Employee created successfully.';
    } else{
        echo 'Employee could not be created.';
    }
    

    // $file_name = 'thumb_up.json';

    // if(file_put_contents($file_name,get_data())){
    //     echo $file_name.'file created';
    // }else{
    //     echo "There is some error!";
    // }


?>