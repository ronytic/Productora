<?php
include_once("login/check.php");
$folder="./";
$titulo="Inicio de Sistema";
include_once("cabecerahtml.php");
?>
<?php include_once("cabecera.php");?>
<div class="col-lg-3 col-sm-12 col-xs-12">
    <div class="well with-header with-footer">
        <div class="header bordered-blue">Búqueda Producto</div>
        <form class="formulario" method="post">
        <label>
            Código de Producto:
            <input type="text" class="form-control input-xs" name="codigo" autofocus>
        </label>
        <label>
            Producto:<br>
           <select name="codproducto">
            <option class="%">Todos</option>
           </select>
        </label>
        <br>
        <input type="submit" value="Buscar" class="btn btn-blue">
        </form>
    </div>
</div>
<div class="col-lg-9 col-sm-12 col-xs-12">
    <div class="well with-header with-footer" id="datos">
    
    </div>
</div>
<?php include_once("pie.php");?>