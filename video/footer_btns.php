<?php
$videos = array_keys($curso_config["videos"]);

foreach($videos as $key=>$video){
    if($video == $video_actual){
        $prev_key = $key - 1;
        $next_key = $key + 1;

        $prev = ($prev_key >= 0) ? $videos[$prev_key] : $curso_config["prev"];
        $next = ($next_key < count($videos)) ? $videos[$next_key] : $curso_config["next"];
    }
}
?>
<footer>
    <section class="buttonSec">
        <button id="btnPrev" type="button" value="<?php echo $prev ?>">ANTERIOR</button>
        <button id="btnNext" type="button" value="<?php echo $next ?>">SIGUIENTE</button>
    </section>
</footer>