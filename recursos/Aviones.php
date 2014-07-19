<?php
	include "/entidades/Recorrido.php";
	include "/entidades/Vuelo.php";
	
	class Recurso_Aviones{
		public $reservaId;
		public $columnaPrimera;
		public $filaPrimera;
		public $columnaEconomy;
		public $filaEconomy;
		public $asientosOcupados;

		public function obtenerPorReserva(){
			$pasaje = new Entidad_Pasaje();
   			$pasaje->id_pasaje = $this->idPasaje;
   			$pasaje->obtenerPor("id_pasaje");

   			$vuelo = new Entidad_Vuelo();
   			$vuelo->id_vuelo = $pasaje->id_vuelo;;
   			$vuelo->obtenerPor("id_vuelo");

			$avion = new Entidad_Vuelo();
   			$avion->id = $vuelo->id_avion;
   			$avion->obtenerPor("id_avion");

			$tipoAvion = new Entidad_Tipo_Avion();
   			$tipoAvion->tipo_id = $avion->tipo_avion;
   			$tipoAvion->obtenerPor("tipo_avion");

   			$this->columnaPrimera = $tipo_avion->columnas_primera;
			$this->filaPrimera = $tipo_avion->filas_primera;

			$this->columnaEconomy = $tipo_avion->columnas_economy;
			$this->filaEconomy = $tipo_avion->filas_economy;

			$checkin = new Entidad_Checkin();
   			$checkin->id_pasaje = $pasaje->id_pasaje;
   			$entidadesCheckin = $checkin->obtenerPor("id_vuelo");

   			if(count($entidadesCheckin) > 0){
   				foreach ($entidadesCheckin as $key => $value) {
   					$asiento = new AsientosOcupados($value->columna, $value->fila);
   					array_push($this->asientosOcupados, $asiento);
   				}
   			}
   			
			return $this;
		}
	}
?>