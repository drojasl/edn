$(document).ready(function(){
    var dialog = $( "#dialog-form" ).dialog({
        dialogClass: "no-close",
        autoOpen: false,
        modal: true,
        width: "50%",
        buttons: [
            {
            text: "Comenzar",
                click: function() {
                    let code = $("#amway_code").val(); 
                    if(!isNaN(code) && code.length>=9 && code.length<=12){
                        $( this ).dialog( "close" );
                        window.location.href = "../bienvenida";
                    }
                    else{
                        $("#code_message").show();
                    }
                }
            }
        ]
    });

    $(".link").click(function(){
        let attr = $(this).attr("href");
        console.log(attr);
        window.location.href = attr;
    });

    $("#btnNext").click(function(){
        dialog.dialog( "open" );
    });
});