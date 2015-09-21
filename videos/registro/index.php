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

$titulo="Subir Nuevo Video";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-12 col-sm-12 col-xs-12">
    <div class="well with-header with-footer">
        <div class="header bordered-blue">Datos del Video</div>
        <form class="" method="post" action="guardar.php" enctype="multipart/form-data">
        <table class="table">
        <tr>
            <td>
            <label>
                Nombre del Video:
                <input type="text" class="form-control input-ls" name="nombre" autofocus size="50">
            </label>
            <br>
            <label>
                Contenido:
                <textarea class="form-control input-ls" name="contenido" cols="50" rows="5"></textarea>
            </label>
            <br>
            <label>
                Fecha del Video:
                <input type="date" class="form-control input-ls" name="fechavideo" autofocus size="50" value="<?php echo date("Y-m-d");?>">
            </label>
            <br>
            <label>
                Tematica:<br>
               <select name="codtematica"  class="form-control">
               <?php foreach($tem as $t){?>
                <option value="<?php echo $t['codtematica']?>"><?php echo $t['nombre']?></option>   
               <?php }?>
               </select>
            </label>
            <br>
            <label>
                Equipo:
                <textarea class="form-control input-ls" name="equipo" cols="50" rows="5"></textarea>
            </label>
            <br>
            <label>
                Lugar de Grabación:
                <input type="text" class="form-control input-ls" name="lugardegrabacion" autofocus size="50">
            </label>
            <br>
            </td> 
            <td>
            <label>
                Formato:<br>
               <select name="codformato"  class="form-control">
               <?php foreach($for as $f){?>
                <option value="<?php echo $f['codformato']?>"><?php echo $f['nombre']?></option>   
               <?php }?>
               </select>
            </label>
            <br>
            <label>
                Duración del Video:
                <input type="text" class="form-control input-ls" name="duracion" autofocus size="50" value="00:00:00">
            </label>
            <br>
            
            <label>
                Archivo del Video:
                <input type="file" class="form-control input-ls" name="archivovideo" autofocus size="50" value="00:00:00">
            </label>
            <br>
            <label>
                Soporte:<br>
               <select name="codsoporte"  class="form-control">
               <?php foreach($sop as $s){?>
                <option value="<?php echo $s['codsoporte']?>"><?php echo $s['nombre']?></option>   
               <?php }?>
               </select>
            </label>
            <br>
            <label>
                Tipo:<br>
               <select name="codtipo"  class="form-control">
               <?php foreach($tip as $t){?>
                <option value="<?php echo $t['codtipo']?>"><?php echo $t['nombre']?></option>   
               <?php }?>
               </select>
            </label>
            <br>
            
            </td>       
        </tr>
        <tr>
            <td colspan=""><input type="submit" value="Guardar" class="btn btn-blue"></td>
        </tr>
        </table>
        </form>
    </div>
</div>

<?php include_once($folder."pie.php");?>