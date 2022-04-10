<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>攝影作品</title>
    <link rel="shortcut icon" href="./image/Logo.png"/>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <link rel="stylesheet" href="./css/photography.css?v=<?php echo time();?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/global.css?v=<?php echo time();?>">
</head>
<body>
    <?php require_once './php/db.php';?>
<?php require_once 'nav.php';
    if(isset($_SESSION["id"])){
        $user_id = $_SESSION['id'];
    }else{
        $user_id = "";
    }
    if(isset($_SESSION["user"])){
        $user = $_SESSION["user"];
    }
    ?>
    <div class="modal" id="modal2">
        <div class="wrapper">
            <a href="#" class="close">關閉</a>
            <h2 class="t-center"></h2>
            <img src="" alt="">
            <div id="content"></div>
            <div class="user_comment"></div>
            <?php if(isset($_SESSION["id"])){ ?>
                <div class="input_comment">
                    <input type="text">
                    <a href="javascript:void(0)" data-id="" data-user="<?php echo $user_id; ?>" class="btn btn-primary" id="submit_comment">送出</a>
                </div>
            <?php }else{?>
                <p id="login_first_to_comment">請先登入才可留言!!</p>
            <?php }?>        
            </div>
            <div class="overlay"></div>
    </div>    
        <header class="full-width" id="photo">
            <h1>攝影作品</h1>
        </header>
        
        <div class="full-width" id="my_photo_work">
            <div class="fixed-width clearfix">
                <div class="col-xl-12 col-12">
                    <h1 class="t-center title">大一攝影作品</h1>
                </div>
                <div class="col-xl-12 col-12">
                <?php
                    $stmt = $mysql->query("SELECT pic_type,category,work.id w_id,work_path,title
                    FROM work WHERE `category` = 'photography' AND `title` = '大一攝影作品'");
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rows as $row){ 
                        if($row["pic_type"] == 1){
                        ?>
                            <div class="col-lg-6 col-12">
                        <?php }else{ ?>
                            <div class="col-lg-12 col-12 type2">
                        <?php } ?>    
                                <div class="work_bg">
                                    <div class="img">
                                       <img class="top" src="<?php echo $row["work_path"]; ?>" alt="">
                                        <div class="on_img">
                                            <img src="<?php echo $row["work_path"]; ?>" alt="">
                                            <div class="black_on"></div>
                                            <div class="click_me" data-id="<?php echo $row["w_id"]; ?>" data-modal="<?php echo "img",$row["w_id"]; ?>">點我查看</div>
                                        </div>
                                    </div>
                                    <div class="like_div grow <?php
                                                $stm = $mysql->query("SELECT COUNT(post_id) cnt_post_id FROM thumb_up WHERE `post_id` = {$row['w_id']};"); 
                                                while($data = $stm->fetch()){
                                                    $thumb_up_cnt = $data['cnt_post_id'];
                                                }
                                                if($user_id != ""){
                                                    $stm = $mysql->query("SELECT `id`,`user_id`,`post_id` FROM thumb_up WHERE `post_id` = {$row['w_id']} AND `user_id` = $user_id ;");
                                                    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach($data as $datas){
                                                        $thumb_up_id = $datas['id'];
                                                        echo "liked";
                                                    }
                                                }
                                                ?>">
                                                <i data-id="<?php echo $row["w_id"]; ?>" class="fa fa-thumbs-up fa-3x like" aria-hidden="true" 
                                                    data-no='<?php echo (!isset($thumb_up_id))? "" : $thumb_up_id ; ?>' <?php echo ($user_id == "")? "onClick='login_first()'": ""; ?>> <?php echo (!isset($thumb_up_cnt))? 0 : $thumb_up_cnt ; ?></i>
                                        <a class="my_comment" data-id="<?php echo $row["w_id"]; ?>" data-modal="<?php echo "img",$row["w_id"]; ?>" href="javascript:void(0)">我要留言</a>
                                    </div>
                                </div>
                            </div>        
                <?php } ?>
                </div>
                
                <div class="col-xl-12 col-12">
                    <h1 class="t-center title">大三攝影作品</h1>
                </div>
                <div class="col-xl-12 col-12">
                <?php
                    $stmt = $mysql->query("SELECT pic_type,category,work.id w_id,work_path,title
                    FROM work WHERE `category` = 'photography' AND `title` = '大三攝影作品'");
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rows as $row){ 
                        if($row["pic_type"] == 1){
                        ?>
                            <div class="col-lg-6 col-12">
                        <?php }else{ ?>
                            <div class="col-lg-12 col-12 type2">
                        <?php } ?>    
                                <div class="work_bg">
                                    <div class="img">
                                       <img class="top" src="<?php echo $row["work_path"]; ?>" alt="">
                                        <div class="on_img">
                                            <img src="<?php echo $row["work_path"]; ?>" alt="">
                                            <div class="black_on"></div>
                                            <div class="click_me" data-id="<?php echo $row["w_id"]; ?>" data-modal="<?php echo "img",$row["w_id"]; ?>">點我查看</div>
                                        </div>
                                    </div>
                                    <div class="like_div grow <?php
                                                $stm = $mysql->query("SELECT COUNT(post_id) cnt_post_id FROM thumb_up WHERE `post_id` = {$row['w_id']};"); 
                                                while($data = $stm->fetch()){
                                                    $thumb_up_cnt = $data['cnt_post_id'];
                                                }
                                                if($user_id != ""){
                                                    $stm = $mysql->query("SELECT `id`,`user_id`,`post_id` FROM thumb_up WHERE `post_id` = {$row['w_id']} AND `user_id` = $user_id ;");
                                                    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach($data as $datas){
                                                        $thumb_up_id = $datas['id'];
                                                        echo "liked";
                                                    }
                                                }
                                                ?>">
                                                <i data-id="<?php echo $row["w_id"]; ?>" class="fa fa-thumbs-up fa-3x like" aria-hidden="true" 
                                                    data-no='<?php echo (!isset($thumb_up_id))? "" : $thumb_up_id ; ?>' <?php echo ($user_id == "")? "onClick='login_first()'": ""; ?>> <?php echo (!isset($thumb_up_cnt))? 0 : $thumb_up_cnt ; ?></i>
                                        <a class="my_comment" data-id="<?php echo $row["w_id"]; ?>" data-modal="<?php echo "img",$row["w_id"]; ?>" href="javascript:void(0)">我要留言</a>
                                    </div>
                                </div>
                            </div>        
                <?php } ?>
                </div>
            </div>
        </div>        

 
