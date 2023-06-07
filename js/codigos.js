$(document).ready(function(){
    $("#codBase").data('cod', $("#codBase").attr('cod'));
    $(".btnDelete").each(function(){
        $(this).data('cod', $(this).attr('cod'));
    });
    $("#txtCrearNuevo").on('keyup', function(){
        $("#txtCrearNuevo").val($("#txtCrearNuevo").val().toUpperCase());
        validarCode();
    });
    $("#txtCrearNuevo").on('change', function(){
        validarCode();
    });
    $("#crearCodigo").on('click', function(){
        if(!validarCode()){
            return false;
        }
    });
    $(".btnDelete").on('click', function(e){
        e.preventDefault();
        if(confirm('Desea eliminar este codigo?')){
            var codigo = $(this);
            var id = $(this).data('cod');
            $.ajax({
                type: "POST",
                url: "../admin/codigo_borrar.php",
                data: {'id': id}
            }).done(function(response) {
                if(response == '1'){
                    codigo.parents('.row-code').remove();
                }
            });
        }
    });
    $('#sel_curso').change('click', function(){
        $('#selBuscarVideo_contacto').removeAttr('disabled');
        $('#selBuscarVideo_plan').removeAttr('disabled');
        if($(this).val() != 'economia-colaborativa') {
            $('#selBuscarVideo_contacto').val('');
            $('#selBuscarVideo_contacto').attr('disabled', 'disabled');
            $('#selBuscarVideo_plan').val('');
            $('#selBuscarVideo_plan').attr('disabled', 'disabled');
            videoSeleccionado();
        }
    });
    $('#selBuscarVideo_contacto').change(videoSeleccionado);
    $('#selBuscarVideo_plan').change(videoSeleccionado);
});

function videoSeleccionado(){
    var contacto = $('#selBuscarVideo_contacto').val();
    var plan = $('#selBuscarVideo_plan').val();
    if(contacto && plan){
        $("#videos_default").val(contacto + "-" + plan);
    }
    else{
        $("#videos_default").val(contacto + plan);
    }
}

function validarCode(){
    var sufijo = $("#txtCrearNuevo").val();
    if(sufijo){            
        var codeBase = $("#txtCrearNuevo").val();
        var code = $("#codBase").data('cod') + sufijo;
        $("#codBase").text(code);
        $("#codBase").removeClass('codeOk');
        $("#codBase").removeClass('codeNOk');
        if(existeCodeBD(code)){
            $("#codBase").addClass('codeNOk');
            $("#crearCodigo").addClass('btnDisabled');
            $("#codigo_acceso").val("");
            return false;
        }else{
            $("#codBase").addClass('codeOk');
            $("#crearCodigo").removeClass('btnDisabled');
            $("#codigo_acceso").val(code);
            return true;
        }
    }
    else{
        $("#codBase").removeClass('codeOk');
        $("#codBase").removeClass('codeNOk');
        $("#codBase").text($("#codBase").data('cod') + '??');
        $("#crearCodigo").addClass('btnDisabled');
    }
    return false;
}

function existeCodeBD(code){
    var existeCodeBD = null;
    $.ajax({
        type: "POST",
        async: false,
        url: "../admin/codigo_validarDuplicado.php",
        data: {'codigo_acceso': code}
    }).done(function(response) {
        if(response == '1'){
            existeCodeBD = true;
        }
        if(response == '0'){
            existeCodeBD = false;
        }
    });
    return existeCodeBD;
}