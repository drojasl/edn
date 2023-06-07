function loadYoutubeVideo(video_id, speed){
    
    var tag = document.createElement('script');
    console.log(tag);
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height: '390',
            width: '640',
            videoId: video_id,
            events: {
            'onReady': onPlayerReady
            }
        });
    
    }

    function onPlayerReady(event) {
        event.target.setVolume(100);
        event.target.setPlaybackRate(speed);
        event.target.playVideo();
    }
}

