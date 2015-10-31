/* 
 * Page loading
 */

var _URL = "/sleanded/public/admin/";

/* 
 * Animated page loading
 */
$(document).ready( function() {
    /* smooth scrolling */
    $("html").niceScroll({scrollspeed: 65});
    $("#port").niceScroll("#bar",{scrollspeed: 65});
    
    /*menu - nechtěl jsemt to řeši přes js, ale css je ještě hoší než jquery kappa*/
    $("header > nav > div > nav").hover(function(){
        $(this).prev().css({"background": "#333","border-color": "#333"});
    },function(){
        $(this).prev().css({"background": "","border-color": ""});
    }); 
});


function ajax( controller , action , data ) {
    $.post( _URL + controller + '/' + action , data , function( ) {
            alert("Successfully sent!");
        }
    );
}