<?php
    include "/recursos/Aeropuertos.php";
    include "/recursos/Vuelos.php";
    include "/recursos/Pasajes.php";

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
            echo post($entidad);
        break;  
     }

    function post($entidadParam){
        switch ($entidadParam) {
            case 'reservas':
                $recurso = new Recurso_Pasajes();
                $recurso->vuelo = $_POST['vuelo'];
                $recurso->nombre = $_POST['nombre'];
                $recurso->email = $_POST['email'];
                $recurso->fecha = $_POST['fecha'];
                $recurso->dni = $_POST['dni'];
                $recurso->categoria = $_POST['categoria'];
                if($_POST['id'] == null){
                    $recurso->crear();
                }else{
                    $recurso->id = $_POST['id'];
                    //Modificar
                }
            break;
        }
        return json_encode($recurso);
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
            case 'vuelos':
                $origen = $_GET['origen'];
                $destino = $_GET['destino'];
                $recurso = new Recurso_Vuelos($origen, $destino);
                switch($param){
                    case 'obtenerTodos':
                        $retorno = $recurso->obtenerTodos();
                    break;
                    default:
                        $retorno = $recurso->obtener();
                }
            break;
        }
        return json_encode($retorno);
    }
 ?>