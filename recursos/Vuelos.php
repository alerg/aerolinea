<?php
	include "/entidades/Recorrido.php";
	include "/entidades/Vuelo.php";
	include "/entidades/Avion.php";
	include "/entidades/Checkin.php";

	class Recurso_Vuelos extends Recurso{
		public $precioPrimera;
		public $precioEconomy;
		public $id;
		public $fecha;
		public $asientosDisponiblesPrimera;
		public $asientosDisponiblesEconomica;

		public function obtenerPorRecorrido($origen, $destino){
			$entidadRecorrido = new Entidad_Recorrido();
			$entidadRecorrido->id_ciudad_origen = $origen;
			$entidadRecorrido->id_ciudad_destino = $destino;
			$entidadRecorrido->obtener();
			$recursos = array();
			if($entidadRecorrido->id_recorrido != null){
				$entidadVuelo = new Entidad_Vuelo();
				$entidadVuelo->id_recorrido = $entidadRecorrido->id_recorrido;
				$entidadVuelo->fecha = $this->fecha;
				$vuelos = $entidadVuelo->obtenerTodosPor(array('id_recorrido', 'fecha'));
				$recursos = $this->entidadesARecursos($vuelos);
				for ($i=0; $i < count($recursos); $i++) { 
					$recursos[$i]->precioPrimera = $entidadRecorrido->precio_primera;
					$recursos[$i]->precioEconomy = $entidadRecorrido->precio_economy;
				}
			}
			return $recursos;
		}

		public function obtenerPorId(){
			$entidadVuelo = new Entidad_Vuelo();
			$entidadVuelo->id_vuelo = $this->id;
			$entidadVuelo->obtenerPor('id_vuelo');
			$recurso = $this->entidadARecurso($entidadVuelo);

			$entidadAvion = new Entidad_Avion();
			$entidadAvion->id_avion = $entidadVuelo->id_avion;
			$entidadAvion->obtenerPor('id_avion');
			$recursoTipoAvion = new Recurso_Tipo_Avion();
			$recursoTipoAvion->obtenerPorId($entidadAvion->tipo_avion);
			$recurso->asientos = $recursoTipoAvion;

			$recursoPasaje = new Recurso_Pasajes();
			$pasajes = $recursoPasaje->obtenerTodosPorVueloConEstadoCheckin($this->id);

			$recurso->asientosOcupados = array();
			foreach ($pasajes as $index => $value) {
				$checkin = new Entidad_Checkin();
				$checkin->pasaje = $value->id;
				$checkin->obtenerPor('pasaje');
				$asiento = new Asiento($checkin->columna, $checkin->fila);
				array_push($recurso->asientosOcupados, $asiento);
			}
			return $recurso;
		}

		/**************METODOS PRIVADOS******************/

		protected function entidadARecurso($entidad){
			$recurso = new Recurso_Vuelos();
			$recurso->id = $entidad->id_vuelo;
			$recurso->fecha = $entidad->fecha;
			$recurso->asientosDisponiblesPrimera = $entidad->asientos_disponibles_primera;
			$recurso->asientosDisponiblesEconomica = $entidad->asientos_disponibles_economy;
			$recurso->asientosExcedidos = $entidad->asientos_exedidos;
			return $recurso;
		}
	}
?>