<?php
include_once("../login/check.php");
$folder="../";
include_once("../class/usuario.php");
$usu=new usuario;
//print_r($_POST);
if(!empty($_POST)){
extract($_POST);
if($_FILES['foto']['name']!=""){
    $nombrearchivo=quitarSimbolosArchivo($_FILES['foto']['name'],false);
    $nombrearchivo=str_ireplace(" ","_",$nombrearchivo);
    @copy($_FILES['foto']['tmp_name'],"../imagenes/usuarios/".$nombrearchivo);    
    $foto=$nombrearchivo;
}

$valores=array("usuario"=>"'$usuario'",
                "password"=>"MD5('$password')",
                "nombre"=>"'$nombre'",
                "paterno"=>"'$paterno'",
                "materno"=>"'$materno'",
                "ci"=>"'$ci'",
                "direccion"=>"'$direccion'",
                "telefono"=>"'$telefono'",
                "email"=>"'$email'",
                "celular"=>"'$celular'",
                "cargo"=>"'$cargo'",
                "foto"=>"'$foto'",
                "nivel"=>"'$nivel'",
                "obs"=>"'$obs'",
                );

/*echo "<pre>";
print_r($valores);
echo "</pre>";*/
$usu->insertarRegistro($valores);
$titulo="Usuario Guardado Correctamente";
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
                Usuario Guardado Correctamente
            </div>
            <a href="nuevo.php" class="btn btn-success">Crear Nuevo Usuario</a>
            <a href="listar.php" class="btn btn-info">Listar Usuarios</a>
        </div>
    </div>
</div>
<?php include_once($folder."pie.php");?>