<?php 

error_reporting(0);

$respuesta = ControladorReservas::ctrMostrarReservas(null, null);

$arrayFechas = array();
$sumaPagosMes = array();

foreach ($respuesta as $key => $value){

	#Capturamos año y mes
	$fecha = substr($value["fechavta"],0,10);

	#Introducir las fechas en arrayFechas
	array_push($arrayFechas, $fecha);
	
	#Capturamos las ventas
	$arrayVentas = array($fecha => $value["totalventa"]);
	
	#Sumamos los pagos que ocurrieron el mismo mes

	foreach ($arrayVentas as $key2 => $value2) {

		$sumaPagosMes[$key2] += $value2;
		
	
	}
	
}
?>










<?php

$noRepetirFechas = array_unique($arrayFechas);

$inicio = min($arrayFechas);
$fin = max($arrayFechas);


 ?>


<div class="card bg-gradient-info m-0">

	<div class="card-header no-border">
		<div class="col-6 col-md-9">
            <h3 class="card-title" style="font-size:1.8rem">
                <i class="fas fa-th mr-1"></i>
                Total $ de venta por dia
            </h3>
        </div>
	</div>

	<div class="card-body">
        <div class="chart" id="line-chart-ventas"></div>
	</div>
</div>






<script>
var line = new Morris.Line({
    element          : 'line-chart-ventas',
    resize           : true,
    data             : [
    <?php
    if($noRepetirFechas != null){
    	 foreach($noRepetirFechas as $key){
    	 	echo "{ y: '".$key."', ventas: ".$sumaPagosMes[$key]." },";
    	 }
    }else{
    	 echo "{ y: '0', ventas: '0' }";
    }
    ?>
    ],
    xkey             : 'y',
    ykeys            : ['ventas'],
    labels           : ['ventas'],
    lineColors       : ['#efefef'],
    lineWidth        : 2,
    resize: true,
    hideHover        : 'auto',
    gridTextColor    : '#fff',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : '#efefef',
    gridTextFamily   : 'Open Sans',
    preUnits         : '$',
    gridTextSize     : 10,




});
</script>