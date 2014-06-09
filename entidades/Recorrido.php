<?php
	//Representa la tabla recorridos de SQL.
	Class Entidad_Recorrido extends Entidad{

		private $id_recorrido;
		private $precio_primera;
		private $precio_economy;
		private $id_ciudad_origen;
		private $id_ciudad_destino;

		public function __construct() {
			//Llama al constructor de Entidad
			Entidad::__construct();
			//Se asigna a la variable heredada $nombreTabla el nombre de la tabla SQL
			$this->setNombreTabla('recorrido');
			$this->$nombreId = 'id_recorrido';
		}

		public function setId($valor){
			$this->$id_recorrido = $valor;
		}

		public function setPrecioPrimera($valor){
			$this->$precio_primera = $valor;
		}

		public function setPrecioEconomy($valor){
			$this->$precio_economy = $valor;
		}

		public function setIdCiudadOrigen($valor){
			$this->$id_ciudad_origen = $valor;
		}

		public function setIdCiudadDestino($valor){
			$this->$id_ciudad_destino = $valor;
		}
	}
?>