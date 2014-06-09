<?php
	//Representa la tabla recorridos de SQL.
	Class Entidad_Aeropuesto extends Entidad{

		private $codigo;
		private $ciudad;
		private $provincia;
		private $nombre;

		public function __construct() {
			//Llama al constructor de Entidad
			Entidad::__construct();
			//Se asigna a la variable heredada $nombreTabla el nombre de la tabla SQL
			$this->setNombreTabla('aeropuerto');
			$this->$nombreId = 'codigo';
		}

		public function setCodigo($valor){
			$this->$codigo = $valor;
		}

		public function setCiudad($valor){
			$this->$ciudad = $valor;
		}

		public function setProvincia($valor){
			$this->$ciudad = $valor;
		}

		public function setNombre($valor){
			$this->$nombre = $valor;
		}
	}
?>