<?php 
require 'simple_html_dom.php';

$html = file_get_html('http://www.corabastos.com.co/sitio/historicoApp2/reportes/index.php?wmode=transparent');

//DEVUELVE LOS PRODUCTOS
$filas = $html->find('div[class=table-responsive] table tbody tr');

for ($i = 0; $i < count($filas); $i++)
{
	for ($j=0; $j < 8; $j++) { 
			$productos[$i][$j] = $filas[$i]->find('td',$j);
	}
}

//DEVUELVE LA FECHA
$head = $html->find('dl[class=dl-horizontal]');
foreach ($head as $head) {

	$titulo = $head->find('div h2',0)->innertext;
	$fecha = $head->find('dd div',0)->innertext;

	//echo $titulo,"\n\n", $fecha,"\n\n";
}

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">
 	<title>Precios de Corabastos</title>
 	<link rel="stylesheet" type="text/css" href="style.css">

 </head>
 <body>
 	<div class="header">
 		<!--<h4>Bolet&iacute;n diario de precios</h4>-->
 		<h4><?php echo $fecha ?></h4>
 	</div>
 	
 	<div class="container">
 		<form action="#" method="get">
		  	<select name="productos" onchange="this.form.submit()">
		 		<?php for ($i=0; $i < count($productos); $i++) { 
		 			echo "<option value='",$i,"'>",$productos[$i][0],"</option>";
		 		} ?>
	 		</select>
		</form>
		<?php if (!empty($_GET["productos"])): ?>
			<h1><?php echo $productos[$_GET["productos"]][0] ?></h1>
			<span><?php echo $productos[$_GET["productos"]][1]," DE ",$productos[$_GET["productos"]][2],"\n",$productos[$_GET["productos"]][3] ?></span>
			<br><br>
			<span>Valor x unidad: <?php echo $productos[$_GET["productos"]][6] ?></span>
			<br>
			<span>Calidad Extra: <?php echo $productos[$_GET["productos"]][4] ?></span>
			<br>
			<span>Calidad Primera: <?php echo $productos[$_GET["productos"]][5] ?></span>
			<br>
			<span>Grandes Superficies: <?php echo $productos[$_GET["productos"]][7] ?></span>
		<?php endif ?>
 	</div>
	
 	
 </body>
 </html>