<?php
include_once("login/check.php");
$folder="./";
include_once("class/tematica.php");
$tematica=new tematica;
$tem=$tematica->mostrarTodoRegistro("",0,"nombre");

include_once("class/video.php");
$video=new video;

$datos=array("blue","orange","danger","green");
$titulo="Inicio de Sistema";
include_once("cabecerahtml.php");
?>
<?php include_once("cabecera.php");?> 
<div style="">
<?php foreach($tem as $t){?>
<a href="#<?php echo $t['nombre']?>" class="btn btn-xs btn-warning"><?php echo $t['nombre']?></a>
<?php }?>
</div>
<?php foreach($tem as $t){?>
<a name="<?php echo $t['nombre']?>"></a>
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="well with-header with-footer">
            <div class="header bordered-<?php echo $datos[rand(0,3)]?>"> <?php echo $t['nombre']?></div>
            
            <?php
            $video->campos=array("v.*,(SELECT count(codvideo) FROM descargas WHERE codvideo=v.codvideo) as descarga ");
            $video->tabla="video v";
        $vid=$video->getRecords("codtematica=".$t['codtematica']." and activo=1 ORDER BY descarga DESC,fechavideo DESC  LIMIT 0,20");
        ?>
        <table class="table table-bordered">
        <tr>
        <?php 
        $i=0;
        foreach($vid as $v){$i++;
            ?>
            <td>
            <div class="panel panel-warning">
            <div class="panel-heading">
            <?php echo $v['nombre']?></div></div>
           <video src="archivosvideos/mp4/<?php echo $v['videomp4']?>" width="290" controls preload="none"></video>
           <br>
           <span class="badge badge-orange"><?php echo fecha2Str($v['fechavideo'])?></span>
    <span class="badge badge-orange">Descargas: <?php echo $v['descarga']?></span>
           <br>
           <?php echo recortarTexto($v['contenido'],100)?>
           <hr>
           <a href="videos/registro/video.php?codvideo=<?php echo $v['codvideo']?>"  class="btn btn-darkorange" target="_blank">Ver Video</a>
           <div class="btn-group btn-group-sm" role="group" aria-label="...">
           <?php if($v['videomp4']!=""){?>
            <a href="videos/registro/descargar.php?codvideo=<?php echo $v['codvideo']?>&tipo=mp4" class="btn btn-success" target="_blank"><i class="glyphicon glyphicon-download glyphicon-blue"></i>Mp4</a>
            <?php }?>
            <?php if($v['videomov']!=""){?>
            <a href="videos/registro/descargar.php?codvideo=<?php echo $v['codvideo']?>&tipo=mov" class="btn btn-success" target="_blank"><i class="glyphicon glyphicon-download glyphicon-blue"></i>Mov</a>
            <?php }?>
            <?php if($v['videoavi']!=""){?>
    <a href="videos/registro/descargar.php?codvideo=<?php echo $v['codvideo']?>&tipo=avi" class="btn btn-success" target="_blank"><i class="glyphicon glyphicon-download glyphicon-blue"></i>Avi</a>
            <?php }?>
            </div>
           </td>
            <?php
            if($i==3){
                $i=0;
            ?>
            </tr>
            <tr>
            <?php    
            }
        }
        ?>
        </tr>
        </table>
        </div>
    </div>
</div>

<div class="row">
<?php }?>
<?php include_once("pie.php");?>