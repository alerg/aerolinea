<?php
include "../core/conexion.php";

	Class Entidad{
		//nombreId: contiene el nombre del identificador. Se usara en la condiciones
		//para obtener la entidad.
		protected $nombreId;
		//Array que posee como key el nombre de los campos de la tabla sql.
		protected $campos = array();
		//Nombre de la tabla
		protected $nombreTabla;
		//Conexion SQL
		protected $conexion;

		public function __construct() {
			//creacion de conexion SQL
			$conexion = new ConexionMySQL();
		}

		protected obtener(){
			//Condicion es un array que espera como key el nombre del campo por el cual
			//se va a obtener la entidad. 
			$condicion[$this->$nombreId] = $this->$campos[$this->$nombreId];
			return $this->parse($this->$conexion.obtenerEntidad($this->$name, $condicion));
		}

		protected modificar(){
			$query = 'UPDATE '. $this->$nombreTabla .' SET ';
			foreach ($this->$campos as $key => $value) {
				$query .= .'`'.$key . '`=`' . $value .'`' 
			}
			$query .= ' WHERE '. $this->$nombreId.'='. $this->$campos[$this->$nombreId];
		}
?>