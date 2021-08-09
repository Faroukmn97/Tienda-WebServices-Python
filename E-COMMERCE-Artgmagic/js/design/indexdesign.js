/* Inicio barra lateral izquierda */
$(document).ready(function () {
    $("#buttonreducir").click(function () {
        /*  console.log(nav); */
        if (parseInt($('.main-nav').css('width').toString().substr(0,$('.main-nav').css('width').toString().indexOf('px'))) >= 93)
        {
            $(".main-nav").animate({width: "91px"});
            setTimeout("$('.main-internal-text').css('display', 'none'); $('.nav-container_link').css('display', 'flex');\n\
 $('.nav-container_link').css('justify-content', 'center'); $('.nav-container_link').css('aling-items', 'center'); $('.main-nav button').css('justify-content', 'center');\n\
$('.main-nav button').css('aling-items', 'center'); $('.main-nav button').css('width', '100%');",300);
        } else
        {
            $(".main-nav").animate({width: "15%"});
            $('.main-internal-text').css('display', 'flex');
            $('.nav-container_link').css('display', 'flex');
            $('.nav-container_link').css('justify-content', '');
            $('.nav-container_link').css('aling-items', '');
            $('.nav-container_link').css('width', '');
            $('.main-nav button').css('width', '');
            nav = $('#main-nav-id').css('width');
        }

    });

    /*   function reducirpanel(){
     var nav = document.getElementById("main-nav-id").style.width = "20%";
     
     } */
});


//main-nav-id







