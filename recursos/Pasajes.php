<?php
	include "/entidades/Pasaje.php";
	
	class Recurso_Pasajes{
		public $vuelo;
		public $nombre;
		public $email;
		public $fecha;
		public $dni;
		public $categoria;
		public $id;

		private $entidadPasaje;

		public function __construct() {
			$this->entidadPasaje = new Entidad_Pasaje();
		}

		public function crear(){
			$this->entidadPasaje->id_vuelo = $this->vuelo;
			$this->entidadPasaje->email = $this->email;
			$this->entidadPasaje->nombre = $this->nombre;
			$this->entidadPasaje->fecha_nacimiento = $this->fecha;
			$this->entidadPasaje->dni = $this->dni;
			$this->entidadPasaje->categoria = $this->categoria;

			$this->id = (string)$this->entidadPasaje->crear();
			if($this->id <> null){
				$entidadVuelo = new Entidad_Vuelo();
				$entidadVuelo->id_vuelo = $this->entidadPasaje->id_vuelo;
				$entidadVuelo->descontarAsiento($this->entidadPasaje->categoria);
			}
			return $this;
		}

		public function obtenerPorId($id){
			$entidad = new Entidad_Pasaje();
			$entidad->id_pasaje = $id;
			$entidad->obtenerPor("id_pasaje");

			$entidadVuelo = new Entidad_Vuelo();
			$entidadVuelo->id_vuelo = $entidad->id_vuelo;
			$entidadVuelo->obtenerPor("id_vuelo");
			
			$entidadRecorrido = new Entidad_Recorrido();
			$entidadRecorrido->id_recorrido = $entidadVuelo->id_recorrido;
			$entidadRecorrido->obtenerPor("id_recorrido");

			$recursoAeropuertoOrigen = new Recurso_Aeropuertos();
			$recursoAeropuertoOrigen->codigo = $entidadRecorrido->id_ciudad_origen;
			$this->aeropuertoOrigen = $recursoAeropuertoOrigen->obtenerPorCodigo();
			$recursoAeropuertoDestino = new Recurso_Aeropuertos();
			$recursoAeropuertoDestino->codigo = $entidadRecorrido->id_ciudad_destino;
			$this->aeropuertoDestino = $recursoAeropuertoDestino->obtenerPorCodigo();

			$this->id = $entidad->id_pasaje;
			$this->vuelo = $entidad->id_vuelo;
			$this->email = $entidad->email;
			$this->nombre = $entidad->nombre;
			$this->fecha = $entidad->fecha_nacimiento;
			$this->dni = $entidad->dni;
			$this->categoria = $entidad->categoria;
			$this->estado = $entidad->id_estado;

			return $this;
		}
	}
?>