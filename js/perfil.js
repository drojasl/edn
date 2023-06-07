$(document).ready(function(){
    $("#changePass").on('click', function(){
        $("input[type='password']").val("");
        if($(this).is(":checked")){
            $("input[type='password']").removeAttr("disabled");
            $("input[type='password']").eq(0).focus();
        }
        else{
            $("input[type='password']").attr("disabled", "disabled");
        }
    });
    $("input[type='password']").on('change', function(){
        $("input[type='password']").removeClass("form-error");
        if($("input[name='password']").val() != $("input[name='repassword']").val()){
            $("input[name='repassword']").addClass("form-error");
        }
    });
    $("form").on('submit', function(){
        if($("input[name='password']").val() != $("input[name='repassword']").val()){
            $("input[name='repassword']").addClass("form-error");
            return false;
        }
    });
    $("input[name='celular']").tooltip({
        show: {effect: "slideDown", delay: 250},
        position: {my: "left top", at: "right+5 top+5", collision: "none"}
    });
});