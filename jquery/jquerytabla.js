$(document).ready(function(){
    /*$("#btn").click(function (e) { 
        e.preventDefault();
        $("tr:odd").addClass("impares");
    });*/

    /*modificado*/
     $("#btn").click(function (e) { 
        e.preventDefault();
        $("tr:odd").toggleClass("impares");/*hace que el boton sea como un interruptor*/
        
     });
});   