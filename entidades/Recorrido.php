<?php
	//Representa la tabla recorridos de SQL.
	class Entidad_Recorrido extends Entidad{

		private $id_recorrido;
		private $precio_primera;
		private $precio_economy;
		private $id_ciudad_origen;
		private $id_ciudad_destino;

		public function __construct() {
			//Llama al constructor de Entidad
			parent::__construct('recorrido');
			//Se asigna a la variable heredada $nombreTabla el nombre de la tabla SQL
			//Se marca cual es el id de la tabla
		}

		public function obtener(){
			if($this->id_ciudad_origen != null && $this->id_ciudad_destino != null){
				parent::setFiltrarPor(array('id_ciudad_origen' => $this->id_ciudad_origen,'id_ciudad_destino' => $this->id_ciudad_destino));
			}
			$registros = parent::obtener();
			return $registros;
		}

		public function setOrigen($valor){
			$this->id_ciudad_origen = $valor;
		}

		public function setDestino($valor){
			$this->id_ciudad_destino = $valor;
		}
	}
?>