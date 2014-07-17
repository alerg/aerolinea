<?php
	//Representa la tabla recorridos de SQL.
	class Entidad_Aeropuerto extends Entidad{

		public $codigo;
		public $ciudad;
		public $provincia;
		public $nombre;

		public function __construct() {
			//Llama al constructor de Entidad
			parent::__construct('aeropuerto');
			//Se asigna a la variable heredada $nombreTabla el nombre de la tabla SQL
			//Se marca cual es el id de la tabla
		}

		public function obtener(){
			if($this->codigo != null){
				parent::setFiltrarPor(array('codigo' => $this->codigo));
			}
			$entidades = parent::obtenerTodos();
			return $entidades;
		}

		public function setCodigo($valor){
			$this->codigo = $valor;
		}

		public function setCiudad($valor){
			$this->ciudad = $valor;
		}

		public function setProvincia($valor){
			$this->provincia = $valor;
		}

		public function setNombre($valor){
			$this->nombre = $valor;
		}
	}
?>