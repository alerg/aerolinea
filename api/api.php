<?php

include "../core/conexion.php";

    $metodo = $_SERVER['REQUEST_METHOD'];  
    $url = $_SERVER['REQUEST_URI'];
    $split = explode('/', $url);
    $entidad = null;
    $param = null;

    foreach ($split as $key => $value) {
    	switch($key){
            case '2':
                $entidad = $value;
                break;
            case '3':
                $param =  $value;
                break; 
        }
    }

    switch ($metodo) {  
        case "GET":
        	echo getFromDB($entidad, $param);
		break;
		case "POST":  
			echo " method post";
        break;  
		case "DELETE"://"falling though". Se ejecutará el case siguiente  
		case "PUT":  
        break;  
		default:  
        break;
     }

    function getFromDB($entidadParam, $idParam){
        switch ($entidadParam) {
            case 'vuelos':
                $entidad = 'Vuelo';
                break;
            default:
                return;
                break;
        }

        $condicion['id'] = $idParam;
        $retorno = obtenerEntidad($entidad, $condicion);
        return json_encode($retorno);
    }
 ?>       