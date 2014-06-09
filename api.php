<?php
    include "/recursos/Aeropuertos.php";

    header('Content-Type: application/json');

    $httpMetodo = $_SERVER['REQUEST_METHOD'];  
    $url = $_SERVER['REQUEST_URI'];
    $split = explode('/', $url);
    $entidad = null;
    $param = null;
    $metodo = null;

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

    switch ($httpMetodo) {  
        case "GET":
        echo get($entidad, $param);
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

    function get($entidadParam, $param){
        switch ($entidadParam) {
            case 'aeropuertos':
                $entidad = new Recurso_Aeropuertos();
                switch($param){
                case 'obtenerTodos':
                    $retorno = $entidad->obtenerTodos();
                break;
                default:
                    $entidad->setCodigo($param);
                    $retorno = $entidad->obtener();
                }
        }
        return json_encode($retorno);
    }
 ?>