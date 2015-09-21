<?php
include_once("../../login/check.php");
$folder="../../";
include_once("../../class/video.php");
$video=new video;
extract($_POST);
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
$condicion="nombre LIKE '$nombre%' and codformato LIKE '$codformato' and codtematica LIKE '$codtematica' and codtipo LIKE '$codtipo' and codsoporte LIKE '$codsoporte' and fechavideo BETWEEN '$fechainicio' and '$fechafinal'";
$vid=$video->mostrarTodoRegistro($condicion,"","fechavideo");
include_once("../../class/tematica.php");
$tematica=new tematica;
?>
<div class="row">
<?php foreach($vid as $v){
  $tem=$tematica->mostrarTodoRegistro("codtematica=".$v['codtematica'],"","");  
  $tem=array_shift($tem);
?>    
<div class="col-lg-4 col-sm-4 col-xs-4">
    <div class="well with-header with-footer">
    <div class="header bordered-red"><?php echo $v['nombre']?></div>
    <video src="../../archivosvideos/<?php echo $v['video']?>" width="290" controls preload="none"></video>
    
    <table class="table table-bordered">
    <tr>
        <td><?php echo $v['contenido']?></td>
    </tr>
    </table>
    
    <span class="badge badge-danger"><?php echo $tem['nombre']?></span><br><br>
    <a href="video.php?codvideo=<?php echo $v['codvideo']?>" target="_blank" class="btn btn-darkorange">Ver Video</a>
    </div>
</div>
<?php }?>
</div>