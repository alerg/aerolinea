<?php
include "../core/conexion.php";

	Class Entidad{
		//nombreId: contiene el nombre del identificador. Se usara en la condiciones
		//para obtener la entidad.
		protected $nombreId;
		//Array que posee como key el nombre de los campos de la tabla sql.
		//protected $campos = array();
		//Nombre de la tabla
		private $nombreTabla;
		//Conexion SQL
		private $conexion;

		public function __construct() {
			//creacion de conexion SQL
			$conexion = new ConexionMySQL();
		}

		protected function obtener(){
			//Condicion es un array que espera como key el nombre del campo por el cual
			//se va a obtener la entidad. 
			$campos = $this->obtenerCampos();
			$condicion[$this->$nombreId] = $campos[$this->$nombreId];
			return $this->parse($this->$conexion.obtener($this->$name, $condicion));
		}

		protected function modificar(){
			$campos = $this->obtenerCampos();
			$query = 'UPDATE '. $this->$nombreTabla .' SET ';
			foreach ($campos as $key => $value) {
				$query .= .'`'.$key . '`=`' . $value .'`' 
			}
			$query .= ' WHERE '. $this->$nombreId.'='. $campos[$this->$nombreId];

			return $this->$conexion.modificar($this->$nombreTabla, $campos, array($this->$nombreId => $campos[$this->$nombreId]));
		}

		protected function setNombreTabla($nombreTabla){
			$this->$nombreTabla = $nombreTabla;
		}

		protected function obtenerCampos(){
			$ancestro = get_class_vars('Entidad')
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
	}
?>