<?php
include_once("bd.php");
class descargas extends bd{
	var $tabla="descargas";
    function cantidadDescargas($codvideo){
        $this->campos=array("count(*) as cantidad");
        return $this->getRecords("codvideo=$codvideo and activo=1");
    }
}
?>