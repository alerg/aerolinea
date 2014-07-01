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
			$entidadVuelo = new Entidad_Vuelo();
			$entidadVuelo->id_vuelo = $this->entidadPasaje->id_vuelo;
			$entidadVuelo->obtener('id_vuelo');

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

	}
?>