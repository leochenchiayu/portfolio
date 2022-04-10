<?php
    // require_once 'db.php';
    // require_once 'json_api.php';
        // session_start();

    class thumb_up{

        private $conn;
        private $db_table="thumb_up";

        public $id;
        public $user_id;
        public $post_id;
        public $thumb_up_time;

        public function __construct($db){
            $this->conn = $db;
        }

        public function get_thumb_up(){
            $sqlQuery = "SELECT id, user_id, post_id, thumb_up_time FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        public function create_thumb_up(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        id = :id, 
                        user_id = :user_id, 
                        post_id = :post_id, 
                        thumb_up_time = :thumb_up_time";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->id=htmlspecialchars(strip_tags($this->id));
            $this->user_id=htmlspecialchars(strip_tags($this->user_id));
            $this->post_id=htmlspecialchars(strip_tags($this->post_id));
            $this->thumb_up_time=htmlspecialchars(strip_tags($this->thumb_up_time));
        
            // bind data
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":user_id", $this->user_id);
            $stmt->bindParam(":post_id", $this->post_id);
            $stmt->bindParam(":thumb_up_time", $this->thumb_up_time);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        public function getSingle_thumb_up_id(){
            $sqlQuery = "SELECT
                        id, 
                        user_id, 
                        post_id, 
                        thumb_up_time
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1 , $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->id = $dataRow['id'];
            $this->user_id = $dataRow['user_id'];
            $this->post_id = $dataRow['post_id'];
            $this->thumb_up_time = $dataRow['thumb_up_time'];
        }

        public function delete_thumb_up($thumb_up_id){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

        
        // $post_id = trim($_GET["post_id"]);
        // $user_id = trim($_GET["user_id"]);
        // $boolval = trim($_GET["boolval"]);
        // $data_no = trim($_GET["data_no"]);
        // // echo $data_no;
        // $date_to_thumb_up = date("Y-m-d");
    
        // if($boolval == "no"){
        //     $stm = $mysql->query("INSERT INTO `thumb_up`(`post_id`,`user_id`,`thumb_up_time`) VALUES ($post_id,$user_id,'$date_to_thumb_up');");
        //     echo "no";
        // }else{
        //     echo "yes";    
        //     $stm = $mysql->query("DELETE FROM thumb_up WHERE id = {$data_no} ");
        // }
        // create_json("thumb_up");


    }
    
    
    
?>