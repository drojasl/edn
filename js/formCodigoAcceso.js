$(document).ready(function(){
    $("#codigo_acceso").val("");
    $("#codigo_acceso").focus();
    $("#codigo_acceso").on('keyup', function(){
        $("#codigo_acceso").val($("#codigo_acceso").val().toUpperCase());
    });
    $("#btnIngreso").on('click', function(){
        if($("#codigo_acceso").val()){
            $( ".form_acceso" ).submit();
        }
    });
});