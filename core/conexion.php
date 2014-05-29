<?php
	error_reporting(E_ERROR);

	Class ConexionMySQL
	{
		private $conexion = null; 
		
		public function __construct() {
			$conexion = mysql_connect("localhost", "root", "", "prog_web_2");
			mysql_select_db($db);
		}

		public function __destruct()
	    {
	        cerrarConexion();
	    }

	    public function cerrarConexion(){
			if ($conexion) {
				mysql_close($conexion);	
			}
		}

		public function obtener($nombreTabla, $condicion){
			$query = 'SELECT * FROM `' .$nombreTabla .'`';
			if(isset($condicion)){
				$query .= ' WHERE '. key($condicion[0]) .'='. $condicion[0];
				return ejecutarQuery($query);
			}
			return false;
		}

		protected function modificar($tabla, $campos, $condicion){
			$campos = $this->obtenerCampos();
			$query = 'UPDATE '. $tabla .' SET ';
			foreach ($campos as $key => $value) {
				$query .= .'`'.$key . '`=`' . $value .'`' 
			}
			$query .= ' WHERE '. key($condicion[0]) .'='. $condicion[0];
			return ejecutarQuery($query);
		}

	//Metodos privados

		private function ejecutarQuery($query){
			if (count($query) > 0) {
				crearConexion();
				$retorno = mysql_query($query);
				$retorno = mysql_fetch_array($retorno, MYSQL_ASSOC);
				echo $retorno;
				cerrarConexion();
				return $retorno;
			}

			return false;
		}
	}
?>