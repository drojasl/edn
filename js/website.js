$(document).ready(function(){
    $("body").on("keydown", ".numbersOnly", numbersOnlyPress);
    $(".questionHelp").tooltip();
});
function showFlashMsn(msn, clase){
    var flashMsn = $("#flashMsn");
    flashMsn.hide();
    flashMsn.removeClass();
    flashMsn.addClass(clase);
    flashMsn.text(msn);
    flashMsn.slideDown();
    setTimeout(ocultarFlashMsn, 5000);
}
function ocultarFlashMsn(){
    $("#flashMsn").slideUp();
}
function numbersOnlyPress(e, estrict){
    var evt = (e) ? e : window.event;
    var key = (evt.keyCode) ? evt.keyCode : evt.which;

    if (key != null) {
        key = parseInt(key, 10);

        // verificamos si estamos en el modo estricto
        if (estrict == true) {
            // verificamos si es un punto
            if (key == 110) {
                return false;
            }
        }

        if ((key < 48 || key > 57) && (key < 96 || key > 105) && key != 118) {
            if (!isUserFriendlyChar(key))
                return false;
        }
        else {
            if (evt.shiftKey)
                return false;
        }
    }
    return true;
}
function isUserFriendlyChar(val) {
    // Point, Backspace, Tab, Enter, Insert, and Delete
    if (val == 110 || val == 8 || val == 9 || val == 13 || val == 45 || val == 46)
        return true;

    // Ctrl, Alt, CapsLock, Home, End, and Arrows
    if ((val > 16 && val < 21) || (val > 34 && val < 41))
        return true;

    // The rest
    return false;
}