<?php
include_once("../../login/check.php");

$codusuario=$_POST['codusuario'];

include_once("../../class/usuario.php");
$usuario=new usuario;
$usus=$usuario->mostrarTodoRegistro("codusuarios=$codusuario",0,"paterno,materno,nombre");
$usus=array_shift($usus);
$datos=array("cod"=>$codusuario,

               "datos"=>$usus['paterno']." ".$usus['materno']." ".$usus['nombre'],
               "cargo"=>$usus['cargo']
               );
$_SESSION['miembros'][]=$datos;

?>