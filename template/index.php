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
					<li><a href="">Pagos</a></li>
					<li><a href="">Check-In</a></li>
					<li class="login"><a href="">Log-In</a></li>
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
		<fieldset class="hide" data-interactive="datosReserva">
			<h2>Datos de reserva</h2>
			<div class="columna columna--doble">
				<label for="reserva">Reserva nro:</label>
				<input name="reserva" data-interactive="datosReserva" type="text" disabled />
				<label for="nombre">Nombre y Apellido:</label>
				<input name="nombre" data-interactive="datosNombre" type="text" disabled />
				<label for="email">Email:</label>
				<input name="email" data-interactive="datosEmail" type="text" disabled />
				<label for="fecha">Fecha:</label>
				<input name="fecha" data-interactive="datosFecha" type="text" disabled />
				<label for="dni">Dni:</label>
				<input name="dni" data-interactive="datosDni" type="text" disabled />
				<label for="categoria">Categoria:</label>
				<input name="categoria" data-interactive="datosCategoria" type="text" disabled />
				<label for="categoria">Vuelo:</label>
				<input name="vuelo" data-interactive="datosVuelo" type="text" disabled />
			</div>
		</fieldset>
	</section>
	<!-- ...esto? ¿Para qué es? ¿Para mostrar datos?-->
	
	<section class="pago">
		<h2>Pagos</h2>
		<h3>Paso 2:</h3>
		<form data-interactive="formPagar">
			<fieldset data-interactive="buscarReserva" class="hide">
				<div class="columna">
					<label for="codigo_reserva">Código de reserva:</label>
					<input name="codigo_reserva" type="text">
				</div>
				<button class="boton" data-interactive='buscar_pago'>Buscar</button>
				<!-- Nuevo data-interactive -->
			</fieldset>
			
			<fieldset class="hide" data-interactive="pago">	
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
			<h3>Paso2:</h3>
			<form>
			<fieldset class="asientos">
				<div class="columna ejecutiva">
					<input id="A1" type="radio" name="asiento" value="A1" />
					<label for="A1">A1</label>
					<input id="A2" type="radio" name="asiento" value="A2" />
					<label for="A2">A2</label>
					<input id="A3" type="radio" name="asiento" value="A3" />
					<label for="A3">A3</label>
					<input disabled="disabled" id="A4" type="radio" name="asiento" value="A4" />
					<label class="ocupado" for="A4">A4</label>
					<input id="A5" type="radio" name="asiento" value="A5" />
					<label for="A5">A5</label>
					<input id="A6" type="radio" name="asiento" value="A6" />
					<label for="A6">A6</label>
					<input id="A7" type="radio" name="asiento" value="A7" />
					<label for="A7">A7</label>
					<input id="A8" type="radio" name="asiento" value="A8" />
					<label for="A8">A8</label>
					<input id="A9" type="radio" name="asiento" value="A9" />
					<label for="A9">A9</label>
					<input id="A10" type="radio" name="asiento" value="A10" />
					<label for="A10">A10</label>
				</div>
				
				<div class="columna ejecutiva">
					<input id="B1" type="radio" name="asiento" value="B1" />
					<label for="B1">B1</label>
					<input id="B2" type="radio" name="asiento" value="B2" />
					<label for="B2">B2</label>
					<input id="B3" type="radio" name="asiento" value="B3" />
					<label for="B3">B3</label>
					<input id="B4" type="radio" name="asiento" value="B4" />
					<label for="B4">B4</label>
					<input id="B5" type="radio" name="asiento" value="B5" />
					<label for="B5">B5</label>
					<input id="B6" type="radio" name="asiento" value="B6" />
					<label for="B6">B6</label>
					<input id="B7" type="radio" name="asiento" value="B7" />
					<label for="B7">B7</label>
					<input id="B8" type="radio" name="asiento" value="B8" />
					<label for="B8">B8</label>
					<input id="B9" type="radio" name="asiento" value="B9" />
					<label for="B9">B9</label>
					<input id="B10" type="radio" name="asiento" value="B10" />
					<label for="B10">B10</label>
				</div>
				
				<div class="columna economica">
					<input id="C1" type="radio" name="asiento" value="C1" />
					<label for="C1">C1</label>
					<input id="C2" type="radio" name="asiento" value="C2" />
					<label for="C2">C2</label>
					<input disabled="disabled" id="C3" type="radio" name="asiento" value="C3" />
					<label class="ocupado" for="C3">C3</label>
					<input id="C4" type="radio" name="asiento" value="C4" />
					<label for="C4">C4</label>
					<input id="C5" type="radio" name="asiento" value="C5" />
					<label for="C5">C5</label>
					<input id="C6" type="radio" name="asiento" value="C6" />
					<label for="C6">C6</label>
					<input id="C7" type="radio" name="asiento" value="C7" />
					<label for="C7">C7</label>
					<input id="C8" type="radio" name="asiento" value="C8" />
					<label for="C8">C8</label>
					<input id="C9" type="radio" name="asiento" value="C9" />
					<label for="C9">C9</label>
					<input id="C10" type="radio" name="asiento" value="C10" />
					<label for="C10">C10</label>
				</div>
				
				<div class="columna economica">
					<input id="D1" type="radio" name="asiento" value="D1" />
					<label for="D1">D1</label>
					<input id="D2" type="radio" name="asiento" value="D2" />
					<label for="D2">D2</label>
					<input id="D3" type="radio" name="asiento" value="D3" />
					<label for="D3">D3</label>
					<input id="D4" type="radio" name="asiento" value="D4" />
					<label for="D4">D4</label>
					<input id="D5" type="radio" name="asiento" value="D5" />
					<label for="D5">D5</label>
					<input id="D6" type="radio" name="asiento" value="D6" />
					<label for="D6">D6</label>
					<input id="D7" type="radio" name="asiento" value="D7" />
					<label for="D7">D7</label>
					<input id="D8" type="radio" name="asiento" value="D8" />
					<label for="D8">D8</label>
					<input disabled="disabled" id="D9" type="radio" name="asiento" value="D9" />
					<label class="ocupado" for="D9">D9</label>
					<input id="D10" type="radio" name="asiento" value="D10" />
					<label for="D10">D10</label>
				</div>
				
				<div class="columna economica">
					<input id="E1" type="radio" name="asiento" value="E1" />
					<label for="E1">E1</label>
					<input id="E2" type="radio" name="asiento" value="E2" />
					<label for="E2">E2</label>
					<input id="E3" type="radio" name="asiento" value="E3" />
					<label for="E3">E3</label>
					<input id="E4" type="radio" name="asiento" value="E4" />
					<label for="E4">E4</label>
					<input id="E5" type="radio" name="asiento" value="E5" />
					<label for="E5">E5</label>
					<input id="E6" type="radio" name="asiento" value="E6" />
					<label for="E6">E6</label>
					<input id="E7" type="radio" name="asiento" value="E7" />
					<label for="E7">E7</label>
					<input id="E8" type="radio" name="asiento" value="E8" />
					<label for="E8">E8</label>
					<input id="E9" type="radio" name="asiento" value="E9" />
					<label for="E9">E9</label>
					<input id="E10" type="radio" name="asiento" value="E10" />
					<label for="E10">E10</label>
				</div>
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