$(document).ready(function(){
    $("#btnPrev").bind("click", function(){
        var page = $(this).attr("value");
        location.replace(page);
    });
    
    $("#btnNext").bind("click", function(e){
        var page = $(this).attr("value");
        location.replace(page);
    });
});

function moverCursorDerecha(num){
    for(var i=1; i<=num; i++){
        var current = $("#stepBar").find(".step-current");
        current.addClass("step-ok");
        if(current.next().length){
            current.removeClass("step-current");
            current.next().addClass("step-current");
        }
    }
    mostrarTitulos();
}
function mostrarTitulos(){
    $(".step-current span").removeClass("d-none");
}