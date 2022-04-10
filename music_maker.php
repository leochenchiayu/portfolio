<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MusicMaker數位音樂作品</title>
    <link rel="shortcut icon" href="./image/Logo.png"/>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <link rel="stylesheet" href="./css/music_maker.css?v=<?php echo time();?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="./css/global.css?v=<?php echo time();?>">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.2.0/vue-resource.js"></script>
    <!-- <script src="lightbox/js/lightbox.min.js"></script>
    <link rel="stylesheet" href="lightbox/css/lightbox.css"> -->
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
    <div class="modal" v-bind:class="{ active:isActive }" id="modal2">
        <div class="wrapper">
            <a href="#" class="close" @click.prevent="work_close($event)">關閉</a>
            <h2 class="t-center"></h2>
            <img v-if="src.includes('image')" :src="src" alt="">
            <audio v-if="src.includes('audio')" :src="src" alt="" controls loop></audio>
            <!-- <template v-for=""> -->
            <div v-html="content" id="content"></div>
            <div class="user_comment" v-if="comment.length!=0">
                <ul v-for="(comments, index) in comment" class='user_comment_section'>
                    <?php if(isset($_SESSION["user"])){ ?>
                        <a v-if="comments.user_id == <?php echo $user_id; ?>" href="javascript:void(0)" class="delete_msg" @click.prevent='delete_msg($event,index)' :data-id="comments.comment_id">刪除</a>
                        <a v-if="comments.user_id == <?php echo $user_id; ?>" href='javascript:void(0)' class='edit_msg' @click.prevent='edit_msg($event)' :data-id="comments.comment_id">編輯</a>
                    <?php }?>
                    <li v-if="comments.name != null " class="user">{{ comments.name }}<span class="date_to_comment">{{ comments.date_to_comment }}</span></li>
                    <li v-if="comments.comment != null " v-html="" class="comment">{{comments.comment}}</li>
                </ul>
            </div>
            <div class="no_comment" v-else="comment.length==0">
                <h4 class="t-center mt-20">尚無留言!!</h4>
            </div>
            <!-- <template> -->
            <?php if(isset($_SESSION["id"])){ ?>
                <div class="input_comment">
                    <input ref="myinput" type="text">
                    <a href="javascript:void(0)" :data-id="work_id" data-user="<?php echo $user_id; ?>" class="btn btn-primary" id="submit_comment"  @click.prevent="submit_comment($event)">送出</a>
                </div>
            <?php }else{?>
                <p id="login_first_to_comment">請先登入才可留言!!</p>
            <?php }?>        
            </div>
            <div class="overlay"></div>
    </div>    
        <header class="full-width" id="photo">
            <h1>MusicMaker數位音樂作品</h1>
        </header>
        
        <div class="full-width" id="music">
            <div class="fixed-width clearfix">  
                <div class="col-xl-12 col-12">
                    <h1 class="t-center title">數位音樂作品</h1>
                </div>


                <!-- .stop : 停止觸發上層 DOM 元素事件。
                .prevent : 避免瀏覽器預設行為。
                .capture : 不管觸發事件的目標是否是下層， 設定 capture 的事件一定會先觸發。
                .self : 只有觸發此 DOM 元素本身才會觸發 self 事件。
                .once : 此事件只觸發一次。
                .passive : 無視 prevent 功能。 -->

                <!-- <div v-for="data in data1">
                            {{data.id}}
                        </div> -->
                <div class="col-xl-12 col-12">
                    <template v-for="(data,index) in data1">
                        <div class="col-lg-6 col-12">
                            <div class="work_bg">
                                <div class="img">
                                <img v-if="data.work_path.includes('image') == true" class="top" :src="data.work_path" alt="">
                                <audio v-else="data.work_path.includes('audio') == true" :src="data.work_path" controls loop></audio>
                                    <div class="on_img">
                                        <img v-if="data.work_path.includes('image') == true" :src="data.work_path" alt="">
                                        <audio v-else="data.work_path.includes('audio') == true" :src="data.work_path" controls loop></audio>
                                        <div class="black_on"></div>
                                        <div class="click_me" :id="data.id" :data-id="data.id" data-model="" @click.prevent="work_open($event)">點我查看</div>
                                    </div>
                                </div>
                                <div class="like_div grow" v-bind:class="data.thumb_up == null ? '' : liked">
                                            <i v-bind:data-id="data.thumb_up == null ? '' : data.thump_up" class="fa fa-thumbs-up fa-3x like" aria-hidden="true" 
                                                data-no="" <?php echo ($user_id == "")? "@click.prevent='login_first()'": "@click.prevent='thumb_up(data.thumb_up,data.id)'"; ?>>{{data.thumb_up_cnt}}</i>
                                    <a class="my_comment" :data-id="data.id" :id="data.id" data-modal="" @click.prevent="work_open($event)" href="javascript:void(0)">我要留言</a>
                                </div>
                            </div>
                        </div>
                    </template>            
                </div>
            </div>
        </div> 
