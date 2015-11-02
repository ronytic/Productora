<?php
include_once("../login/check.php");
$folder="../";
$nivel=array(2=>"Prensa","3"=>"Producción","4"=>"Programación");


$titulo="Búsqueda de Usuarios";
include_once($folder."cabecerahtml.php");
?>
<script language="javascript">
$(document).on("ready",function(){
    $(document).on("click",".eliminar",function(e){
        e.preventDefault();
        if(confirm("¿Esta Seguro de Eliminar este usuario?")){
            var codusuarios=$(this).attr("rel")
            $.post("eliminar.php",{"codusuarios":codusuarios},function(data){
               $(".formulario").submit();
            });
        }
    }) 
    $(document).on("click",".modificar",function(e){
        if(!confirm("¿Desea Modificar este Usuario?")){
            e.preventDefault();
        }
    })   
})
</script>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-12 col-sm-12 col-xs-12">
    <div class="well with-header with-footer">
        <div class="header bordered-blue">Datos de Búsqueda</div>
        <form class="formulario" method="post" action="buscar.php">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Nivel</th>
                    <th></th>
                </tr>
            </thead>
            <tr>
                <td>
                <label>

                    <input type="text" class="form-control input-ls" name="nombre" autofocus size="20">
                </label>
                </td>
                <td>
                <label>

                    <input type="text" class="form-control input-ls" name="paterno" autofocus size="20">
                </label>
                </td>
                <td>
                <select name="nivel"  class="form-control">
                <option value="%">Todos</option>
               <?php foreach($nivel as $k=>$v){?>
                <option value="<?php echo $k?>"><?php echo $v?></option>   
               <?php }?>
               </select>
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
<div class="col-lg-12 col-sm-12 col-xs-12">
    <div class="well with-header with-footer">
        <div class="header bordered-orange">Resultados de la Búsqueda</div>
    <div id="respuestaformulario">
    
    </div>
    </div></div>

<?php include_once($folder."pie.php");?>