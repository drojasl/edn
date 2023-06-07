<?php
include_once(dirname(__FILE__) . "/../config/dirConfig.php");
include_once(ADMIN . "_header.php");
?>
<header class="row">
    <div class="col-sm-12 col-md-6"><img src="<?php echo IMAGES_WEB ?>logo_edn_transparent.png"></div>
    <div class="col-sm-12 col-md-6"><?php include_once(ADMIN . "_logout.php"); ?></div>
</header>
<div class="row">
    <section class="col-sm-12"><?php include_once(ADMIN . "_mainMenu.php"); ?></section>
    <section class="col-sm-12 secContent">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/Juih1iOah6s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <br>
        <br>
        <div id="player"></div>
        <br>
        <br>
        <p>
            Para compartir un plan de negocios desde Youtube use el siguiente link:<br>
            <b>https://www.laescueladenegocios.co/curso/invitacion?ext=</b><br><br>
            Para compartir el curso de seguimiento use el siguiente link:<br>
            <b>https://www.laescueladenegocios.co/curso/video/seguimiento/</b>
        </p>
        <br>
        <h2>Para ayuda adicional, comuniquese al correo electronico</h2>
        <b>diegor1007@gmail.com</b>
    </section>
</div>

<script type="text/javascript">
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '315',
          width: '560',
          videoId: 'FRE1Q2UzMz0',
          events: {
            'onReady': onPlayerReady
          }
        });
    }
    function onPlayerReady(event) {
        event.target.setVolume(100);
        event.target.setPlaybackRate(1.25);
        event.target.playVideo();
    }
</script>