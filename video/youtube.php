<section id="wrapper" class="text-center">
    <div id="player"></div>
</section>
<footer>
    <section class="buttonSec">
    </section>
</footer>
<script type="text/javascript">
    var video_id = '<?php echo $video_id;?>'
    var speed = '<?php echo $video_speed;?>'
    var start = '<?php echo $video_start;?>'
</script>
<script type="text/javascript">
    var width_size = (screen.width <= 768) ? '80%' : '40%' 
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    first_load = true;
    paused_video = false;
    var current_time = 0;
    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            //height: '480',
            width: width_size,
            videoId: video_id,
            playerVars: {enablejsapi: 1, controls: 1, rel: 0, showinfo: 0, ecver: 2, modestbranding: 1, frameborder: 0},
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    function onPlayerReady(event) {
        event.target.seekTo(start);
        event.target.setVolume(100);
        event.target.setPlaybackRate(parseFloat(speed));
        event.target.playVideo();
    }

    function onPlayerStateChange(event) {
        if(first_load){
            /*first_load = false;
            event.target.stopVideo();
            event.target.clearVideo();
            current_time = 0;
            event.target.seekTo(current_time);*/
        }
        switch(event.data){
            case 0: // Fin del video
                event.target.stopVideo();
                break;
            /*
            case 1:
                if(paused_video){
                    event.target.seekTo(current_time);
                    paused_video = false;
                }
                break;
            case 2:
                paused_video = true;
                current_time = event.target.getCurrentTime();
                event.target.stopVideo();
                break;
            */
        }
    }
</script>