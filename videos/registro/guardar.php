<?php
include_once("../../login/check.php");
$folder="../../";
include_once("../../class/video.php");
$video=new video;
//print_r($_POST);
extract($_POST);
if($_FILES['archivovideo']['name']!=""){
    @copy($_FILES['archivovideo']['tmp_name'],"../../archivosvideos/".$_FILES['archivovideo']['name']);    $archivovideo=$_FILES['archivovideo']['name'];
}
$valores=array("nombre"=>"'$nombre'",
                "contenido"=>"'$contenido'",
                "fechavideo"=>"'$fechavideo'",
                "codtematica"=>"'$codtematica'",
                "codformato"=>"'$codformato'",
                "equipo"=>"'$equipo'",
                "duracion"=>"'$duracion'",
                "video"=>"'$archivovideo'",
                "codsoporte"=>"'$codsoporte'",
                "lugardegrabacion"=>"'$lugardegrabacion'",
                "codtipo"=>"'$codtipo'",
                );

/*echo "<pre>";
print_r($valores);
echo "</pre>";*/
$video->insertarRegistro($valores);
$titulo="Archivo de Video Guardado Correctamente";

include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-offset-2 col-lg-6 col-sm-6 col-xs-6">
    <div class="widget">
        <div class="widget-header bordered-bottom bordered-themesecondary">
            <span class="widget-caption themesecondary">Mensaje</span>
        </div>
        <div class="widget-body">
            <div class="alert alert-success">
                Archivo Guardado Correctamente
            </div>
            <a href="index.php" class="btn btn-success">Subir Nuevo Archivo de Video</a>
            <a href="listar.php" class="btn btn-info">Listar Videos</a>
        </div>
    </div>
</div>
<?php include_once($folder."pie.php");?>