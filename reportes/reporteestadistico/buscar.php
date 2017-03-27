<?php
include_once("../../login/check.php");
include_once("../../class/video.php");
$video=new video;
include_once("../../class/descargas.php");
$descargas=new descargas;
extract($_POST);
$cabecera=array();
$descargados=array();
$subidos=array();
$Nivel=$_SESSION['Nivel'];
if($Nivel==1){
    $textonivel="and nivel LIKE '$nivelusuario'";
}else{
    $textonivel="and nivel=$Nivel";
}
for($i=strtotime($fechainicio); $i<=strtotime($fechafinal);$i=$i+86400){
    $fecha=date("Y-m-d",$i);
    //echo $i."-".$fecha."<br>";
    array_push($cabecera,"'".fecha2Str($fecha)."'");
    
    $vid=$video->mostrarTodoRegistro("fechavideo='$fecha' $textonivel");
    $cantidadsubido=count($vid);
    array_push($subidos,$cantidadsubido);
    
    
    $des=$descargas->cantidadDescargasWhere("fecha='$fecha' $textonivel");
    $des=array_shift($des);
    $cantidaddes=$des['cantidad'];
    array_push($descargados,$cantidaddes);
}
//print_r($cabecera);
?>
<div id="container"></div>
<script language="javascript" type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Reporte Estadístico de Videos',
            x: -20 //center
        },
        subtitle: {
            text: 'Subida y Descargas de Videos, de <?php echo fecha2Str($fechainicio)?> a <?php echo fecha2Str($fechafinal)?>',
            x: -20
        },
        xAxis: {
            categories: [<?php echo implode(",",$cabecera)?>]
        },
        yAxis: {
            title: {
                text: 'Cantidad'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Descargas',
            data: [<?php echo implode(",",$descargados)?>]
        }, {
            name: 'Subidas',
            data: [<?php echo implode(",",$subidos)?>]
        }]
    });
});
</script>