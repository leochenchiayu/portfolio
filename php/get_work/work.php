<?php
@session_start();
class work{

    private $conn;
    private $db_table="work";

    public $id;
    public $thumb_up_id;
    public $work_path;
    public $work_name;
    public $category;
    public $cnt;

    public function __construct($db){
        $this->conn = $db;
    }

    public function get_work(){
        if(isset($_SESSION["id"])){
            $sqlQuery = "SELECT work.id id,work_path,work_name, work_description,title,category,thumb_up.id thumb_up_id,thumb_up.user_id thumb_up_user_id,(SELECT COUNT(post_id) FROM thumb_up WHERE thumb_up.post_id = work.id) AS cnt FROM work LEFT JOIN thumb_up ON (thumb_up.post_id = work.id AND thumb_up.user_id = {$_SESSION['id']}) " . " WHERE work.category = ?";
            // $sqlQuery = "SELECT * FROM work LEFT JOIN thumb_up ON (thumb_up.post_id = work.id AND thumb_up.user_id = {$_SESSION['id']} ) ORDER BY work.id" . " WHERE category = ?";
        }else{
            $sqlQuery = "SELECT * FROM work " . " WHERE category = ?";
        }
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1,$this->category);
        $stmt->execute();
        return $stmt;
        // $dataRow = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        // $this->id = $dataRow['id'];
        // $this->work_path = $dataRow['work_path'];
        // $this->work_name = $dataRow['work_name'];
        $this->category = $dataRow['category'];
    }
}


?>