</body>
<script>
    let res = "";
    function login_first(){
        alert("請先登入!!");
        window.location.href = 'login.php?page=<?php echo $current_file; ?>';
    }

    $(document).ready(function(){
        $("a,div").click(function(e){
            if($(this).attr("class") == "click_me" || $(this).attr("class") == "my_comment"){
                e.preventDefault();
                let target = $(this).attr("data-modal");
                $("#modal2").css("display","inline-block");
                var id = $(this).attr("data-id");
                $.get(
                    "./php/get_comment.php",
                    { id:id },
                ).done(function(data){
                    console.log(data);
                    comment = $.parseJSON(data);
                    let res = "";
                    let content = "";
                    
                    for(var i=0;i<comment.length;i++){
                        $(".wrapper > img").attr("src",comment[i].work_path);
                        $("#submit_comment").attr("data-id",comment[i].work_id);
                        content = comment[i].work_name;
                        content = content + "<br />" + comment[i].work_description;
                        let userid = <?php echo (isset($_SESSION['id']))? $user_id : " '' " ; ?>;
                        res = res + "<ul class='user_comment_section'>";
                        if(comment[i].user_id != null){
                            if(comment[i].user_id == userid){
                                res = res + "<a href='javascript:void(0)' class='delete_msg' data-id='" + comment[i].comment_id + "'>刪除</a>";
                                res = res + "<a href='javascript:void(0)' class='edit_msg' data-id='" + comment[i].comment_id + "'>編輯</a>";
                            }
                            res = res + "<li class='user'>" + comment[i].name +"<span class='date_to_comment'>" + comment[i].date_to_comment + "</span>" + "</li>";
                            res = res + "<li class='comment'>" + comment[i].comment + "</li>";
                            res = res + "</ul>";
                        }else{
                            res = res + "<p class='no_comment'>尚無留言!</p>";
                        }
                    }
                    $("#content").html(content)
                    $(".user_comment").html(res);
                });
            }else if($(this).attr("id") == "submit_comment"){
                let id = $(this).attr("data-id");
                let user_id = <?php echo (isset($_SESSION['id']))? $user_id : "''" ;?>;
                let comment = $(this).siblings("input").val();
                
                $.get(
                    "./php/add_comment.php",
                    { 
                        id:id, 
                        user_id:user_id,
                        comment:comment,
                    },
                ).done(function(data){
                    let x = $.parseJSON(data);
                    let info = "";
                    for(var i=0;i<x.length;i++){
                        info = info + "<ul class='user_comment_section'>";
                        info = info + "<a href='javascript:void(0)' class='delete_msg' data-id='" + x[i].id + "'>刪除</a>";
                        info = info + "<a href='javascript:void(0)' class='edit_msg' data-id='" + x[i].id + "'>編輯</a>";                    
                        info = info + "<li class='user'>" + '<?php echo (isset($_SESSION["user"]))? $_SESSION["user"]:" "; ?>' +"<span class='date_to_comment'>" + x[i].date_to_comment + "</span>" + "</li>";
                        info = info + "<li class='comment'>" + comment + "</li>";
                        info = info + "</ul>";
                        console.log(info);
                    }
                    document.getElementsByClassName("user_comment")[0].innerHTML += info;
                    $(".no_comment").parent().fadeOut();
                    $(".wrapper").animate({scrollTop:$(document).height()},'slow');
                    // $(".wrapper").animate({scrollTop:0},'slow'); scroll to the top of the page
                });
                $(this).siblings("input").val("");

            }
        });

        let id_new_comment;

        
        $(document).on("click",".delete_msg",function(){
                id_new_comment = $(this).attr("data-id");
                
                $.get(
                    "./php/delete_msg.php",
                    {id:id_new_comment},
                ).done(function(data){

                })

                $(this).parent().fadeOut();
        });

        // $(document).on("click",function(e){
        //     if(!$(e.target).closest(".user_comment").length){
        //         $(".new_comment").
        //     }
        // });
        let edit_btn = false;
        let comment;
        $(document).on("click",".edit_msg",function(event){
                edit_btn = true;
                let val = $(this).siblings(".comment").text();
                let data_id = $(this).attr("data-id");
                comment = $(this).siblings(".comment").text();
                $(this).siblings(".comment").replaceWith("<input type='text' data-id='" + data_id + "' class='new_comment' value='" + val + "'><a class='new_comment_btn edit_msg_sent' href='javascript:void(0)'>確認編輯</a>");
        });

        $(document).on("click",".edit_msg_sent",function(event){
                if(event.target.className == "new_comment_btn edit_msg_sent"){
                    let id = $(this).siblings(".new_comment").attr("data-id");
                    let value = $(this).siblings(".new_comment").val();
                    console.log($(this).attr("class"));
                    console.log(id);
                    console.log(value);
                    $.get(
                        "./php/edit_msg.php",
                        {
                            id:id,
                            value:value,
                        },
                    ).done(function(data){
                        console.log(data);
                    })
                    $(this).siblings(".new_comment").replaceWith("<li class='comment'>" + value + "</li>");
                    $(this).fadeOut();
                }
                // else if(event.target.className != "new_comment" && edit_btn == true && event.target.className != "edit_msg"){
                    // console.log(event.target.className);
                    // $(".user_comment_section > input").replaceWith("<li class='comment'>" + comment + "</li>");
                    // $(".edit_msg_sent").fadeOut();
                    // edit_btn = false;
                    // comment="";
                // }
            }
        );

        // $("body").click(function(event){
        //     if(event.target.className != "new_comment" && edit_btn == true){
                
        //     }
        // })

        

        $(".close").click(function(e){
            e.preventDefault();
            $("#modal2").css("display","none");
        });

        $(".like").click(function(){
            let user_id = '<?php if( isset($_SESSION["id"]) == true ){
                echo $_SESSION["id"];
            }else{
                echo " ";
            } ?>' ;
            let post_id = $(this).attr("data-id");
            let data_no = $(this).attr("data-no");
            let class_bool = $(this).parent().attr("class");
            console.log(class_bool);
            if(class_bool.includes("liked")){
                boolval = "yes";
            }else{
                boolval = "no";
            }
            console.log(boolval);
            $(this).parent().toggleClass("liked");
            $.get(
                "./php/like.php",
                {
                    data_no:data_no,
                    user_id:user_id,
                    boolval:boolval,
                    post_id:post_id,
                }
            ).done(function(data){
                console.log(data);
                location.reload(true);
            })
            // $(this).attr("data-no",data_n);
        })
    })


</script>
</html>