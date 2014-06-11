<?php
	//Representa la tabla recorridos de SQL.
	class Entidad_Vuelo extends Entidad{

		public function __construct() {
			//Llama al constructor de Entidad
			parent::__construct('vuelo');
			//Se asigna a la variable heredada $nombreTabla el nombre de la tabla SQL
			//Se marca cual es el id de la tabla
		}

		public function obtener($id_recorrido){
			parent::setFiltrarPor(array('id_recorrido' => $id_recorrido));
			$registro = parent::obtener();
			return $registro;
		}
	}
?>