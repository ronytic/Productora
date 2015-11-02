<?php
include_once("../../login/check.php");
include_once("../../class/video.php");
$video=new video;
include_once("../../class/descargas.php");
$descargas=new descargas;
include_once("../../class/tematica.php");
$tematica=new tematica;
include_once("../../class/formato.php");
$formato=new formato;
include_once("../../class/tipo.php");
$tipo=new tipo;
include_once("../../class/soporte.php");
$soporte=new soporte;
include_once("../../impresion/pdf.php");
extract($_GET);
class PDF extends PPDF{
	function Cabecera(){global $fechainicio,$fechafinal,$orden,$order;
        $this->CuadroCabecera(30,"Fecha Desde:",20,fecha2Str($fechainicio));
		$this->CuadroCabecera(20,"Hasta:",20,fecha2Str($fechafinal));
        $this->CuadroCabecera(30,"Ordenado por:",20,capitalizar($orden)." ".$order);
        $this->ln();
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(50,"Video");
		$this->TituloCabecera(30,"Temática");
        $this->TituloCabecera(20,"Fecha");
        $this->TituloCabecera(15,"Formato");
        $this->TituloCabecera(15,"Duración");
        $this->TituloCabecera(20,"Soporte");
        $this->TituloCabecera(30,"Lugar");
        $this->TituloCabecera(30,"Tipo");
        $this->TituloCabecera(20,"Descargas");
	}
}
$titulo="Reporte de Videos";
$pdf=new PDF("L","mm","letter");
$pdf->AddPage();
/*    
echo "<pre>";
print_r($_GET);
echo "</pre>";*/

$video->campos=array("v.*,(SELECT count(codvideo) FROM descargas WHERE codvideo=v.codvideo) as descarga ");
$video->tabla="video v";
$condicion="v.nombre LIKE '$nombre%' and v.codformato LIKE '$codformato' and v.codtematica LIKE '$codtematica' and v.codtipo LIKE '$codtipo' and v.codsoporte LIKE '$codsoporte' and v.fechavideo BETWEEN '$fechainicio' and '$fechafinal' and v.activo=1 ORDER BY $orden $order";
//echo $condicion;
$vid=$video->getRecords($condicion);

$i=0;
foreach($vid as $v){$i++;

    $tem=$tematica->mostrarTodoRegistro("codtematica=".$v['codtematica'],"","");  
    $tem=array_shift($tem);
    $for=$formato->mostrarTodoRegistro("codformato=".$v['codformato'],"","");  
    $for=array_shift($for);
    $sop=$soporte->mostrarTodoRegistro("codsoporte=".$v['codsoporte'],"","");
    $sop=array_shift($sop);
    
    $tem=$tematica->mostrarTodoRegistro("codtematica=".$v['codtematica'],"","");  
    $tem=array_shift($tem);
    
    $tip=$tipo->mostrarTodoRegistro("codtipo=".$v['codtipo'],"","");  
    $tip=array_shift($tip);
    if($i%2==0){$b=1;}else{$b=0;}
    $pdf->CuadroCuerpo(10,$i,$b,"R",1,"");
    $pdf->CuadroCuerpo(50,$v['nombre'],$b,"",1,"");
    $pdf->CuadroCuerpo(30,$tem['nombre'],$b,"",1,"");
    $pdf->CuadroCuerpo(20,fecha2Str($v['fechavideo']),$b,"",1,"");
    $pdf->CuadroCuerpo(15,$for['nombre'],$b,"",1,"");
    $pdf->CuadroCuerpo(15,$v['duracion'],$b,"",1,"");
    $pdf->CuadroCuerpo(20,$sop['nombre'],$b,"",1,"");
    $pdf->CuadroCuerpo(30,$v['lugardegrabacion'],$b,"",1,"");
    $pdf->CuadroCuerpo(30,$tip['nombre'],$b,"",1,"");
    $pdf->CuadroCuerpo(20,$v['descarga'],$b,"R",1,"");

    $pdf->ln();
}
$pdf->Output();
