<?php
	abstract class Recurso{
		
		protected function entidadesARecursos($entidades){
			$recursos = array();
			if(count($entidades) > 1){
				for ($i=0; $i < count($entidades); $i++) {
					$recurso = $this->entidadARecurso($entidades[$i]);
					array_push($recursos, $recurso);
				}
			}else{
				if(is_array($entidades)){
					$entidades = $entidades[0];
				}
				$recurso = $this->entidadARecurso($entidades);
				array_push($recursos, $recurso);
			}
			return $recursos;
		}
	}
?>