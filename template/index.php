<!doctype html>
<html lang="es-ar">
<head>
	<title>Aerolineas</title>
	<meta name="description" content="" />
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
					<li><a href="">Reservas</a></li>
					<li><a href="">Vuelos</a></li>
					<li class="login"><a href="">Administradores</a></li>
				</ul>
			</div>
		</nav>
	</header>
	
<script src="js/index.js">
	//var aeropuerto = new Aeropuerto();
	/*
	aeropuerto.obtener(function(aeropuerto){
		console.log(aeropuerto.codigo);
	});
	*/

</script>
<section data-interactive="contenedor" class="contenedor contenido">
	<section class="datos">
		<fieldset>
			<h2>Datos de reserva</h2>
			<div class="columna columna--doble">
				<label for="reserva">Reserva nro:</label>
				<input name="reserva" class="datos" data-interactive="datosReserva" type="text" disabled />
				<label for="nombre">Nombre y Apellido:</label>
				<input name="nombre" class="datos" data-interactive="datosNombre" type="text" disabled />
				<label for="destino">Destino:</label>
				<input name="destino" data-interactive="datosDestino" type="text" disabled />
			</div>
			<div class="columna columna--doble">
				<label for="fecha">Fecha:</label>
				<input name="fecha" class="datos" data-interactive="datosFecha" type="text" disabled />
				<label for="categoria">Categoria:</label>
				<input name="categoria" class="datos" data-interactive="datosCategoria" type="text" disabled />
				<label for="origen">Origen:</label>
				<input name="origen" data-interactive="datosOrigen" type="text" disabled />
			</div>
		</fieldset>
	</section>
	<section class="buscar">		
		<fieldset>
			<div class="columna columna--doble">
				<label for="codigo_reserva">Código de reserva:</label>
				<input name="codigo_reserva" data-interactive='codigoReserva' type="text">
				<button class="boton" data-interactive='buscarReserva'>Buscar</button>
			</div>
			<div class="columna columna--doble">
			<div class="columna columna--doble">
				<button class="boton grande" data-interactive="comenzar">Consulta de vuelos</button>
			</div>
			<!-- Nuevo data-interactive -->
		</fieldset>
	</section>	
	<section data-interactive="reserva" class="reserva">
		<h2>Reservas</h2>
		<h3>Paso1:</h3>
		<fieldset data-interactive="recorrido">
			<div class="columna columna--doble">
				<label for="origen">Origen:</label>
				<select id="origen" name="origen" data-interactive="origen">
					<option value="" selected disabled>Seleccione origen</option>
				</select>
			</div>
			
			<div class="columna columna--doble">
				<label for="destino">Destino:</label>
				<select id="destino" name="destino" data-interactive="destino">
					<option value="" selected disabled>Seleccione destino</option>
				</select>
			</div>
			<div class="columna columna--doble">
				<label for="departureDate">Fecha partida:</label>
				<input type="text" id="departureDate" data-interactive="departureDate"/>
			</div>
			<div class="columna columna--doble">
				<button class="boton" data-interactive='buscar'>Buscar</button>
			</div>
		</fieldset>
		
		<fieldset class="hide" data-interactive="fieldVuelos">
			<div class="columna columna">
				<label for="vuelos">Vuelos:</label>
				<select id="vuelos" name="vuelos" data-interactive="vuelos">
					<option value='' selected disabled>Seleccione uno</option>
				</select>
			</div>
			<div class="columna columna--doble">
				<label for="primera">Primera:</label>
				<input type="radio" id="categoria" name="categoria" value="Primera" class="hide" data-interactive="primera"/>
				<label for="economy">Economica:</label>
				<input type="radio" id="categoria" name="categoria" value="Economy" class="hide" data-interactive="economy"/>
			</div>
			<div class="columna columna--doble">
				<button class="boton" data-interactive='reservar'>Reservar</button>
			</div>
		</fieldset>
		
		<fieldset class="hide" data-interactive="fieldDatosPersonales">
			<h3>Para poder realizar la reserva necesitamos los siguientes datos:</h3>		
			<fieldset>
				<div class="columna columna--doble">
					<label for="nombre">Nombre y Apellido:</label>
					<input name="nombre" data-interactive="nombre" type="text">
					
					<label for="apellido">DNI:</label>
					<input name="apellido" data-interactive="dni" type="text">
				</div>
				<div class="columna columna--doble">
					<label for="email">E-mail:</label>
					<input name="email" data-interactive="email" type="email" >

					<label for="fecha">Fecha de nacimiento:</label>
					<input name="fecha" data-interactive="birthDate" type="fecha" >
				</div>
				<div class="columna columna--doble">
					<button class="boton" data-interactive='confirmar'>Confirmar reserva</button>
				</div>
			</fieldset>
		</fieldset>
		
		<!-- ¿Y todo... -->
		
	</section>
	<!-- ...esto? ¿Para qué es? ¿Para mostrar datos?-->
	
	<section class="pago">
		<h2>Pagos</h2>
		<h3>Paso 2:</h3>
		<form data-interactive="formPagar">
			<fieldset data-interactive="pago">	
				<div class="columna columna--doble">
					<label for="formas_pago">Formas de pago:</label>
					<select id="formas_pago" name="formas_pago" data-interactive="formas_pago">
						<option value='' selected disabled>Seleccione uno</option>
						<option value="1">Tarjeta</option>
						<option value="2">Pago Fácil</option>
					</select>
					<!-- Nuevo data-interactive -->
				</div>
				<!-- ¿Esto ya no va a ir?
				<div class="columna hide" data-interactive="datosTarjeta">
						<label for="nro_tarjeta">Número:</label>
						<input id="nro_tarjeta" name="nro_tarjeta" data-interactive="nro_tarjeta" type="text"/>
						
						<label for="cod_tarjeta">Código:</label>
						<input id="cod_tarjeta" name="cod_tarjeta" type="text"/>
						
						<label for="vto_tarjeta">Vencimiento:</label>
						<input id="vto_tarjeta" name="vto_tarjeta" type="date"/>
						
						<label for="nom_tarjeta">Nombre y apellido:</label>
						<input id="nom_tarjeta" name="nom_tarjeta" type="text"/>
					</div>-->
				
				<div class="columna columna--doble">
					<button class="boton" type="submit" data-interactive='pagar'>Pagar</button>
					<!-- Nuevo data-interactive -->
				</div>
			</fieldset>
		</form>
	</section>
	
	<section class="asiento hide" data-interactive="asiento">	
			<h2>Check-in</h2>
			<h3>Paso3:</h3>
			<form>
			<fieldset class="asientos" data-interactive="asientosMapa">
			</fieldset>
			
			<input class="boton" type="submit" name="enviar" value="Enviar">
		</form>
	</section>
		<!-- Si no lo usamos se puede borrar
		<section class="hide">	
			<div class="progreso">
				<span class="paso">1</span><span class="separador"></span>
				<span class="paso">2</span><span class="separador"></span>
				<span class="paso">3</span>
			</div>
		</section>-->
	</section>

	<footer class="pie">
			<p>&copy;Programación Web II - 2014</p>
	</footer>
</body>

</html>