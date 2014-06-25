<?php
	//Representa la tabla recorridos de SQL.
	class Entidad_Pasaje extends Entidad{

		public $dni;
		public $nombre;
		public $fecha_nacimiento;
		public $email;
		public $id_vuelo;
		public $id_estado;
		public $categoria;

		public function __construct() {
			//Llama al constructor de Entidad
			parent::__construct('pasaje');
			$this->id_estado = 0;
			//Se asigna a la variable heredada $nombreTabla el nombre de la tabla SQL
			//Se marca cual es el id de la tabla
		}

		public function crear(){
			$id = parent::crear();
			return $id;
		}
	}
?>