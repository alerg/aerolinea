<?php
include "/core/ConexionMySQL.php";

	class Entidad{
		//filtrarPor: contiene el nombre del identificador. Se usara en la condiciones
		//para obtener la entidad.
		private $filtrarPor = array();
		
		public function setFiltrarPor($valor){
			foreach ($valor as $key => $value) {
			}
			$this->filtrarPor = $valor;
		} 
		//Array que posee como key el nombre de los campos de la tabla sql.
		//protected $campos = array();
		//Nombre de la tabla
		private $nombreTabla;
		//Conexion SQL
		private $conexion;

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

		protected function modificar(){
			$campos = $this->obtenerCampos();
			$query = 'UPDATE '. $this->nombreTabla .' SET ';
			foreach ($campos as $key => $value) {
				$query .= '`'.$key . '`=`' . $value .'`';
			}
			if($this->filtrarPor != null)
				$query .= ' WHERE `';
			$and = false;
			foreach ($this->filtrarPor as $key => $value) {
				
			}
			
			return $this->conexion->modificar($this->nombreTabla, $campos, array($this->filtrarPor => $campos[$this->filtrarPor]));
		}

		protected function obtenerCampos(){
			$ancestro = get_class_vars('Entidad');
			if(get_called_class() != 'Entidad'){
		        $hijo = get_class_vars(get_class($this));  
		        $atributos = array();
		        foreach ($hijo as $key => $value) {
		            if (!in_array($key, $parent_vars)) {
		                $atributos[$key] = $value;
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