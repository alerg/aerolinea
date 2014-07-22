<?php
include "../core/ConexionMySQL.php";

	$sqlReservasCaidas = 'select id_pasaje '.
	'from pasaje as p join vuelo as v on p.id_vuelo=v.id_vuelo '.
	'where p.id_estado=0 and v.fecha < DATE_SUB(NOW(),INTERVAL 24 HOUR); ';

	$conexion = new ConexionMySQL();
	$matriz = $conexion->ejecutarQuery($sqlReservasCaidas);

	$primera= true;
	$query = 'UPDATE pasaje SET id_estado = 4 WHERE id_pasaje IN (' ;
	for ($i=0; $i < count($matriz); $i++) {
		$registro = $matriz[$i];
	 	foreach ($registro as $key => $value) {
			$query .= $value . ',';
		}
	}
	$query = trim($query, ',');
	$query .= ')';
	$retorno = $conexion->ejecutarQuery($query);

	if($retorno == false)
		echo json_encode(false);
	else
		echo json_encode(true);
?>