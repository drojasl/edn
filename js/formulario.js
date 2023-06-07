$(document).ready(function(){
    txtCodigoAcceso = $("input[name='codigo_acceso']");
    txtCodigoAcceso.on('keyup', function(){
        txtCodigoAcceso.val(txtCodigoAcceso.val().toUpperCase());
    });
    txtCodigoAcceso.on('change', function(){
        txtCodigoAcceso.removeClass('error-code');
        txtCodigoAcceso.removeClass('success-code');
        if(txtCodigoAcceso.val()){
            $.ajax({
                type: "POST",
                url: "validarCodigoAccesoBD.php",
                data: {'codigo_acceso': txtCodigoAcceso.val()}
            }).done(function(response) {
                if(response){
                    txtCodigoAcceso.addClass('success-code');
                    $("#validarCodigoAcceso").html(response);
                    //$("input[name='empresario_id']").val($("#datosContactoEmp").find(".empresario_id").text());
                }
                else{
                    $("#validarCodigoAcceso").html("");
                    showFlashMsn("El codigo ingresado es invalido", "error");
                    txtCodigoAcceso.addClass('error-code');
                    txtCodigoAcceso.val("").focus();
                }
            });
        }
    });
    $("#btnSubmitForm").bind("click", function(e){
        var camposVacios = false;
        $(".form-control").each(function(){
            if(!$(this).val()){
                showFlashMsn("Todos los campos son obligatorios", "error");
                $(this).focus();
                camposVacios = true;
                e.preventDefault();
                return;
            }
        });
        if(!camposVacios){
            if(!$("#chkAcepto").is(":checked")){
                showFlashMsn("Autoriza el contacto", "error");
                e.preventDefault();
                return;
            }
        }
    });
    $( "#pais" ).autocomplete({
        source: "admin/getDataFromDB.php?campo=pais"
    });
    $( "#ciudad" ).autocomplete({
        source: "admin/getDataFromDB.php?campo=ciudad"
    });
    $("input[name='celular']").tooltip({
        show: {effect: "slideDown", delay: 250},
        position: {my: "left top", at: "right+5 top+5", collision: "none"}
    });
});