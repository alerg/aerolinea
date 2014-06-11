<?php
    include "/recursos/Aeropuertos.php";
    include "/recursos/Vuelos.php";

    header('Content-Type: application/json');

    $httpMetodo = $_SERVER['REQUEST_METHOD'];  
    $url = $_SERVER['REQUEST_URI'];
    $split = explode('/', explode('?', $url)[0]);
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
        $retorno = null;
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
            break;
            case 'recorridos':
                $origen = $_GET['origen'];
                $destino = $_GET['destino'];
                $entidad = new Recurso_Vuelos($origen, $destino);
                $retorno = $entidad->obtener();
            break;
        }
        return json_encode($retorno);
    }
 ?>