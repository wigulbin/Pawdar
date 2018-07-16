$(document).ready(function(){
    
    $(window).scroll(function(){
        console.log($(window).scrollTop());
        if($(window).scrollTop()>=570){
            $("nav").addClass("navbar-scroll");
            console.log("Added");
        }else{
            $("nav").removeClass("navbar-scroll");
        }
        
    });
    
    $("#fixed-button").click(function() {
        $("body").scrollTop(0, 1000);
    });
    
    $(".more-info").click(function(){
       $('html, body').animate({
           scrollTop: ($('#scroll-to').offset().top)/1.15
       }, 1500);
    });
    
    
});