<?php
class Asiento{
	public $columna;
	public $fila;
	public $categoria;

	function __construct($columna, $fila, $categoria){
		$this->columna = $columna;
		$this->fila = $fila;
		$this->categoria = $categoria;
	}
}
?>