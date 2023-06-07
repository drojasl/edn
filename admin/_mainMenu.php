<div id="mainMenu" class="d-flex flex-row justify-content-center">
    <div class="px-2 px-sm-3 px-md-4 px-lg-5 px-xl-6"><a href="index">INICIO</a></div>
    <div class="px-2 px-sm-3 px-md-4 px-lg-5 px-xl-6"><a href="prospectos">PROSPECTOS</a></div>
    <div class="px-2 px-sm-3 px-md-4 px-lg-5 px-xl-6"><a href="codigos">CODIGOS</a></div>
    <div class="px-2 px-sm-3 px-md-4 px-lg-5 px-xl-6"><a href="biblioteca">BIBLIOTECA</a></div>
    <div class="px-2 px-sm-3 px-md-4 px-lg-5 px-xl-6"><a href="perfil">PERFIL</a></div>
</div>
<script>
function selMenuActivo(page){
    $("#mainMenu a").removeClass("menuActive");
    $("#mainMenu a[href='"+page+"']").addClass("menuActive");
}
</script>