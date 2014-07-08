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
			$registros = $this->obtener();
			$retorno = null;
			if(count($registros) > 0){
				$retorno = $this->registroAEntidad($registros[0]);
			}
			return $retorno;
		}

		public function obtenerTodosPor($filtros){
			$filtroArray = array();
			foreach ($filtros as $key => $value){
				$filtroArray[$value] = $this->$value;
			}
			$this->setFiltrarPor($filtroArray);
			$registros = $this->obtener();
			$retorno = array();
			foreach ($registros as $key => $value){
				$vuelo = $this->registroAEntidad($value);
				array_push($retorno, $vuelo);
			}
			return $retorno;
		}
	
		public function descontarAsiento($categoria){
			$campo = 'id_vuelo';
			$vuelo = $this->obtenerPor($campo);
			switch($categoria){
				case 'Primera':
					if($vuelo->asientos_disponibles_primera > 0){
						$vuelo->asientos_disponibles_primera = $vuelo->asientos_disponibles_primera - 1;
					}else{
						return false;
					}
				break;
				case 'Economy':
					if($vuelo->asientos_disponibles_economy > 0){
						$vuelo->asientos_disponibles_economy = $vuelo->asientos_disponibles_economy - 1;
					}else{
						return false;
					}
				break;
			}
			$vuelo->setFiltrarPor(array($campo => $this->$campo));
			$vuelo->modificar();
		}

		private function registroAEntidad($registro){
			$vuelo = new Entidad_Vuelo();
			$vuelo->id_vuelo = $registro['id_vuelo']; 
			$vuelo->fecha = $registro['fecha'];
			$vuelo->asientos_disponibles_primera = $registro['asientos_disponibles_primera'];
			$vuelo->asientos_disponibles_economy = $registro['asientos_disponibles_economy'];
			$vuelo->asientos_exedidos = $registro['asientos_exedidos'];
			$vuelo->id_avion = $registro['id_avion'];
			$vuelo->id_recorrido = $registro['id_recorrido'];

			return $vuelo;
		}

	}
?>