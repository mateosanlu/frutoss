<?php
require 'simple_html_dom.php';
// Create DOM from URL
$html = file_get_html('http://www.corabastos.com.co/sitio/index.php');

$html1 = file_get_html('http://www.corabastos.com.co/sitio/historicoApp2/reportes/index.php?wmode=transparent');


//DEVUELVE LA TABLA DEL INICIO
$frutas = $html->find('div[class=table-responsive]');

foreach ($frutas as $frutas) {
	
	$fila = $frutas->find('table ',1);
	$titulo = $fila->innertext;

	//echo $fila,"\n\n";
}

//DEVUELVE LA FECHA
$head = $html1->find('dl[class=dl-horizontal]');
foreach ($head as $head) {

	$titulo = $head->find('div h2',0)->innertext;
	$fecha = $head->find('dd div',0)->innertext;

	//echo $titulo,"\n\n", $fecha,"\n\n";
}


//DEVUELVE LAS TABLAS COMPLETAS

$frutas = $html1->find('div[class=table-responsive]');

foreach ($frutas as $frutas) {
	
	$tabla = $frutas->find('table ',0);
	$fila = $tabla->innertext;

	//echo $fila,"\n";
}

//DEVUELVE LAS FILAS COMPLETAS
$frutas = $html1->find('div[class=table-responsive] table tbody tr');

foreach ($frutas as $frutas) {
	
	$contenido = $frutas->innertext;

	//echo $contenido,"<br>";
}


//DEVUELVE CELDAS POR SEPARADO
$productos = $html1->find('div[class=table-responsive] table tbody tr');

foreach ($productos as $fila) {

	$nombre = $fila->find('td',0);
	$presentacion = $fila->find('td',1);
	$cantidad = $fila->find('td',2);
	$unidad = $fila->find('td',3);
	$extra = $fila->find('td',4);
	$primera = $fila->find('td',5);
	$valorUnd = $fila->find('td',6);
	$granSup = $fila->find('td',7);

	//echo $nombre,"\n",$presentacion,"\n",$cantidad,"\n",$unidad,"\n",$extra,"\n",$primera,"\n",$valorUnd,"\n",$granSup,"<br>";


}


?>