<?php
	abstract class Recurso{
		protected $atributos;

		function __construct(){
			$this->$atributos = array();
		}
	}
?>