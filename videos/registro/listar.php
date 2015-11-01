<?php
include_once("../../login/check.php");
$folder="../../";
include_once("../../class/tematica.php");
$tematica=new tematica;
$tem=$tematica->mostrarTodoRegistro("",0,"nombre");

include_once("../../class/formato.php");
$formato=new formato;
$for=$formato->mostrarTodoRegistro("",0,"nombre");

include_once("../../class/soporte.php");
$soporte=new soporte;
$sop=$soporte->mostrarTodoRegistro("",0,"nombre");

include_once("../../class/tipo.php");
$tipo=new tipo;
$tip=$tipo->mostrarTodoRegistro("",0,"nombre");

$titulo="Búsqueda de Videos";
include_once($folder."cabecerahtml.php");
?>
<link href="<?php echo $folder?>css/core/jplayer/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $folder?>js/core/plugins/jplayer/jquery.jplayer.min.js"></script>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-12 col-sm-12 col-xs-12">
    <div class="well with-header with-footer">
        <div class="header bordered-blue">Datos de Búsqueda</div>
        <form class="formulario" method="post" action="buscar.php">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre del Video</th>
                    <th>Formato</th>
                    <th>Temática</th>
                    <th>Tipo</th>
                    <th>Soporte</th>
                    <th>Fecha</th>
                    <th></th>
                </tr>
            </thead>
            <tr>
                <td>
                <label>

                    <input type="text" class="form-control input-ls" name="nombre" autofocus size="30">
                </label>
                </td>
                <td>
                <label>
                   <select name="codformato"  class="form-control">
                   <option value="%">Todos</option>
                   <?php foreach($for as $f){?>
                    <option value="<?php echo $f['codformato']?>"><?php echo $f['nombre']?></option>   
                   <?php }?>
                   </select>
                </label>
                </td>
                <td>
                <label>
                   <select name="codtematica"  class="form-control">
                   <option value="%">Todos</option>
                   <?php foreach($tem as $t){?>
                    <option value="<?php echo $t['codtematica']?>"><?php echo $t['nombre']?></option>   
                   <?php }?>
                   </select>
                </label>
                </td>
                <td>
                <label>
                   <select name="codtipo"  class="form-control">
                   <option value="%">Todos</option>
                   <?php foreach($tip as $t){?>
                    <option value="<?php echo $t['codtipo']?>"><?php echo $t['nombre']?></option>   
                   <?php }?>
                   </select>
                </label>
                </td>
                <td>
                <label>
                   <select name="codsoporte"  class="form-control">
                   <option value="%">Todos</option>
                   <?php foreach($sop as $s){?>
                    <option value="<?php echo $s['codsoporte']?>"><?php echo $s['nombre']?></option>   
                   <?php }?>
                   </select>
                </label>
                </td>
                <td>
                    Desde:<br>
                    <input type="date" class="form-control input-ls" name="fechainicio" value="<?php echo date("Y-m-d");?>" required>

                    Hasta:<br>
                    <input type="date" class="form-control input-ls" name="fechafinal" value="<?php echo date("Y-m-d");?>" required>
                </td>
                <td><br>
                    <input type="submit" value="Buscar" class="btn btn-blue">
                </td>
            </tr>
        </table>

        </form>
    </div>
</div>
</div>
<div class="row">

    <div id="respuestaformulario">
    
    </div>


<?php include_once($folder."pie.php");?>