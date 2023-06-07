<?php
if(!file_exists(CSS . "step_" . count($curso_config["videos"]) . ".css")){
    return;
}
?>
<link rel="stylesheet" href="<?php echo CSS_WEB . "step_" . count($curso_config["videos"]) . ".css" ?>">

<div class="step-by-step">
    <ul id="stepBar" class="unstyled clearfix">
        <?php
            $videos = array_keys($curso_config["videos"]);
            $current = false;

            foreach($videos as $key=>$video){
                $li_class = "";
                $span_class = "d-sm-block";
                if($key == 0){
                    $li_class = "first-step";
                }
                elseif($video == end($videos)){
                    $li_class = "last-step";
                }

                if($video == $video_actual){
                    $li_class .= " step-current";
                    $span_class .= " d-none";
                    $current = true;
                }
                elseif(!$current){
                    $li_class .= " step-ok";
                }
                echo "<li class='$li_class'><span class='$span_class'>" . $curso_config["videos"][$video] ."</span></li>";
            }
        ?>
    </ul>
</div>