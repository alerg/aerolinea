<!doctype html>
<html lang="es-ar">
<head>
	<title>Aerolineas - Administración</title>
	<meta name="description" content="Sistema de administración de la aerolínea" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="/js/api.js"></script>
	<script type="text/javascript" src="/js/jquery/jquery-1.10.2.js"></script>
	<link rel="icon" href="img/favicon.png" type="image/png" />
	<link rel="stylesheet" type="text/css" href="css/estilos.css" />
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
					
			<!-- INFORME -->
			<section>
				<h3>Informe</h3>
				<fieldset>
					<div class="columna columna-simple">
						<button class="boton" data-interactive=''>Ver informe</button>
					</div>
				</fieldset>
				
				<div class="estadisticas">
					<div class="estadisticas_barra-completa">
						<h3>Pasajes vendidos y no vendidos
						<div class="estadisticas_grafico">
							<span class="pasajes-vendidos">%</span>
							<span class="pasajes-no-vendidos">%</span>
						</div>
						<div class="estadisticas_referencias">
							<span class="pasajes-vendidos">Vendidos</span>
							<span class="pasajes-no-vendidos">No vendidos</span>
						</div>
					</div>
					
					<div class="estadisticas_barras-horizontales-columnas">
						<h3>Pasajes vendidos y no vendidos
						
						<div class="estadisticas_grafico">
							<ul>
								<li>
									<strong>Destino 'A'</strong>
									<span class="pasajes-vendidos">Vendidos</span>
									<span class="pasajes-no-vendidos">No vendidos</span>
								</li>
							</ul>
						</div>
						
						<div class="estadisticas_referencias">
							<span class="categoria-primary">Vendidos</span>
							<span class="categoria-economy">No vendidos</span>
						</div>
					</div>
					
					<div class="estadisticas_barras-horizontales-columnas">
						<h3>Porcentaje de ocupación de los aviones
						<div class="estadisticas_grafico">
							<h4>Avión 'ABC'</h4>
							<ul>
								<li>
									<strong>Destino 'A'</strong>
									<span class="pasajes-vendidos">Vendidos</span>
									<span class="pasajes-no-vendidos">No vendidos</span>
								</li>
							</ul>
						</div>
						
						<div class="estadisticas_referencias">
							<span class="categoria-primary">Vendidos</span>
							<span class="categoria-economy">No vendidos</span>
						</div>
					</div>
					
					<div class="estadisticas_barra-completa">
						<h3>Reservas vendidas, caidas y no vendidas
						<div class="estadisticas_grafico">
							<span class="pasajes-vendidos">%</span>
							<span class="pasajes-no-vendidos">%</span>
						</div>
						<div class="estadisticas_referencias">
							<span class="pasajes-vendidos">Vendidos</span>
							<span class="pasajes-no-vendidos">No vendidos</span>
						</div>
					</div>
				</div>
			</section>
		</div>
	</section>
	
	<footer class="pie">
			<p>&copy;Programación Web II - 2014</p>
	</footer>
</body>

</html>

</html>