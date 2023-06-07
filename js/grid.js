$(document).ready(function() {
    $(".well-sm").hide();
    $(".thumbnail").unbind();
    $(".thumbnail").bind("click", function(){
        $(".selected-choise").removeClass("selected-choise");
        $(this).addClass("selected-choise");
        // Permite seleccionar 2 
        /*
        if(!$(this).hasClass("selected-choise")){
            if($(".selected-choise").length >= 2){
                showFlashMsn("Seleccione máximo 2 opciones", "info");
                return;
            }
            $(this).addClass("selected-choise");
        }
        else{
            $(this).removeClass("selected-choise");
        }
        */
        var btnContinuar = $("#js-trigger-overlay");
        
        btnContinuar.removeAttr("disabled");
        if($(".selected-choise").length < 1){
            btnContinuar.attr("disabled", "disabled");
        }
        btnContinuar.removeClass("btnDisabled");
        if(btnContinuar.is(":disabled")){
            btnContinuar.addClass("btnDisabled");
        }
        actualizarSeleccion();
    });
    $('#list').click(function(event){
        event.preventDefault();
        $('#products .item').addClass('list-group-item');
    });
    $('#grid').click(function(event){
        event.preventDefault();
        $('#products .item').removeClass('list-group-item');
        $('#products .item').addClass('grid-group-item');
    });
    $("#js-trigger-overlay").click(function (e){
        e.preventDefault();
        
        $("#formEmprende").submit();
        //window.location = "video/introduccion";
    })
});
function actualizarSeleccion(){
    $("#actividad_principal").val("");
    $(".thumbnail.selected-choise").each(function (){
        var name = $(this).attr("name");
        $("#actividad_principal").val($("#actividad_principal").val() + "," + name);
    });
}