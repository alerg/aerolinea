<?php
	include "/entidades/Pasaje.php";
	
	class Recurso_Reservas{
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

			$this->id = $this->entidadPasaje->crear();
		}

	}
?>