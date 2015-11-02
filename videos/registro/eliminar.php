<?php
include_once("../../login/check.php");
$folder="../../";

$codvideo=$_POST['codvideo'];
include_once("../../class/video.php");
$video=new video;
$vid=$video->eliminarRegistro("codvideo=".$codvideo);

?>