<?php
	//Representa la tabla recorridos de SQL.
	Class Entidad_Recorrido extends Entidad{
		public function __construct() {
			//Llama al constructor de Entidad
			Entidad::__construct();
			//Se asigna a la variable heredada $nombreTabla el nombre de la tabla SQL
			$this->$nombreTabla = 'recorrido';
			$this->$nombreId = 'id_recorrido';
			$this->$campos = array(
				'id_recorrido'=> null, 
				'precio_primera'=> null,
				'precio_economy'=> null,
				'id_ciudad_origen'=> null,
				'id_ciudad_destino'=> null,
			);
		}
	}
?>