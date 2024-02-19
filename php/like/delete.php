<?php
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once 'database.php';
    include_once 'like.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new thumb_up($db);

    $item->id = $_GET["data_no"];
    echo '<h1>' . htmlspecialchars($input) . '</h1>';
    
    // $item->id = $data->id;
    
    if($item->delete_thumb_up()){
        // echo json_encode("Employee deleted.");
        echo ("Employee deleted.");
    }else{
        // echo json_encode("Data could not be deleted");
        echo ("Data could not be deleted");
    }
?>
