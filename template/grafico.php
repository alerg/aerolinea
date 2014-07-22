<?php
// agregamos la bibliotecas necesarias
require_once ('../lib/jpgraph/src/jpgraph.php');
require_once ('../lib/jpgraph/src/jpgraph_pie.php');

include "../core/ConexionMySQL.php";

$id = $_GET['id'];

if($id == '1' || $id == '2' || $id == '3' || $id == '4'){


	switch($id){
		case '1'://Cantidad de pasajes vendidos
			$titulo = 'Cantidad de pasajes vendidos';
			$query = 'SELECT COUNT(*) as cant_pasaje_vendidos FROM pasaje;';
		break;
		case '2'://Cantidad de pasajes vendidos por categoría:
			$titulo = 'Cantidad de pasajes vendidos por categoría';
			$query = 'select categoria, count(*) as cantidad '.
					'from pasaje  '.
					'group by categoria; ';
		break;
		case '3'://Cantidad de pasajes vendidos  por destino:
			$titulo = 'Cantidad de pasajes vendidos  por destino';
			$query = 'select a.ciudad, count(*) as cantidad '.
					'from pasaje as p join vuelo as v on p.id_vuelo=v.id_vuelo join recorrido as r on v.id_recorrido=r.id_recorrido join aeropuerto as a on a.ciudad=r.id_ciudad_destino '.
					'group by a.ciudad; ';
		break;
		case '4'://Cantidad de reservas caídas:
			$titulo = 'Cantidad de reservas caídas';
			$query = 'select count(*) '.
					'from pasaje as p join vuelo as v on p.id_vuelo=v.id_vuelo '.
					'where p.id_estado=0 and v.fecha<DATE(NOW()); ';
		break;
	}
}


	$conexion = new ConexionMySQL();
	$matriz = $conexion->ejecutarQuery($query);
	$valores = array();
		for ($i=0; $i < count($matriz); $i++) {
			$registro = $matriz[$i];
		 	foreach ($registro as $key => $value) {
			echo $value;
		 		array_push($valores, utf8_encode($value));
			}
		}


// agregamos la bibliotecas necesarias
require_once ('../lib/jpgraph/src/jpgraph.php');
require_once ('../lib/jpgraph/src/jpgraph_pie.php');
//definimos los datos
$datos = array(5,8,5,6,5,2,25,8,10);
// Definir ancho y alto del grafico
$ancho = 600; $alto = 250;
//crear la instancia del objeto graph
$graph = new PieGraph($ancho,$alto, 'auto');
//especificar la escala
$graph-> SetScale('intint');
//crear curva
$curva = new PiePlot($valores);
// Configuraciones del grafico
// agregar la curva al grafico
$graph->Add($curva);
// mostrar el grafico
$graph->Stroke();
?>
