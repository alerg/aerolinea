<?php

    $metodo = $_SERVER['REQUEST_METHOD'];  
    $url = $_SERVER['REQUEST_URI'];
    $split = explode('/', $url);
    $entidad = null;
    $param = null;
    $conexion = new ConexionMySQL();

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
		case "DELETE":
		case "PUT":  
        break;  
		default:  
        break;
     }

    function getFromDB($entidadParam, $idParam){
        switch ($entidadParam) {
            case 'recorridos':
                $entidad = new Recorrido();
                break;
            case 'Aeropuestos':
                $entidad = new Aeropuertos();
                break;
        }

        $idParam;

        $retorno = $entidad.obtenerEntidad();
        return json_encode($retorno);
    }
 ?>       