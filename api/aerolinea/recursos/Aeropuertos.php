<?php
	Class Recurso_Aeropuertos extends Recurso{
		private $codigo;
		private $ciudad;
		private $provincia;
		private $nombre;

		public function __construct() {
			$this->$codigo = null;
			$this->$ciudad = null;
			$this->$provincia = null;
			$this->$nombre = null;
		}

		public function setCodigo($valor){
			$this->$codigo = $valor;
		}

		public function setCiudad($valor, $descripcion){
			$this->$ciudad = array($valor => $descripcion);
		}

		public function setProvincia($valor, $descripcion){
			$this->$provincia = array($valor => $descripcion);
		}

		public function setNombre($valor, $descripcion){
			$this->$nombre = array($valor => $descripcion);
		}
	}
?>