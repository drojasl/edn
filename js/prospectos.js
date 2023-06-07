$(document).ready(function(){
    $(".btnViewed").each(function(){
        $(this).data('cod', $(this).attr('cod'));
    });
    
    $(".btnViewed").on('click', function(e){
        e.preventDefault();
        var prospecto = $(this);
        var id = $(this).data('cod');
        $.ajax({
            type: "POST",
            url: "../admin/prospecto_visto.php",
            data: {'id': id}
        }).done(function(response) {
            if(response == '1'){
                prospecto.parents('.row-prospect').removeClass('unviewed');
                prospecto.remove();
            }
        });
    });
});