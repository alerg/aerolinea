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
	</header>
	
	<script src="js/admin.js">
	</script>

	<section data-interactive="contenedor" class="contenedor contenido">
		<h2>Panel de administración</h2>
		
		<!-- LOGIN -->
		<section>
			<h3>Iniciar sesión</h3>
			<fieldset>
				<div class="columna columna--doble">
					<label for="usuario">Usuario:</label>
					<input class="datos" name="usuario" data-interactive="usuario" type="text" />
					
					<label for="clave">Contraseña:</label>
					<input class="datos" name="clave" data-interactive="contrasena" type="password" />
				</div>
				<div class="columna columna--doble">
					<button class="boton" data-interactive="login">Iniciar sesión</button>
				</div>
			</fieldset>
		</section>
		
		<!-- PANEL DE ADMINISTRACIÓN -->
		<section>
			<nav class="nav-secundaria">
				<div class="contenedor">
					<ul>
						<li><a href="">Cerrar sesión</a></li>
					</ul>
				</div>
			</nav>
			
			<!-- INFORME -->
			<section>
				<fieldset>
					<h3>Informe</h3>
					
					<div class="columna columna-simple">
						<button class="boton" data-interactive=''>Imprimir informe</button>
					</div>
				</fieldset>
			</section>
		</section>
	</section>
	
	<footer class="pie">
			<p>&copy;Programación Web II - 2014</p>
	</footer>
</body>

</html>

</html>