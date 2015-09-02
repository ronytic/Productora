<?php
include_once("bd.php");
class usuario extends bd{
	var $tabla="usuarios";
	function mostrarDatos($CodUsuario){
		$this->campos=array("*");
		return $this->getRecords("CodUsuario=$CodUsuario and Activo=1");
	}
	function mostrarUsuarios($menos=""){
		$menos=$menos?"$menos and ":'';
		$this->campos=array("*");
		return $this->getRecords("$menos Activo=1","Paterno,Materno,Nombres");
	}
	function actualizarDatos($valores,$CodUsuario){
		return $this->updateRow($valores,"CodUsuario=$CodUsuario");
	}
	
	function loginUsuarios($Usuario,$Password){
		$this->campos=array("count(*) as Can,codusuarios,nivel");	
		return $this->getRecords("usuario='$Usuario' and password=MD5('$Password') and Activo=1");
	}
}
?>