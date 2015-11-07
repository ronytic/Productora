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

include_once("../../class/resolucion.php");
$resolucion=new resolucion;
$res=$resolucion->mostrarTodoRegistro("",0,"nombre");




$titulo="Subir Nuevo Video";
include_once($folder."cabecerahtml.php");

$usus=$usuario->mostrarTodoRegistro("",0,"paterno,materno,nombre");
?>
<script language="javascript">
$(document).on("ready",function(){
    listar(); 
    $("#agregarmiembro").click(function(e) {
        e.preventDefault();
        var codusuario=$("#miembro").val();
        $.post("agregarmiembro.php",{"codusuario":codusuario},function(){
            listar();
        });
    });
    $("#vaciarmiembros").click(function(e) {
        e.preventDefault();
        $.post("vaciar.php","",function(){
            listar();
        });
    });
});
function listar(){
    $.post("listarmiembros.php",{},function(data){
        $("#listamiembros").html(data);    
    });    
}
</script>
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
                <input type="text" class="form-control input-ls" name="nombre" autofocus size="50" required>
            </label>
            <br>
            <label>
                Contenido:
                <textarea class="form-control input-ls" name="contenido" cols="50" rows="5" required></textarea>
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
            <fieldset class="border">
                Miembro: <select id="miembro">
                <?php foreach($usus as $us){?>
                <option value="<?php echo $us['codusuarios']?>"><?php echo $us['paterno']?> <?php echo $us['materno']?> <?php echo $us['nombre']?> - <?php echo $us['cargo']?></option>
                <?php }?>
                </select><a href="#" class="btn btn-success btn-xs" id="agregarmiembro">Agregar</a> <a href="#" class="btn btn-danger btn-xs" id="vaciarmiembros">Vaciar</a>
                <div id="listamiembros">
                
                </div>
            </fieldset>
            <br>
            <label>
                Lugar de Grabación:
                <input type="text" class="form-control input-ls" name="lugardegrabacion" autofocus size="50" required>
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
                Archivo del Video MP4 Obligatorio: <span class="badge badge-info">Para la Vista Previa en el Sistema</span>
                <input type="file" class="form-control input-ls" name="archivovideomp4" autofocus size="50" value="00:00:00" required accept=".mp4">
            </label>
            <br>
            
            <label>
                Archivo del Video MOV:
                <input type="file" class="form-control input-ls" name="archivovideomov" autofocus size="50" value="00:00:00" accept=".mov">
            </label>
            <br>
            
            <label>
                Archivo del Video AVI:
                <input type="file" class="form-control input-ls" name="archivovideoavi" autofocus size="50" value="00:00:00" accept=".avi">
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
            <label>
                Resolución:<br>
               <select name="codtipo"  class="form-control">
               <?php foreach($res as $r){?>
                <option value="<?php echo $r['codresolucion']?>"><?php echo $r['nombre']?></option>   
               <?php }?>
               </select>
            </label>
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