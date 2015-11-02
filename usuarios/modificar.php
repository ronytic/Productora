<?php
include_once("../login/check.php");
$folder="../";

$codusuarios=$_GET['codusuarios'];



$nivel=array(2=>"Prensa","3"=>"Producción","4"=>"Programación");

$titulo="Modificar Datos del Usuario";
include_once($folder."cabecerahtml.php");

$usus=$usuario->mostrarTodoRegistro("codusuarios=$codusuarios",0,"paterno,materno,nombre");
$usus=array_shift($usus);
?>
<script language="javascript">

</script>
<?php include_once($folder."cabecera.php");?>
<div class="col-sm-offset-2 col-lg-8 col-sm-8 col-xs-8">
    <div class="well with-header with-footer">
        <div class="header bordered-blue">Datos del Nuevo Usuario</div>
        <form class="" method="post" action="actualizar.php" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" name="codusuarios" value="<?php echo $usus['codusuarios']?>">
        <table class="table">
        <tr>
            <td>
            <label>
                Usuario:
                <input type="text" class="form-control input-ls" name="usuario" autofocus size="50" autocomplete="off" value="<?php echo $usus['usuario']?>">
            </label>
            <br>
            <label>
                Contraseña:
                <input type="password" class="form-control input-ls" name="password"  size="50" value="">
            </label>
            
            <br>
            <label>
                Nombre:
                <input type="text" class="form-control input-ls" name="nombre"  size="50" value="<?php echo $usus['nombre']?>">
            </label>
            <br>
            <label>
                Apellido Paterno:
                <input type="text" class="form-control input-ls" name="paterno"  size="50" value="<?php echo $usus['paterno']?>">
            </label>
            <br>
            <label>
                Apellido Materno:
                <input type="text" class="form-control input-ls" name="materno"  size="50" value="<?php echo $usus['materno']?>">
            </label>
            <br>
            <label>
                C.I.:
                <input type="text" class="form-control input-ls" name="ci"  size="50" value="<?php echo $usus['ci']?>">
            </label>
            
            
            <br>
            <label>
                Dirección:
                <input type="text" class="form-control input-ls" name="direccion"  size="50" value="<?php echo $usus['direccion']?>">
            </label>
            <br>
            </td> 
            <td>
            <label>
                Teléfono:
                <input type="text" class="form-control input-ls" name="telefono"  size="50" value="<?php echo $usus['telefono']?>">
            </label>
            <br>
            <label>
                Email:
                <input type="text" class="form-control input-ls" name="email"  size="50" value="<?php echo $usus['email']?>">
            </label>
            <br>
            <label>
                Celular:
                <input type="text" class="form-control input-ls" name="celular"  size="50" value="<?php echo $usus['celular']?>">
            </label>
            <br>
            <label>
                Cargo:
                <input type="text" class="form-control input-ls" name="cargo"  size="50" value="<?php echo $usus['cargo']?>">
            </label>
            <br>
            <label>
                Foto:
                <input type="file" class="form-control input-ls" name="foto"  size="50" value="">
                <?php if($usus['foto']!=""){
                ?>
                <img src="../imagenes/usuarios/<?php echo $usus['foto']?>" width="150" class="thumbnail">
                <?php    
                }?>
            </label>
            <br>
            <label>
                Nivel de Usuario:<br>
               <select name="nivel"  class="form-control">
               <?php foreach($nivel as $k=>$v){?>
                <option value="<?php echo $k?>" <?php echo $usus['nivel']==$k?'selected="selected"':'';?>><?php echo $v?></option>   
               <?php }?>
               </select>
            </label>
            <br>
            <label>
                Observación:
                <textarea class="form-control input-ls" name="obs" cols="50" rows="5"><?php echo $usus['obs']?></textarea>
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