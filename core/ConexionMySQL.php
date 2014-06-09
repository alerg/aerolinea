<?php
	error_reporting(E_ERROR);
	class ConexionMySQL
	{
		private $conexion;
		//private $nombreTabla;
		//private $condicion; 
		
		public function __construct() {
			$this->conexion = new mysqli("localhost", "root", "", "aerolinea");
			if($this->conexion->errno)
				echo 'Error al conectar con la base de datos. Nro: ' . $this->conexion->errno .' / '. $this->conexion->error;
		}

		public function __destruct(){
	        $this->cerrarConexion();
	    }

		public function obtener($nombreTabla, $condicion){
			$query = 'SELECT * FROM `' .$nombreTabla .'`';
			if(count($condicion)>0){
				$query .= ' WHERE ';
				foreach ($condicion as $key => $value) {
					$query .= '`'. $key .'`=\''. $value .'\'';
				}
			}
			return $this->ejecutarQuery($query);
		}

		public function modificar($tabla, $campos, $condicion){
			$campos = $this->obtenerCampos();
			$query = 'UPDATE '. $tabla .' SET ';
			foreach ($campos as $key => $value) {
				$query .= '`'.$key . '`=`' . $value .'`';
			}
			$query .= ' WHERE '. key($condicion[0]) .'='. $condicion[0];
			$registro = $this->ejecutarQuery($query);
			return $registro;
		}

	//Metodos privados

	    private function cerrarConexion(){
			if ($this->conexion) {
				$this->conexion->close();
			}
		}

		private function ejecutarQuery($query){
			if (count($query) > 0) {
				$this->conexion->real_query($query);
				$matriz = array(); 
			    /* obtener array asociativo */
			    $retorno = $this->conexion->use_result();
			    while ($fila = $retorno->fetch_assoc()) {
			    	array_push($matriz, $fila);
			    }
			    /* liberar el resultset */
			    $retorno->free();
				/* cerrar la conexión */
				$this->cerrarConexion();
				return $matriz;
			}

			return false;
		}
	}
?>