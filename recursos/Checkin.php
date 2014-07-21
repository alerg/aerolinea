<?php
	//Representa la tabla recorridos de SQL.
	class Recurso_Checkin extends Recurso{

		public $pasaje;
		public $columna;
		public $fila;
		public $fecha;

		public function __construct() {
			$this->pasaje = null;
			$this->columna = null;
			$this->fila = null;
			$this->fecha = null;
		}

		public function habilitadoCheckin($pasaje){
			$recursoPasaje = new Recurso_Pasajes();
			$recursoPasaje->obtenerPorId($pasaje);

			$recursoVuelo = new Recurso_Vuelos();
			$recursoVuelo = $recursoVuelo->obtenerPorId($recursoPasaje->vuelo);

			date_default_timezone_set('UTC');
			//Imprimimos la fecha actual dandole un formato
			$fechaActual = new DateTime("now");
			$fechaVuelo = date_create($recursoVuelo->fecha);
			$interval = date_diff($fechaActual, $fechaVuelo);
			$horas = $interval->format('%r%h');

			return ($horas <= 48 && $horas >0);
		}
	}
?>