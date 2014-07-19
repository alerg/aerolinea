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

		private function entidadesARecursos($entidades){
			$recursos = array();
			if(count($entidades) > 1){
				for ($i=0; $i < count($entidades); $i++) {
					$recurso = $this->entidadARecurso($entidades[$i]);
					array_push($recursos, $recurso);
				}
			}else{
				$recurso = $this->entidadARecurso($entidades[0]);
				array_push($recursos, $recurso);
			}
			return $recursos;
		}

		private function entidadARecurso($entidad){
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