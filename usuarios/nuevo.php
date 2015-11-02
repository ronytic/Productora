<?php
include_once("../login/check.php");
$folder="../";
include_once("../class/tematica.php");
$tematica=new tematica;
$tem=$tematica->mostrarTodoRegistro("",0,"nombre");



$nivel=array(2=>"Prensa","3"=>"Producción","4"=>"Programación");

$titulo="Nuevo Usuario";
include_once($folder."cabecerahtml.php");

$usus=$usuario->mostrarTodoRegistro("",0,"paterno,materno,nombre");
?>
<script language="javascript">

</script>
<?php include_once($folder."cabecera.php");?>
<div class="col-sm-offset-2 col-lg-8 col-sm-8 col-xs-8">
    <div class="well with-header with-footer">
        <div class="header bordered-blue">Datos del Nuevo Usuario</div>
        <form class="" method="post" action="guardar.php" enctype="multipart/form-data" autocomplete="off">
        <table class="table">
        <tr>
            <td>
            <label>
                Usuario:
                <input type="text" class="form-control input-ls" name="usuario" autofocus size="50" autocomplete="off" value="">
            </label>
            <br>
            <label>
                Contraseña:
                <input type="password" class="form-control input-ls" name="password"  size="50">
            </label>
            
            <br>
            <label>
                Nombre:
                <input type="text" class="form-control input-ls" name="nombre"  size="50">
            </label>
            <br>
            <label>
                Apellido Paterno:
                <input type="text" class="form-control input-ls" name="paterno"  size="50">
            </label>
            <br>
            <label>
                Apellido Materno:
                <input type="text" class="form-control input-ls" name="materno"  size="50">
            </label>
            <br>
            <label>
                C.I.:
                <input type="text" class="form-control input-ls" name="ci"  size="50">
            </label>
            
            
            <br>
            <label>
                Dirección:
                <input type="text" class="form-control input-ls" name="direccion"  size="50">
            </label>
            <br>
            </td> 
            <td>
            <label>
                Teléfono:
                <input type="text" class="form-control input-ls" name="telefono"  size="50">
            </label>
            <br>
            <label>
                Email:
                <input type="text" class="form-control input-ls" name="email"  size="50">
            </label>
            <br>
            <label>
                Celular:
                <input type="text" class="form-control input-ls" name="celular"  size="50">
            </label>
            <br>
            <label>
                Cargo:
                <input type="text" class="form-control input-ls" name="cargo"  size="50">
            </label>
            <br>
            <label>
                Foto:
                <input type="file" class="form-control input-ls" name="foto"  size="50">
            </label>
            <br>
            <label>
                Nivel de Usuario:<br>
               <select name="nivel"  class="form-control">
               <?php foreach($nivel as $k=>$v){?>
                <option value="<?php echo $k?>"><?php echo $v?></option>   
               <?php }?>
               </select>
            </label>
            <br>
            <label>
                Observación:
                <textarea class="form-control input-ls" name="obs" cols="50" rows="5"></textarea>
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