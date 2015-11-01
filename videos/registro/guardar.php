<?php
include_once("../../login/check.php");
$folder="../../";
include_once("../../class/video.php");
$video=new video;
include_once("../../class/equipo.php");
$equipo=new equipo;
//print_r($_POST);
if(!empty($_POST)){
extract($_POST);
if($_FILES['archivovideomp4']['name']!=""){
    @copy($_FILES['archivovideomp4']['tmp_name'],"../../archivosvideos/mp4/".$_FILES['archivovideomp4']['name']);    
    $archivovideomp4=$_FILES['archivovideomp4']['name'];
}
if($_FILES['archivovideomov']['name']!=""){
    @copy($_FILES['archivovideomov']['tmp_name'],"../../archivosvideos/".$_FILES['archivovideomov']['name']);    
    $archivovideomov=$_FILES['archivovideomov']['name'];
}
if($_FILES['archivovideoavi']['name']!=""){
    @copy($_FILES['archivovideoavi']['tmp_name'],"../../archivosvideos/".$_FILES['archivovideoavi']['name']);    
    $archivovideoavi=$_FILES['archivovideoavi']['name'];
}
$valores=array("nombre"=>"'$nombre'",
                "contenido"=>"'$contenido'",
                "fechavideo"=>"'$fechavideo'",
                "codtematica"=>"'$codtematica'",
                "codformato"=>"'$codformato'",
                "codresolucion"=>"'$codresolucion'",
                "equipo"=>"'$equipo'",
                "duracion"=>"'$duracion'",
                "videomp4"=>"'$archivovideomp4'",
                "videoavi"=>"'$archivovideoavi'",
                "videomov"=>"'$archivovideomov'",
                "codsoporte"=>"'$codsoporte'",
                "lugardegrabacion"=>"'$lugardegrabacion'",
                "codtipo"=>"'$codtipo'",
                );

/*echo "<pre>";
print_r($valores);
echo "</pre>";*/
$video->insertarRegistro($valores);
$codvideo=$video->ultimo();
$miembros=$_SESSION['miembros'];
if(!empty($miembros)){
    foreach($miembros as $m){$i++;
        $valores=array("codvideo"=>"'$codvideo'",
                        "codusuarios"=>"'".$m['cod']."'"
                        );
        $equipo->insertarRegistro($valores);
    }
}
$titulo="Archivo de Video Guardado Correctamente";
}
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