</body>




<script>
    // import VueResource from "vue-resource";
    // Vue.use(VueResource);
    Vue.component('comment_section',{
        props:['postTitle'],
        template:'<h2>{{ postTitle }}</h2>'
    });

    $(document).ready(function(){
        $(document).on("click",".edit_msg_sent",function(){
            let id = $(this).siblings("input").attr("data-id");
            let value = $(this).siblings("input").val();
            console.log(value);
            console.log(id);
            $.get(
                "./php/edit_msg.php",
                {
                    id:id,
                    value:value,
                },
            ).done(function(data){

            })
            $(this).parent().html(value);
        });
    })
    // lightbox.option({
    //         'resizeduration':200,
    //         'fadeDuration':200,
    //         'showImageNumberLabel':true,
    //         'albumlLabel':'%1 / %2'
    //     })
    var app = new Vue({
        el : '#music',
        data:{
            data1 : [],
            liked : 'liked',

            // isActive : false,
        },
        // computed:{
        //     work : function(){
        //         console.log(data);
        //     }
        // },

        methods: {
            work_open: function(event){
                // modal2.comment.splice(0,comment.length);
                modal2.comment.length = 0;
                console.log(event.currentTarget.id);
                var id = event.target.getAttribute('data-id');
                // modal2.isActive = true;
                modal2.isActive = !modal2.isActive;   //toggle the isActive
                console.log(modal2.isActive);
                var self = this;
                $.ajax({
                    url:'./php/get_comment.php?id=' + id,
                    method:'GET',
                    success:function(data){
                        let res = "";
                        var new_data = JSON.parse(data);
                        for(var i=0;i<new_data.length;i++){
                            modal2.src = "." + new_data[i].work_path;
                            modal2.work_id = new_data[i].work_id;
                            if(new_data[i].work_description == null){
                                new_data[i].work_description = "";
                            }
                            if(new_data[i].work_name == null){
                                new_data[i].work_name = "";
                            }
                            modal2.content = new_data[i].work_name + new_data[i].work_description;
                            let userid = <?php echo (isset($_SESSION['id']))? $user_id : " '' " ; ?>;
                        
                            //vue render
                            if(new_data[i].comment_id != null){
                                modal2.comment.push(
                                    {
                                        comment_id : new_data[i].comment_id, 
                                        name : new_data[i].name, 
                                        date_to_comment : new_data[i].date_to_comment,
                                        comment:new_data[i].comment,
                                        user_id:(new_data[i].user_id == null)?"no":new_data[i].user_id,
                                    }
                                )
                            }
                        }    
                        
                            //     res = res + "<ul class='user_comment_section'>";
                        //     if(new_data[i].user_id != null){
                        //         if(new_data[i].user_id == userid){
                        //             res = res + "<a href='javascript:void(0)' class='delete_msg' @click.prevent='delete_msg($event)' data-id='" + new_data[i].comment_id + "'>刪除</a>";
                        //             res = res + "<a href='javascript:void(0)' class='edit_msg' @click.prevent='edit_msg($event)' data-id='" + new_data[i].comment_id + "'>編輯</a>";
                        //         }
                        //         res = res + "<li class='user'>" + new_data[i].name +"<span class='date_to_comment'>" + new_data[i].date_to_comment + "</span>" + "</li>";
                        //         res = res + "<li class='comment'>" + new_data[i].comment + "</li>";
                        //         res = res + "</ul>";
                        //     }else{
                        //         res = res + "<p class='no_comment'>尚無留言!</p>";
                        //     }
                        //     // console.log(res);
                        //     modal2.comment = res;
                            
                        // }


                    }
                })
            },
            login_first:function(){
                alert("請先登入才能按讚!")
            },
            thumb_up:function(thumb_upid,postid){
                let user_id = '<?php echo (isset($_SESSION['id']))? $_SESSION['id'] : '' ; ?>';
                let post_id = postid;
                let thumb_up_id = thumb_upid;
                let boolval = "";
                if(thumb_up_id == null || thumb_up_id == ""){
                    boolval = "no";
                }else{
                    boolval = "yes";
                }
                this.$http.get("./php/like.php?data_no=" + thumb_up_id + "&user_id=" + user_id + "&boolval=" + boolval + "&post_id=" + post_id )
                .then((response)=>{
                    
                })
                location.reload(true);
            }

        }
        
    });

    var modal2 = new Vue({
        el : '#modal2',
        data:{
            isActive : false,
            src : '',
            work_id:'',
            work_description:[],
            content:'',
            comment_edit : '',
            comment : [],
            // user_id : [],
            // comment_id: [],
            // data_to_comment:[],
            // comment_name : [],
        },

        methods: {
            work_close:function(event){
                this.isActive = !this.isActive;
                console.log(this.comment);
            },
            submit_comment:function(event){
                var id = event.target.getAttribute('data-id');
                let user_id = <?php echo (isset($_SESSION['id']))? $user_id : "''" ;?>;
                var comment = event.target.previousElementSibling.value;
                this.$http.get("./php/add_comment.php?user_id=" + user_id + "&" + "comment=" + comment + "&" + "id=" + id 
                    // if(var i = 0;i<data.length;i++){
                    //     this.comment.push({comment:data[i].comment});
                    // }
                ).then((response)=>{
                    console.log(response.data);
                    let info = "";
                    for(var i=0;i<response.data.length;i++){
                        console.log(response.data[i].date_to_comment);
                        // info = info + "<ul class='user_comment_section'>";
                        // info = info + "<a href='javascript:void(0)' class='delete_msg' @click.prevent='delete_msg($event)' data-id='" + response.data[i].id + "'>刪除</a>";
                        // info = info + "<a href='javascript:void(0)' class='edit_msg' @click.prevent='edit_msg($event)' data-id='" + response.data[i].id + "'>編輯</a>";
                        // info = info + "<li class='user'>" + '<?php //echo (isset($_SESSION["user"]))? $_SESSION["user"]:" "; ?>' +"<span class='date_to_comment'>" + response.data[i].date_to_comment + "</span>" + "</li>";
                        // info = info + "<li class='comment'>" + comment + "</li>";
                        // info = info + "</ul>";
                        let user = '<?php echo (isset($user))? $user : "null"; ?>';
                        this.comment.push(
                            {
                                comment_id : response.data[i].comment_id, 
                                name: user,
                                date_to_comment : response.data[i].date_to_comment,
                                comment:comment,
                                <?php
                                    // if((isset($user_id)) == true){
                                    //     echo "user_id:",$user_id;
                                    //     echo "true";
                                    // }
                                ?>
                                <?php echo ($user_id == "" || $user_id == null)? "" : "user_id:".$user_id; ?>
                            }
                        )
                    }
                    console.log(this.comment);
                    // this.comment += res;
                    // console.log(info);
                    // document.getElementsByClassName("user_comment")[0].innerHTML += info;
                    $(".no_comment").parent().fadeOut();
                    $(".wrapper").animate({scrollTop:$(document).height()},'slow');
                    // for(var i=0;i<response.length;i++){
                        // this.comment.push({comment:response[i]});
                        // this.
                        // this.comment.push({})
                        // this.comment.cancat()
                        // }
                        
                })
                    event.target.previousElementSibling.value = "";
            },
            delete_msg:function(event,cnt){
                var id = event.target.getAttribute("data-id");
                console.log(id);
                console.log(cnt);
                this.$http.get("./php/delete_msg.php?id=" + id).then((response)=>{

                });

                this.comment.splice(this.comment.indexOf(cnt),1);
                
            },
            edit_msg:function(event){
                // var comment = this.$refs.myinput.value;
                // event.target.previousElementSibling
                let id = event.target.getAttribute("data-id");
                // event.target.setAttribute("v-html","comment_edit");
                let val = event.target.nextElementSibling.nextElementSibling.innerHTML;
                console.log(val);
                let value = val;
                console.log(event.target.nextElementSibling.nextElementSibling);                
                event.target.nextElementSibling.nextElementSibling.innerHTML
                = "<input type='text' data-id='" + id + "' class='new_comment' value='" + value + "'><a class='new_comment_btn edit_msg_sent' href='javascript:void(0)'>確認編輯</a>";
            },
            
        }
    });

    
    axios.get("./php/get_work/get_work.php",{
        params:{
            category:"music"
        },
        // 'Content-Type': 'application/json'
    })
    .then(function(response){
            // let data1 = [] ;
            console.log(response);
            console.log(response.data.body);
        for(i=0;i<response.data.body.length;i++){
            app.data1.push({ id:response.data.body[i].work_id, work_name:response.data.body[i].work_name,work_path:'.' + response.data.body[i].work_path,thumb_up:response.data.body[i].thumb_up_id,thumb_up_cnt:response.data.body[i].cnt });
        }
        // console.log(app.data1);
    })
    .catch(function(error){
        console.log(error);
    });
    
    


    
   
</script>
</html>