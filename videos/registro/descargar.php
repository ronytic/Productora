<?php
include_once("../../login/check.php");
$codvideo=$_GET['codvideo'];
$tipo=$_GET['tipo'];
include_once("../../class/video.php");
$video=new video;
$vid=$video->mostrarTodoRegistro("codvideo=".$codvideo,0,"");
$vid=array_shift($vid);
include_once("../../class/descargas.php");
$descargas=new descargas;
$descargas->insertarRegistro(array("codvideo"=>"$codvideo","tipo"=>"'$tipo'"));
// File: download.php
if (!isset($_GET['codvideo']) || empty($_GET['codvideo'])) {
    exit();
}
$root = "../../archivosvideos/".$tipo."/";
$file = basename($vid['video'.$tipo]);

$path = $root.$file;
$type = '';
 

if (is_file($path)) {
    // echo $path;
    $size = filesize($path);
    //echo $size;
    if (function_exists('mime_content_type')) {
        $type = mime_content_type($path);
    } else if (function_exists('finfo_file')) {
        $info = finfo_open(FILEINFO_MIME);
        $type = finfo_file($info, $path);
        finfo_close($info);  
    }
    if ($type == '') {
        $type = "application/force-download";
    }
    // Set Headers
   // echo $file;
    header("Content-Type: $type");
    header("Content-Disposition: attachment; filename=$file");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: " . $size);
    // Download File
   readfile($path);
} else {
    die("No existe el archivo!!");
}
/*
$archivo=$vid['video']; 
header("Pragma: public"); 
header("Expires: 0"); // set expiration time 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("Content-Type: application/force-download"); 
header("Content-Type: application/octet-stream"); 
header("Content-Type: application/download"); 
header("Content-Disposition: attachment; filename=Ronald_Nina_;"); 
header("Content-Transfer-Encoding: binary"); 
header("Content-Length: ".filesize($arch)); */
?>