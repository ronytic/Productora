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
<script type="text/javascript">
$(document).on("ready",function(){
    $(".visible").click(function(e) {
        e.preventDefault();
        var rel=$(this).attr("rel");
        if(rel=="Todos"){
            $(".SuperAdmin,.Prensa,.Producción,.Programación").show();
        }else{
            $(".cv").hide();
            $("."+rel).show();
        }
    });
});$()
</script>
<?php include_once("cabecera.php");?> 
<div style="">
<?php foreach($tem as $t){?>
<a href="#<?php echo $t['nombre']?>" class="btn btn-xs btn-warning"><?php echo $t['nombre']?></a>
<?php }?>
<?php if($_SESSION['Nivel']==1){?>
<div class="pull-right">
<a href="#" class="btn btn-xs btn-default visible" rel="Todos">Todos</a>
<a href="#" class="btn btn-xs btn-default visible" rel="SuperAdmin">SuperAdmin</a>
<a href="#" class="btn btn-xs btn-default visible" rel="Prensa">Prensa</a>
<a href="#" class="btn btn-xs btn-default visible" rel="Producción">Producción</a>
<a href="#" class="btn btn-xs btn-default visible" rel="Programación">Programación</a>
</div>
<?php }?>
</div>
<?php foreach($tem as $t){?>
<a name="<?php echo $t['nombre']?>"></a>
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="well with-header with-footer" >
            <div class="header bordered-<?php echo $datos[rand(0,3)]?>"> <?php echo $t['nombre']?></div>
            
            <?php
            $video->campos=array("v.*,(SELECT count(codvideo) FROM descargas WHERE codvideo=v.codvideo) as descarga ");
            $video->tabla="video v";
            $Nivel=$_SESSION['Nivel'];
            if($Nivel!=1){
                $ResNivel="and nivel=$Nivel";
            }else{
                $ResNivel="";
            }
            
        $vid=$video->getRecords("codtematica=".$t['codtematica']." and activo=1 $ResNivel ORDER BY descarga DESC,fechavideo DESC  LIMIT 0,20");
        ?>
        <table class="table table-bordered">
        <tr>
        <?php 
        $i=0;
        foreach($vid as $v){$i++;
         switch($v['nivel']){
            case 1:{$textonivel="SuperAdmin";}break;
            case 2:{$textonivel="Prensa";}break;
            case 3:{$textonivel="Producción";}break;
            case 4:{$textonivel="Programación";}break;
          }
            ?>
            <td class="<?php echo $textonivel;?> cv">
            <div class="panel panel-warning">
            <div class="panel-heading">
            <?php echo $v['nombre']?><span class="badge badge-info pull-right"><?php echo $textonivel?></span></div></div>
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