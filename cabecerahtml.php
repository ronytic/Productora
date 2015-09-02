<?php
include_once($folder."class/menu.php");
include_once($folder."class/submenu.php");
include_once($folder."class/usuario.php");
$menu=new menu;
$submenu=new submenu;
$usuario=new usuario;
$Nivel=$_SESSION['Nivel'];
$CodUsuarioLog=$_SESSION['CodUsuarioLog'];
$datosusuario=$usuario->mostrarDatos($CodUsuarioLog);
$datosusuario=array_shift($datosusuario);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Productora AudioVisual</title>

    <meta name="description" content="blank page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="<?php echo $folder?>imagenes/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="<?php echo $folder?>css/core/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="#" rel="stylesheet" />
    <link href="<?php echo $folder?>css/core/assets/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo $folder?>css/core/assets/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300"  rel="stylesheet" type="text/css">-->

    <!--Beyond styles-->
    <link id="beyond-link" href="<?php echo $folder?>/css/core/assets/beyond.min.css" rel="stylesheet" />
    <link id="beyond-link" href="<?php echo $folder?>/css/core/assets/orange.min.css" rel="stylesheet" />
    <link href="<?php echo $folder?>css/core/assets/demo.min.css" rel="stylesheet" />
    <link href="<?php echo $folder?>css/core/assets/typicons.min.css" rel="stylesheet" />
    <link href="<?php echo $folder?>css/core/assets/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="#" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script language="javascript">
        var folder="<?php echo $folder?>";
    </script>
    <script src="<?php echo $folder?>js/core/assets/skins.min.js"></script>