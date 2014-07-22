<?php
// agregamos la bibliotecas necesarias
require_once('../lib/jpgraph/jpgraph.php');
require_once('../lib/jpgraph/jpgraph_pie.php');

include "../core/ConexionMySQL.php";

$id = $_GET['id'];

if($id == '1' || $id == '2' || $id == '3' || $id == '4'){


	switch($id){
		case '1'://Cantidad de pasajes vendidos
			$titulo = 'Cantidad de pasajes vendidos';
			$label = array();
			$query = 'SELECT COUNT(*) as Pasajes FROM pasaje;';
		break;
		case '2'://Cantidad de pasajes vendidos por categoría:
			$titulo = 'Cantidad de pasajes vendidos por categoría';
			$label = array('Categoria');
			$query = 'select Categoria, count(*) as Cantidad '.
					'from pasaje  '.
					'group by categoria; ';
		break;
		case '3'://Cantidad de pasajes vendidos  por destino:
			$titulo = 'Cantidad de pasajes vendidos  por destino';
			$label = array('Ciudad destino');
			$query = 'select a.ciudad as \'Ciudad destino\', count(*) as Cantidad '.
					'from pasaje as p join vuelo as v on p.id_vuelo=v.id_vuelo join recorrido as r on v.id_recorrido=r.id_recorrido join aeropuerto as a on a.ciudad=r.id_ciudad_destino '.
					'group by a.ciudad; ';
		break;
		case '4'://Cantidad de reservas caídas:
			$titulo = 'Cantidad de reservas caídas';
			$label = array('Reservas caídas');
			$query = 'select count(*) as \'Reservas caídas\' '.
					'from pasaje as p join vuelo as v on p.id_vuelo=v.id_vuelo '.
					'where p.id_estado=0 and v.fecha<DATE(NOW()); ';
		break;
	}

	$conexion = new ConexionMySQL();
	$matriz = $conexion->ejecutarQuery($query);
	$valores = array();
	$labels = array();
	for ($i=0; $i < count($matriz); $i++) {
		$registro = $matriz[$i];
	 	foreach ($registro as $key => $value) {
	 		if(! in_array($key, $label)){
	 			if(intval($value) > 0)
		 			array_push($valores, intval($value));
		 	}else{
		 		array_push($labels, $value .' - %.1f%%');
		 	}

		}
	}
	if(count($valores) > 0){
		$ancho = 600; $alto = 250;
		//crear la instancia del objeto graph
		$graph = new PieGraph($ancho,$alto, 'auto');
		//especificar la escala
		$graph-> SetScale('intint');
		//crear curva
		$curva = new PiePlot($valores);

		$curva->SetLabelType(PIE_VALUE_PER); 
		$curva->SetLabels($labels);

		// Configuraciones del grafico
		// agregar la curva al grafico
		$graph->Add($curva);
		// mostrar el grafico
		$graph->Stroke();
	}
}


?>
