<?php
	include "/core/Recurso.php";
	include "/entidades/Aeropuerto.php";
	//include "/recursos/Aeropuertos.php";

	class Recurso_Aeropuertos extends Recurso{
		public $codigo = null;
		public $ciudad;
		public $provincia;
		public $nombre;
		private $entidad;

		public function __construct() {
			$this->codigo = null;
			$this->ciudad = null;
			$this->provincia = null;
			$this->nombre = null;
			$this->entidad = new Entidad_Aeropuerto();
		}

		public function setCodigo($valor){
			$this->codigo = $valor;
		}

		public function setCiudad($valor, $descripcion){
			$this->ciudad = array($valor => $descripcion);
		}

		public function setProvincia($valor, $descripcion){
			$this->provincia = array($valor => $descripcion);
		}

		public function setNombre($valor, $descripcion){
			$this->nombre = array($valor => $descripcion);
		}

		public function obtener(){
			$this->entidad->setCodigo($this->codigo);
			$registro = $this->entidad->obtener();
			$this->codigo = $registro[0]['codigo'];
			$this->ciudad = $registro[0]['ciudad'];
			$this->provincia = $registro[0]['provincia'];
			$this->nombre = $registro[0]['nombre'];
			return $this;
		}

		public function obtenerTodos(){
			$registros = $this->entidad->obtener();
			$recursos = array();

			foreach ($registros as $key => $value) {
				//$recurso = array();
				//$recurso[$key] = $value;
				$recurso = new Recurso_Aeropuertos();
				$recurso->codigo = $value['codigo'];
				$recurso->ciudad = $value['ciudad'];
				$recurso->provincia = $value['provincia'];
				$recurso->nombre = $value['nombre'];
				array_push($recursos, $recurso);
			}
			return $recursos;
		}
	}
?>