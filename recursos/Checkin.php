<?php
	//Representa la tabla recorridos de SQL.
	class Recurso_Checkin extends Recurso{

		public $pasaje;
		public $columna;
		public $fila;
		public $fecha;

		public function __construct() {
			//Llama al constructor de Entidad
			parent::__construct('check_in');
			//Se asigna a la variable heredada $nombreTabla el nombre de la tabla SQL
			//Se marca cual es el id de la tabla
		}

		public function obtenerPorId(){
			if($nombreCampo != null)
				$this->setFiltrarPor(array('pasaje' => $this->pasaje));
			$this->obtener();
		}
	}
?>