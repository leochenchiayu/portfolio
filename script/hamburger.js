$(document).ready(function(){
    var x=1;
    $('.hamburger').click(function(){
        $(".collapse_menu").slideToggle();
        if(x==1){
            // $("collapse").css("display","block")
        }else{
            // $(".collapse").css("overflow-y","scroll");
            // $(".collapse").css("bottom","0");
            // $(".collapse").css("height","auto");
            // x=1;
        }
        $(this).toggleClass('hamburger-x');
        return false;
    });

    
    $(".user").click(function(){
        $(".user_info").slideToggle();
    })

    $(window).resize/*控制畫面大小*/(function(){
        let w =$(window).width();
        $(".back_to_index").append($(".user_info_div"));
        $(".back_to_index").addClass("clearfix");
        if(w>1200){
            $(".rwd_div").css("display","inline-block");
            // $(".nav_bar_content").append($(".user_info_div"));
        }else{
            $('.hamburger').removeClass('hamburger-x');//畫面小於600時，強迫移除.hamburger-x
        }
    });
})