<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    // header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once 'work.php';
    include_once '../database.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new work($db);

    // $itemCount = $stmt->rowCount();
    $items->category = isset($_GET['category']) ? $_GET['category'] : die();
    $stmt = $items->get_work();
    $itemCount = $stmt->rowCount();

    if($itemCount > 0){
        
        $employeeArr = array();
        $employeeArr["body"] = array();
        $employeeArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            if(isset($_SESSION["id"])){
                $e = array(
                    "work_id" => $id,
                    "work_path" => $work_path,
                    "work_name" => $work_name,
                    "category" => $category,
                    "thumb_up_id" => $thumb_up_id,
                    "cnt" => $cnt
                );
            }else{
                $e = array(
                    "work_id" => $id,
                    "work_path" => $work_path,
                    "work_name" => $work_name,
                    "category" => $category,
                );
            }

            array_push($employeeArr["body"], $e);
        }
        echo json_encode($employeeArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
    // echo json_encode($itemCount);

    // $work_arr = array(
    //     "id" => $items->id,
    //     "work_path" => $items->work_path,
    //     "work_name" => $items->work_name,
    //     "category" => $items->category
    // );
    // http_response_code(200);
    // echo json_encode($work_arr);

    

?>