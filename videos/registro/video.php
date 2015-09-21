<?php
include_once("../../login/check.php");
$folder="../../";

$codvideo=$_GET['codvideo'];
include_once("../../class/video.php");
$video=new video;
$vid=$video->mostrarTodoRegistro("codvideo=".$codvideo,0,"");
$vid=array_shift($vid);

include_once("../../class/tematica.php");
$tematica=new tematica;
$tem=$tematica->mostrarTodoRegistro("codtematica=".$vid['codtematica'],0,"nombre");
$tem=array_shift($tem);

include_once("../../class/formato.php");
$formato=new formato;
$for=$formato->mostrarTodoRegistro("codformato=".$vid['codformato'],0,"nombre");
$for=array_shift($for);

include_once("../../class/soporte.php");
$soporte=new soporte;
$sop=$soporte->mostrarTodoRegistro("codsoporte=".$vid['codsoporte'],0,"nombre");
$sop=array_shift($sop);

include_once("../../class/tipo.php");
$tipo=new tipo;
$tip=$tipo->mostrarTodoRegistro("codtipo=".$vid['codtipo'],0,"nombre");
$tip=array_shift($tip);

$titulo="Subir Nuevo Video";
include_once($folder."cabecerahtml.php");
?>
<script language="javascript">
$(document).on("ready",function(){
    $(document).on("click","#cerrar",function(e){
        e.preventDefault();
        window.close();
    })    
})
</script>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-7 col-sm-7 col-xs-7">
    <div class="well with-header with-footer">
        <div class="header bordered-gold"><?php echo $vid['nombre']?></div>
        <video src="../../archivosvideos/<?php echo $vid['video']?>" controls width="550" preload="auto">
        
        </video>
        <hr>
        <a href="#" class="btn btn-lg btn-danger" id="cerrar">Cerrar Video</a>
    </div>
</div>
<div class="col-lg-5 col-sm-5 col-xs-5">
    <div class="well with-header with-footer">
        <div class="header bordered-danger">Datos del Video</div>
        <table class="table table-hover table-striped table-bordered">
            <tr>
                <td class="der resaltar">Nombre</td>
                <td><?php echo $vid['nombre']?></td>
            </tr>
            <tr>
                <td class="der resaltar">Contenido</td>
                <td><?php echo $vid['contenido']?></td>
            </tr>
            <tr>
                <td class="der resaltar">Fecha del Video</td>
                <td><?php echo $vid['fechavideo']?></td>
            </tr>
             <tr>
                <td class="der resaltar">Temática</td>
                <td><?php echo $tem['nombre']?></td>
            </tr>
             <tr>
                <td class="der resaltar">Formato</td>
                <td><?php echo $for['nombre']?></td>
            </tr>
             <tr>
                <td class="der resaltar">Equipo</td>
                <td><?php echo $vid['equipo']?></td>
            </tr>
             <tr>
                <td class="der resaltar">Duración</td>
                <td><?php echo $vid['duracion']?></td>
            </tr>
             <tr>
                <td class="der resaltar">Soporte</td>
                <td><?php echo $sop['nombre']?></td>
            </tr>
             <tr>
                <td class="der resaltar">Lugar de Grabación</td>
                <td><?php echo $vid['lugardegrabacion']?></td>
            </tr>
            <tr>
                <td class="der resaltar">Tipo</td>
                <td><?php echo $tip['nombre']?></td>
            </tr>
        </table>
        <br>
        <a href="descargar.php?codvideo=<?php echo $codvideo?>" target="_blank" class="btn btn-lg btn-darkorange">Descargar Video</a>
    </div>
</div>
<?php include_once($folder."pie.php");?>