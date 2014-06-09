<?php
	Class Recurso_Recorridos extends Recorridos{
		private $id;
		private $precioPrimera;
		private $precioEconomy;
		private $ciudadOrigen;
		private $ciudadDestino;

		public function __construct() {
			$this->$id = null;
			$this->$precioPrimera = null;
			$this->$precioEconomy = null;
			$this->$ciudadOrigen = null;
			$this->$ciudadDestino = null;
		}

		public function setId($valor){
			$this->$id = $valor;
		}

		public function setPrecioPrimera($valor, $descripcion){
			$this->$precioPrimera = array($valor => $descripcion);
		}

		public function setPrecioEconomy($valor, $descripcion){
			$this->$precio_economy = array($valor => $descripcion);
		}

		public function setIdCiudadOrigen($valor, $descripcion){
			$this->$id_ciudad_origen = array($valor => $descripcion);
		}

		public function setIdCiudadDestino($valor, $descripcion){
			$this->$id_ciudad_destino = array($valor => $descripcion);
		}
	}
?>