<?php
	include "/entidades/Recorrido.php";
	include "/entidades/Vuelo.php";
	
	class Recurso_Vuelos{
		public $precioPrimera;
		public $precioEconomy;
		public $id;
		public $fecha;
		public $asientosDisponiblesPrimera;
		public $asientosDisponiblesEconomica;

		private $origen;
		private $destino;
		private $entidadRecorrido;
		private $entidadVuelo;

		public function __construct($origen, $destino) {
			$this->entidadRecorrido = new Entidad_Recorrido();
			$this->entidadRecorrido->setOrigen($origen);
			$this->entidadRecorrido->setDestino($destino);
			$this->entidadVuelo = new Entidad_Vuelo();
		}

		public function obtener(){
			$recorrido = $this->entidadRecorrido->obtener();
			if(count($recorrido) > 0){
				$this->entidadVuelo->id_recorrido = $recorrido[0]['id_recorrido'];
				$vuelo = $this->entidadVuelo->obtener('id_recorrido');
				if($vuelo =! null){
					//TODO: null en constructor
					$recurso = $this->entidadARecurso($vuelo);
					$recurso->precioPrimera = $recorrido[0]['precio_primera'];
					$recurso->precioEconomy = $recorrido[0]['precio_economy'];
				}
				return $vuelo;
			}
			return null;
		}

		public function obtenerTodos(){
			$recorrido = $this->entidadRecorrido->obtener();
			if(count($recorrido) > 0){
				$this->entidadVuelo->id_recorrido = $recorrido[0]['id_recorrido'];
				$vuelos = $this->entidadVuelo->obtenerTodos('id_recorrido');
				$recursos = array();
				foreach ($vuelos as $key => $value) {
					//TODO: null en constructor
					$recurso = $this->entidadARecurso($value);
					$recurso->precioPrimera = $recorrido[0]['precio_primera'];
					$recurso->precioEconomy = $recorrido[0]['precio_economy'];

					array_push($recursos, $recurso);
				}
			}
			return $recursos;
		}

		private function entidadARecurso($entidad){
			//TODO: null en constructor
			$recurso = new Recurso_Vuelos(null, null);
			$recurso->id = $entidad->id_vuelo;
			$recurso->fecha = $entidad->fecha;
			$recurso->asientosDisponiblesPrimera = $entidad->asientos_disponibles_primera;
			$recurso->asientosDisponiblesEconomica = $entidad->asientos_disponibles_economy;
			$recurso->asientosExcedidos = $entidad->asientos_exedidos;

			return $recurso;
		}
	}
?>