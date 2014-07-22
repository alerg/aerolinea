<!doctype html>
<html lang="es-ar">
<head>
	<title>Aerolineas - Administración</title>
	<meta name="description" content="Sistema de administración de la aerolínea" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="/js/jquery/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="/js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="/js/api.js"></script>
	<link rel="icon" href="img/favicon.png" type="image/png" />
	<link rel="stylesheet" type="text/css" href="css/estilos.css" />
	<link rel="stylesheet" type="text/css" href="/js/jquery/jquery-ui.theme.min.css" />
	<link rel="stylesheet" type="text/css" href="/js/jquery/jquery-ui.structure.min.css" />
</head>

<body>
	<header class="cabecera">
		<div class="contenedor">
			<h1><a href="index.php"><span>Aerolineas</span></a></h1>
		</div>
		<nav class="nav-principal">
			<div class="contenedor">
				<ul>
					<li><a href="/index">Home</a></li>
					<li class="login"><a href="">Administradores</a></li>
				</ul>
			</div>
		</nav>
		<div class="contenedor">
			<nav class="nav-secundaria">
				<ul>
					<li><a href="">Cerrar sesión</a></li>
				</ul>
			</nav>
		</div>
	</header>
	
	<script src="js/admin.js">
	</script>

	<section data-interactive="contenedor" class="contenedor contenido">
		
		<div class="contenedor">
			<h2>Panel de administración</h2>
			<!-- LOGIN -->
			<section>
				<h3>Iniciar sesión</h3>
				<fieldset>
					<div class="columna columna--triple">
						<label for="usuario">Usuario:</label>
						<input name="usuario" data-interactive="usuario" type="text" />
					</div>
					<div class="columna columna--triple">
						<label for="clave">Contraseña:</label>
						<input name="clave" data-interactive="contrasena" type="password" />
					</div>
					<div class="columna columna--triple">
						<button class="boton" data-interactive="login">Iniciar sesión</button>
					</div>
				</fieldset>
			</section>
					
			<!-- INFORME 
			<section>
				<h3>Informe</h3>
				<fieldset>
					<div class="columna columna-simple">
						<button class="boton" data-interactive=''>Ver informe</button>
					</div>
				</fieldset>
				
				<section class="estadisticas">
					
					<div class="estadisticas_barra-completa">
						<?php
						//Obtenemos los datos
						$pasajes_vendidos = 200;
						$pasajes_no_vendidos = 38;
						$pasajes_total = $pasajes_vendidos + $pasajes_no_vendidos;
						
						//Calculamos el porcentaje
						$pasajes_vendidos = floor(($pasajes_vendidos*100)/$pasajes_total);
						$pasajes_no_vendidos = 100 - $pasajes_vendidos;	
						?>
					
						<h4>Pasajes vendidos y no vendidos</h4>
						<div class="estadisticas_grafico">
							<span class="pasajes-vendidos" style="width:<?php echo $pasajes_vendidos ?>%;">
								<?php echo $pasajes_vendidos ?>%
							</span>
							<span class="pasajes-no-vendidos"  style="width:<?php echo $pasajes_no_vendidos ?>%;">
								<?php echo $pasajes_no_vendidos ?>%
							</span>
						</div>
						<div class="estadisticas_referencias">
							<span class="pasajes-vendidos"><span>Vendidos</span></span>
							<span class="pasajes-no-vendidos"><span>No vendidos</span></span>
						</div>
					</div>
					
					<div class="estadisticas_barras-horizontales-columnas">
						<?php
						$destinos = array(  array("destino" => 'Destino "A"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "B"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "C"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "D"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "E"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "F"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "G"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "H"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "I"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "J"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "K"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "L"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "M"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "N"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "O"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "P"',"primary" =>2,"economy" => 3, "no-vendidos" => 1));
						
						
						?>
					
						<h4>Pasajes vendidos por destino y categoría</h4>
						<div class="estadisticas_grafico">
						<?php 
						$destinos_por_columa = floor(count($destinos)/3);
						
						for($j=0; $j<3;$j++){
							echo '<ul>';
							for($i=0; $i<$destinos_por_columa;$i++){
								
								$total_pasajes = $destinos[$i]["economy"] + $destinos[$i]["primary"] + $destinos[$i]["no-vendidos"];
								$primary_porcentaje = floor(($destinos[$i]["primary"]*100)/$total_pasajes);
								$economy_porcentaje = floor(($destinos[$i]["economy"]*100)/$total_pasajes);
								echo '
								<li>
									<strong>'.$destinos[$i]["destino"].'</strong>
									<p>
										<span class="pasajes-primary" style="width:'. $primary_porcentaje.'%;">&nbsp;</span>
										<span class="pasajes-economy" style="width:'. $economy_porcentaje.'%;">&nbsp;</span>
									</p>
								</li>';
								
								if($i==count($destinos)-1){
									break;
								}
							}
							echo '</ul>';
						}
						?>
						</div>
						
						<div class="estadisticas_referencias">
							<span class="categoria-primary">Vendidos</span>
							<span class="categoria-economy">No vendidos</span>
						</div>
					</div>
					
					<div class="estadisticas_barras-horizontales-columnas">
						<?php
						$destinos = array(  array("destino" => 'Destino "A"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "B"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "C"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "D"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "E"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "F"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "G"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "H"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "I"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "J"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "K"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "L"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "M"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "N"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "O"',"primary" =>2,"economy" => 3, "no-vendidos" => 1),
											array("destino" => 'Destino "P"',"primary" =>2,"economy" => 3, "no-vendidos" => 1));
						
						
						?>
					
						<h4>Porcentaje de ocupación de los aviones</h4>
						<div class="estadisticas_grafico">
						<?php 
						$destinos_por_columa = floor(count($destinos)/3);
						
						for($j=0; $j<3;$j++){
							echo '<ul>';
							for($i=0; $i<$destinos_por_columa;$i++){
								
								$total_pasajes = $destinos[$i]["economy"] + $destinos[$i]["primary"] + $destinos[$i]["no-vendidos"];
								$primary_porcentaje = floor(($destinos[$i]["primary"]*100)/$total_pasajes);
								$economy_porcentaje = floor(($destinos[$i]["economy"]*100)/$total_pasajes);
								echo '
								<li>
									<strong>'.$destinos[$i]["destino"].'</strong>
									<p>
										<span class="pasajes-primary" style="width:'. $primary_porcentaje.'%;">&nbsp;</span>
										<span class="pasajes-economy" style="width:'. $economy_porcentaje.'%;">&nbsp;</span>
									</p>
								</li>';
								
								if($i==count($destinos)-1){
									break;
								}
							}
							echo '</ul>';
						}
						?>
						</div>
						
						<div class="estadisticas_referencias">
							<span class="categoria-primary">Vendidos</span>
							<span class="categoria-economy">No vendidos</span>
						</div>
					</div>
					
					<div class="estadisticas_barra-completa">
						<?php
						//Obtenemos los datos
						$reservas_vendidas = 100;
						$reservas_caidas = 58;
						$reservas_no_vendidas = 20;
						$reservas_total = $reservas_vendidas + $reservas_caidas + $reservas_no_vendidas;
						
						//Calculamos el porcentaje
						$reservas_vendidas = floor(($reservas_vendidas*100)/$reservas_total);
						$reservas_caidas = floor(($reservas_caidas*100)/$reservas_total);
						$reservas_no_vendidas = 100 - $reservas_vendidas - $reservas_caidas;	
						?>
					
						<h4>Reservas vendidas, caídas y no vendidas</h4>
						<div class="estadisticas_grafico">
							<span class="reservas-vendidas" style="width:<?php echo $reservas_vendidas ?>%;">
								<?php echo $reservas_vendidas ?>%
							</span>
							<span class="reservas-caidas" style="width:<?php echo $reservas_caidas ?>%;">
								<?php echo $reservas_caidas ?>%
							</span>
							<span class="reservas-no-vendidas"  style="width:<?php echo $reservas_no_vendidas ?>%;">
								<?php echo $reservas_no_vendidas ?>%
							</span>
						</div>
						<div class="estadisticas_referencias">
							<span class="reservas-vendidas"><span>Vendidas</span></span>
							<span class="reservas-caidas"><span>Caidas</span></span>
							<span class="reservas-no-vendidas"><span>No vendidas</span></span>
						</div>
					</div>
				</section>
			</section>-->
		</div>
	</section>
	
	<footer class="pie">
			<p>&copy;Programación Web II - 2014</p>
	</footer>
</body>

</html>

</html>