<?php
	//Representa la tabla recorridos de SQL.
	class Entidad_Vuelo extends Entidad{

		public $id_vuelo;
		public $fecha;
		public $asientos_disponibles_primera;
		public $asientos_disponibles_economy;
		public $asientos_exedidos;
		public $id_avion;
		public $id_recorrido;

		public function __construct() {
			//Llama al constructor de Entidad
			parent::__construct('vuelo');
			//Se asigna a la variable heredada $nombreTabla el nombre de la tabla SQL
			//Se marca cual es el id de la tabla
		}

		public function obtenerPor($nombreCampo){
			if($nombreCampo != null)
				$this->setFiltrarPor(array($nombreCampo => $this->$nombreCampo));
			$this->obtener();
		}

		public function obtenerTodosPor($filtros){
			$filtroArray = array();
			foreach ($filtros as $key => $value){
				$filtroArray[$value] = $this->$value;
			}
			$this->setFiltrarPor($filtroArray);
			$entidades = $this->obtener();
			return $entidades;
		}
	
		public function descontarAsiento($categoria){
			$campo = 'id_vuelo';
			$this->obtenerPor($campo);
			switch($categoria){
				case 'Primera':
					if($this->asientos_disponibles_primera > 0){
						$this->asientos_disponibles_primera = $this->asientos_disponibles_primera - 1;
					}else{
						return false;
					}
				break;
				case 'Economy':
					if($this->asientos_disponibles_economy > 0){
						$this->asientos_disponibles_economy = $this->asientos_disponibles_economy - 1;
					}else{
						return false;
					}
				break;
			}
			$this->setFiltrarPor(array($campo => $this->$campo));
			$this->modificar();
		}
	}
?>