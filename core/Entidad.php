<?php
include "/core/ConexionMySQL.php";

	class Entidad{
		//filtrarPor: contiene el nombre del identificador. Se usara en la condiciones
		//para obtener la entidad.
		public $filtrarPor = array();
		
		//Array que posee como key el nombre de los campos de la tabla sql.
		//protected $campos = array();
		//Nombre de la tabla
		public $nombreTabla;
		//Conexion SQL
		public $conexion;

		public function setFiltrarPor($valor){
			foreach ($valor as $key => $value) {
			}
			$this->filtrarPor = $valor;
		} 

		public function __construct($tabla) {
			//creacion de conexion SQL
			$this->conexion = new ConexionMySQL();
			$this->nombreTabla = $tabla;
		}

		protected function obtener(){
			//Condicion es un array que espera como key el nombre del campo por el cual
			//se va a obtener la entidad.
			$registros = $this->conexion->obtener($this->nombreTabla, $this->filtrarPor);
			return $registros;
		}

		protected function obtenerTodos(){
			//Condicion es un array que espera como key el nombre del campo por el cual
			//se va a obtener la entidad.
			return $this->conexion->obtener($this->nombreTabla);
		}

		protected function crear(){
			return $this->conexion->crear($this->nombreTabla, $this->obtenerCampos());	
		}

		private function obtenerCampos(){
			$ancestro = get_class_vars('Entidad');
			if(get_called_class() != 'Entidad'){
		        $hijo = get_class_vars(get_class($this));  
		        $atributos = array();
		        foreach ($hijo as $keyHijo => $valueHijo) {
		        	$exists = false;
		        	foreach ($ancestro as $ancestroKey => $ancestroValue) {
		            	if ($keyHijo == $ancestroKey) {
		        			$exists = true;
			            }
					}
					if(!$exists){
						$atributos[$keyHijo] = $this->$keyHijo;
		        	}
		        }
				return $atributos;
	    	}else{
    			return $ancestro;
	    	}
		}

		//protected function setNombreTabla($nombreTabla){
		//	$this->nombreTabla = $nombreTabla;
		//}

		//public function filtrarPor($key, $value){
		//	$this->filtrarPor[$key] = $value;
		//}
	}
?>