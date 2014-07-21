<?php
    include "/core/Entidad.php";
    include "/core/Recurso.php";
    include "/recursos/Aeropuertos.php";
    include "/recursos/Vuelos.php";
    include "/recursos/Pasajes.php";
    include "/recursos/Pagos.php";
    include "/recursos/Tipo_Avion.php";
    include "/asiento.php";

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
                    $retorno = $recurso->crear();
                    return json_encode($recurso); 
                }else{
                    $recurso->id = $_POST['id'];
                    //Modificar
                }
            break;
            case 'pagos':
                $recurso = new Recurso_Pagos();
                $recurso->idPasaje = $_POST['pasaje'];
                $recurso->formaPago = $_POST['formaPago'];
                $recurso->crear();
                return json_encode($recurso);
        }
        return json_encode($recurso);
    }

    function get($entidadParam, $param){
        $retorno = null;
        switch ($entidadParam) {
            case 'aeropuertos':
                $recurso = new Recurso_Aeropuertos();
                switch($param){
                    case 'obtenerTodos':
                        $retorno = $recurso->obtenerTodos();
                    break;
                    default:
                        $recurso->setCodigo($param);
                        $retorno = $recurso->obtener();
                }
            break;
            case 'vuelos':
                $recurso = new Recurso_Vuelos();
                switch($param){
                    case 'obtenerTodos':
                    $origen = $_GET['origen'];
                        $destino = $_GET['destino'];
                        $fecha = $_GET['fecha'];
                        if($fecha <> null){
                            $parsedDate = date_parse_from_format('d/m/Y', $fecha);
                            $recurso->fecha = $parsedDate['year'] .'-'. $parsedDate['month'] .'-'. $parsedDate['day'];
                        }
                        $retorno = $recurso->obtenerPorRecorrido($origen, $destino);
                    break;
                    case 'obtener';
                        $recurso->id = $_GET['id'];
                        $retorno = $recurso->obtenerPorId();
                    break;
                    default:
                }
            break;/*
            case 'aviones':
                if($param == 'obtenerPorReserva'){
                    $recurso = new Recurso_Aviones();
                    $recurso->idPasaje = $_POST['pasaje'];
                    $recurso->obtenerPorReserva();
                    $retorno = $recurso;
                }
            break;*/
            case 'reservas':
                $recurso = new Recurso_Pasajes();
                $recurso->obtenerPorId($_GET['id']);
                $retorno = $recurso;
            break;   
        }
        return json_encode($retorno);
    }
 ?>