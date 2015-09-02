<?php
include_once("bd.php");
class submenu extends bd{
	var $tabla="submenu";
	function mostrar($Nivel,$Menu){
		$this->campos=array('nombre','url','imagen');
		switch($Nivel){
			case "1":{return $this->getRecords(" superadmin=1 and codmenu=$Menu and activo=1","orden");}break;
			case "2":{return $this->getRecords(" prensa=1 and codmenu=$Menu and activo=1","orden");}break;
			case "3":{return $this->getRecords(" produccion=1 and codmenu=$Menu and activo=1","orden");}break;
			case "4":{return $this->getRecords(" programacion=1 and codmenu=$Menu and activo=1","orden");}break;
        }
	}
}
?>