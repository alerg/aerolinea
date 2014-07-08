<?php
	class Recurso_Pagos{
		public $idPasaje;
		public $formaPago;
		public $precio;
		public $fecha;

		private $entidad;

		public function __construct() {
			$this->idPasaje = null;
			$this->formaPago = null;
			$this->precio = null;
			$this->fecha = null;
		}

		public function crear($id_pasaje, $forma_pago, $precio, $fecha){
			$entidad = new Entidad_Pago();
			$this->id_pasaje = $id_pasaje;
			$this->forma_pago = $forma_pago;
			$this->precio = $precio;
			$this->fecha = $fecha;	
			$this->entidadPasaje->crear();
		}
	}
?>