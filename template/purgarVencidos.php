<?php
include "../core/ConexionMySQL.php";

    header('Content-Type: application/json');

	$sqlReservasCaidas = 'select id_pasaje '.
	'from pasaje as p join vuelo as v on p.id_vuelo=v.id_vuelo '.
	'where p.id_estado=0 and v.fecha > DATE_SUB(NOW(),INTERVAL 24 HOUR); ';

	$conexion = new ConexionMySQL();
	$matriz = $conexion->ejecutarQuery($sqlReservasCaidas);

	$cantidadPasajes = 0;
	$primera= true;
	$query = 'UPDATE pasaje SET id_estado = 3 WHERE id_pasaje IN (' ;
	for ($i=0; $i < count($matriz); $i++) {
		$registro = $matriz[$i];
	 	foreach ($registro as $key => $value) {
	 		$cantidadPasajes += 1;
			$query .= $value . ',';
		}
	}
	$query = trim($query, ',');
	$query .= ')';
	$retorno = $conexion->ejecutarQuery($query);
	$retorno = array('pasajes' => $cantidadPasajes);
	echo json_encode($retorno);
?>