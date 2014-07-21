<?php

	//$consulta = $_POST['consulta'];

	$consulta = mysql_connect('localhost', 'root', '')  or die('No se pudo conectar: ' . mysql_error());
	echo 'Conectado a la base de datos'."<br>";
			
			mysql_select_db('aerolinea');

			if ($_POST["1"])
			{

				$query = "SELECT COUNT(*) as cant_pasaje_vendidos FROM pasaje";

				$consulta= mysql_query($query);
			
				$nfilas=mysql_num_rows($consulta);

			
				if ($nfilas>0)
				{
					for ($i=0; $i<$nfilas ; $i++)
					{
					$fila=mysql_fetch_array($consulta);
					echo $consulta;
					//echo $fila['nombre']." - ".$fila['apellido']."<br>";	
					}
				}
			}
			
			if ($_POST["2"])
			{

				$query = "select categoria, count(*) as cantidad from pasaje group by categoria";
																		

				$consulta= mysql_query($query);
			
				$nfilas=mysql_num_rows($consulta);

			
				if ($nfilas>0)
				{
					for ($i=0; $i<$nfilas ; $i++)
					{
					$fila=mysql_fetch_array($consulta);
					echo $consulta;
					//echo $fila['nombre']." - ".$fila['apellido']."<br>";	
					}
				}
			}
			
			if ($_POST["3"])
			{

				$query = "select a.ciudad, count(*) as cantidad from pasaje as p join vuelo as v on p.id_vuelo=v.id_vuelo join recorrido as r on v.id_recorrido=r.id_recorrido join aeropuerto as a on a.ciudad=r.id_ciudad_destino
				group by a.ciudad";
																		

				$consulta= mysql_query($query);
			
				$nfilas=mysql_num_rows($consulta);

			
				if ($nfilas>0)
				{
					for ($i=0; $i<$nfilas ; $i++)
					{
					$fila=mysql_fetch_array($consulta);
					echo $consulta;
					//echo $fila['nombre']." - ".$fila['apellido']."<br>";	
					}
				}
			}
			
			if ($_POST["4"])
			{

				$query = "select count(*) as reservas_caidas from pasaje as p join vuelo as v on p.id_vuelo=v.id_vuelo where p.id_estado=0 and v.fecha<DATE(NOW())";
																		

				$consulta= mysql_query($query);
			
				$nfilas=mysql_num_rows($consulta);

			
				if ($nfilas>0)
				{
					for ($i=0; $i<$nfilas ; $i++)
					{
					$fila=mysql_fetch_array($consulta);
					echo $consulta;
					//echo $fila['nombre']." - ".$fila['apellido']."<br>";	
					}
				}
			}

?>