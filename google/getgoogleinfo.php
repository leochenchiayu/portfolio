<?php
    include('gconfig.php');
    require_once '../php/db.php';
    // echo $current_file;
    if(isset($_GET["code"]))
    {
    //It will Attempt to exchange a code for an valid authentication token.
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
        if(!isset($token['error']))
        {
            $google_client->setAccessToken($token['access_token']);

            //Store "access_token" value in $_SESSION variable for future use.
            $_SESSION['access_token'] = $token['access_token'];

            //Create Object of Google Service OAuth 2 class
            $google_service = new Google_Service_Oauth2($google_client);

            //Get user profile data from google
            $data = $google_service->userinfo->get();

            if(!empty($data['given_name']))
            {
                $_SESSION['user_first_name'] = $data['given_name'];
            }

            if(!empty($data['family_name']))
            {
                $_SESSION['user_last_name'] = $data['family_name'];
            }

            if(!empty($data['picture']))
            {
                $_SESSION['user_image'] = $data['picture'];
            }

            if(!empty($data['email']))
            {
                $_SESSION['user_email_address'] = $data['email'];
            }

            $email = $data['email'];
            $name = $data['family_name'].$data['given_name'];
            
            if($_SESSION["mode"]=="login"){
                $stm = $mysql->query("SELECT count(*) from `user` WHERE `account` = '$email';")->fetchColumn();
                if($stm<1){
                    $_SESSION["login_error"] = true;
                    $_SESSION["user"] = "";
                    header("Location:../login.php");
                }else{
                    $stm = $mysql->query("SELECT * FROM `user` WHERE `account` = '$email';");
                    while($data = $stm->fetch()) {
                        $_SESSION["user"] = $data["name"];
                        $_SESSION["id"] = $data["id"];
                    }
                    $_SESSION["has_login"]=true;  
                    header("Location:../index.php");
                }
            }else if($_SESSION["mode"]=="register"){
                $stm = $mysql->query("SELECT count(*) from `user` WHERE `account` = '$email';")->fetchColumn();
                if($stm>0){
                    $_SESSION["has_account"] = true;
                }else{
                    $query = $mysql->query("INSERT INTO `user` (`account`,`name`) VALUES ('$email','$name');");
                    $count = $query->rowCount();
                    echo $count;
                    $_SESSION["has_registered"]=true;
                    $_SESSION["has_account"] = false;
                }
                header("Location:../register.php");
            }

        }
    }

?>