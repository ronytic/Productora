<?php
include_once("../../login/check.php");
$folder="../../";
include_once("../../class/video.php");
$video=new video;
include_once("../../class/descargas.php");
    $descargas=new descargas;
    
extract($_POST);
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
$video->campos=array("v.*,(SELECT count(codvideo) FROM descargas WHERE codvideo=v.codvideo) as descarga ");
$video->tabla="video v";
$condicion="v.nombre LIKE '$nombre%' and v.codformato LIKE '$codformato' and v.codtematica LIKE '$codtematica' and v.codtipo LIKE '$codtipo' and v.codsoporte LIKE '$codsoporte' and v.fechavideo BETWEEN '$fechainicio' and '$fechafinal' and v.activo=1 ORDER BY $orden $order";
$vid=$video->getRecords($condicion);
include_once("../../class/tematica.php");
$tematica=new tematica;
?>
<div class="row">
<?php foreach($vid as $v){$i++;
  $tem=$tematica->mostrarTodoRegistro("codtematica=".$v['codtematica'],"","");  
  $tem=array_shift($tem);
?>    
<div class="col-lg-4 col-sm-4 col-xs-4">
    <div class="well with-header with-footer">
    <div class="header bordered-red"><?php echo $v['nombre']?></div>
    
    
    
    <!--
    <div id="jp_container_<?php echo $v['codvideo']?>" class="jp-video jp-video-270p" role="application" aria-label="media player">
	<div class="jp-type-single">
		<div id="jquery_jplayer_<?php echo $v['codvideo']?>" class="jp-jplayer"></div>
		<div class="jp-gui">
			<div class="jp-video-play">
				<button class="jp-video-play-icon" role="button" tabindex="0">play</button>
			</div>
			<div class="jp-interface">
				<div class="jp-progress">
					<div class="jp-seek-bar">
						<div class="jp-play-bar"></div>
					</div>
				</div>
				<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
				<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
				<div class="jp-details">
					<div class="jp-title" aria-label="title">&nbsp;</div>
				</div>
				<div class="jp-controls-holder">
					<div class="jp-volume-controls">
						<button class="jp-mute" role="button" tabindex="0">mute</button>
						<button class="jp-volume-max" role="button" tabindex="0">max volume</button>
						<div class="jp-volume-bar">
							<div class="jp-volume-bar-value"></div>
						</div>
					</div>
					<div class="jp-controls">
						<button class="jp-play" role="button" tabindex="0">play</button>
						<button class="jp-stop" role="button" tabindex="0">stop</button>
					</div>
					<div class="jp-toggles">
						<button class="jp-repeat" role="button" tabindex="0">repeat</button>
						<button class="jp-full-screen" role="button" tabindex="0">full screen</button>
					</div>
				</div>
			</div>
		</div>
		<div class="jp-no-solution">
			<span>Update Required</span>
			To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
		</div>
	</div>
</div>
    
    
    
    -->
    <video src="../../archivosvideos/mp4/<?php echo $v['videomp4']?>" width="290" controls preload="none"></video>
    
    <table class="table table-bordered">
    <tr>
        <td><?php echo recortarTexto($v['contenido'],200)?></td>
    </tr>
    </table>
    
    <span class="badge badge-orange"><?php echo $tem['nombre']?></span>
    <span class="badge badge-orange"><?php echo fecha2Str($v['fechavideo'])?></span>
    <span class="badge badge-orange">Descargas: <?php echo $v['descarga']?></span>
    <br><br>
    <a href="video.php?codvideo=<?php echo $v['codvideo']?>" target="_blank" class="btn btn-darkorange">Ver Video</a>
    <div class="btn-group btn-group-sm" role="group" aria-label="...">
    <?php if($v['videomp4']!=""){?>
    <a href="descargar.php?codvideo=<?php echo $v['codvideo']?>&tipo=mp4" class="btn btn-success" target="_blank"><i class="glyphicon glyphicon-download glyphicon-blue"></i>Mp4</a>
    <?php }?>
    <?php if($v['videomov']!=""){?>
    <a href="descargar.php?codvideo=<?php echo $v['codvideo']?>&tipo=mov" class="btn btn-success" target="_blank"><i class="glyphicon glyphicon-download glyphicon-blue"></i>Mov</a>
    <?php }?>
    <?php if($v['videoavi']!=""){?>
    <a href="descargar.php?codvideo=<?php echo $v['codvideo']?>&tipo=avi" class="btn btn-success" target="_blank"><i class="glyphicon glyphicon-download glyphicon-blue"></i>Avi</a>
    <?php }?>
    </div>
    </div>
</div>
<?php 

    if($i==3){
        $i=0;
        ?>
        </div>
        <div class="row">
        <?php
    }
}?>
</div>

<script type="text/javascript">
//<![CDATA[
//$(document).ready(function(){
    <?php foreach($vid as $v){?>
    $("#jquery_jplayer_<?php echo $v['codvideo']?>").jPlayer({
        ready: function () {
            $(this).jPlayer("setMedia", {
                title: "<?php echo $v['nombre']?>",
                m4v: "../../archivosvideos/<?php echo $v['video']?>",
               
            });
        },
        play: function() { // To avoid multiple jPlayers playing together.
            $(this).jPlayer("pauseOthers");
        },
        swfPath: "../../dist/jplayer",
        solutions: "flash, html",
        supplied: "m4v",
        globalVolume: true,
        useStateClassSkin: true,
        autoBlur: true,
        smoothPlayBar: true,
        keyEnabled: true
    });
    <?php }?>
//});
//]]>
</script>