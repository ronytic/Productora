<?php
include_once("../../login/check.php");
$folder="../../";

$codvideo=$_GET['codvideo'];
include_once("../../class/video.php");
$video=new video;
$vid=$video->mostrarTodoRegistro("codvideo=".$codvideo,0,"");
$vid=array_shift($vid);

include_once("../../class/tematica.php");
$tematica=new tematica;
$tem=$tematica->mostrarTodoRegistro("codtematica=".$vid['codtematica'],0,"nombre");
$tem=array_shift($tem);

include_once("../../class/formato.php");
$formato=new formato;
$for=$formato->mostrarTodoRegistro("codformato=".$vid['codformato'],0,"nombre");
$for=array_shift($for);

include_once("../../class/soporte.php");
$soporte=new soporte;
$sop=$soporte->mostrarTodoRegistro("codsoporte=".$vid['codsoporte'],0,"nombre");
$sop=array_shift($sop);

include_once("../../class/tipo.php");
$tipo=new tipo;
$tip=$tipo->mostrarTodoRegistro("codtipo=".$vid['codtipo'],0,"nombre");
$tip=array_shift($tip);

include_once("../../class/descargas.php");
$descargas=new descargas;
$des=$descargas->cantidadDescargas($codvideo);
$des=array_shift($des);
$cantidad=$des['cantidad'];

include_once("../../class/equipo.php");
$equipo=new equipo;
$miembros=$equipo->mostrarTodoRegistro("codvideo=".$codvideo,0,"");
$titulo="Datos del Video";
include_once($folder."cabecerahtml.php");
?>
<script language="javascript">
$(document).on("ready",function(){
    $(document).on("click","#cerrar",function(e){
        e.preventDefault();
        window.close();
    })    ;
    $(document).on("click","#eliminar",function(e){
        e.preventDefault();
        if(confirm("¿Desea Eliminar este Video?")){
            var codvideo=$(this).attr("rel");
            $.post("eliminar.php",{"codvideo":codvideo},function(data){
               window.close();       
           });
            
        }
    });
})
</script>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-7 col-sm-7 col-xs-7">
    <div class="well with-header with-footer">
        <div class="header bordered-gold"><?php echo $vid['nombre']?></div>
        <video src="../../archivosvideos/mp4/<?php echo $vid['videomp4']?>" controls width="530" preload="auto">
        
        </video>
        <hr>
        
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th width="50">Cantidad de Descargas</th>
                    <th>Descargar</th>
                    <th></th>
                </tr>
            </thead>
            <tr>
                <td>
                    <center><h2 style="margin:0px !important;padding:0px !important;line-height:0px !important"><span class="label label-info"><?php echo $cantidad?></span></h2></center>
                </td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                         <?php if($vid['videomp4']!=""){?>
                        <a href="descargar.php?codvideo=<?php echo $codvideo?>&tipo=mp4" target="_blank" class="btn btn-lg btn-success"> <i class="glyphicon glyphicon-download glyphicon-blue"></i>Video Mp4</a> 
                        <?php }?>
                        <?php if($vid['videomov']!=""){?>
                        <a href="descargar.php?codvideo=<?php echo $codvideo?>&tipo=mov" target="_blank" class="btn btn-lg btn-success"> <i class="glyphicon glyphicon-download glyphicon-blue"></i>Video Mov</a>
                        <?php }?>
                        <?php if($vid['videoavi']!=""){?>
                        <a href="descargar.php?codvideo=<?php echo $codvideo?>&tipo=avi" target="_blank" class="btn btn-lg btn-success"> <i class="glyphicon glyphicon-download glyphicon-blue"></i>Video Avi</a>
                        <?php }?>
                    </div>
                </td>
                <td>
                <a href="#" class="btn btn-sm btn-danger" id="cerrar">Cerrar Video</a>
                </td>
            </tr>
        </table>
        
    </div>
</div>
<div class="col-lg-5 col-sm-5 col-xs-5">
    <div class="well with-header with-footer">
        <div class="header bordered-danger">Datos del Video</div>
        <table class="table table-hover table-striped table-bordered">
            <tr>
                <td class="der resaltar">Nombre</td>
                <td><?php echo $vid['nombre']?></td>
            </tr>
            <tr>
                <td class="der resaltar">Contenido</td>
                <td><?php echo $vid['contenido']?></td>
            </tr>
            <tr>
                <td class="der resaltar">Fecha del Video</td>
                <td><?php echo fecha2Str($vid['fechavideo'])?></td>
            </tr>
             <tr>
                <td class="der resaltar">Temática</td>
                <td><?php echo $tem['nombre']?></td>
            </tr>
             <tr>
                <td class="der resaltar">Formato</td>
                <td><?php echo $for['nombre']?></td>
            </tr>
             <tr>
                <td class="der resaltar">Equipo</td>
                <td>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Miembro</th>
                                <th>Cargo</th>
                            </tr>
                        </thead>
                    <?php foreach($miembros as $m){
                    $usus=$usuario->mostrarTodoRegistro("codusuarios=".$m['codusuarios'],0,"paterno,materno,nombre");
                    $usus=array_shift($usus);
                    ?>
                    <tr><td><?php echo $usus['paterno']?> <?php echo $usus['materno']?> <?php echo $usus['nombre']?></td><td><?php echo $usus['cargo']?></td></tr>
                    <?php
                    }?>
                    </table>      
               </td>
            </tr>
             <tr>
                <td class="der resaltar">Duración</td>
                <td><?php echo $vid['duracion']?></td>
            </tr>
             <tr>
                <td class="der resaltar">Soporte</td>
                <td><?php echo $sop['nombre']?></td>
            </tr>
             <tr>
                <td class="der resaltar">Lugar de Grabación</td>
                <td><?php echo $vid['lugardegrabacion']?></td>
            </tr>
            <tr>
                <td class="der resaltar">Tipo</td>
                <td><?php echo $tip['nombre']?></td>
            </tr>
        </table>
        <br>
        <?php if($_SESSION['CodUsuarioLog']==$vid['id']){?>
        <a href="#" class="btn  btn-danger" id="eliminar" rel="<?php echo $codvideo?>">¿Eliminar Video?</a>
        <?php }?>
    </div>
</div>
</div>
<div class="row">
<div class="col-lg-12 col-sm-12 col-xs-12">
    <div class="well with-header with-footer">
        <div class="header bordered-orange">Videos Relacionados</div>
        <div style="overflow-x:scroll">
        <?php
        $vid=$video->getRecords("codtematica=".$vid['codtematica']." and codvideo!=".$codvideo." and activo=1 ORDER BY rand() LIMIT 0,10");
        ?>
        <table class="table table-bordered">
           <thead>
            <tr>
             <?php 
            foreach($vid as $v){
            ?>
            <th><?php echo $v['nombre']?></th>
            <?php
            }?>
            </tr>
           </thead>
        <tr>
        <?php 
        
        foreach($vid as $v){
            ?>
            <td>
           <video src="../../archivosvideos/mp4/<?php echo $v['videomp4']?>" width="290" controls preload="none"></video>
           <br>
           <?php echo recortarTexto($v['contenido'],100)?>
           <hr>
           <a href="video.php?codvideo=<?php echo $v['codvideo']?>"  class="btn btn-darkorange">Ver Video</a>
           </td>
            <?php
        }
        ?>
        </tr>
        </table>
        </div>
    </div>
</div>
<?php include_once($folder."pie.php");?>