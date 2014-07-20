jQuery(document).ready(function(){
	$('[data-interactive="departureDate"]' ).datepicker();
	$('[data-interactive="departureDate"]').datepicker('option', 'dateFormat', 'dd/mm/yy');

	$('[data-interactive="birthDate"]').datepicker();
	$('[data-interactive="birthDate"]').datepicker('option', 'dateFormat', 'dd/mm/yy');

	var aeropuertos =[]; 
	Aeropuerto.obtenerTodos(function(data){
		aeropuertos = data;
		jQuery(document).ready(function(){
			for(var index in aeropuertos){
				var option = document.createElement("option");
				option.value = aeropuertos[index].codigo;
				option.textContent = aeropuertos[index].nombre;
				jQuery('[data-interactive="origen"]').append(option);
			}
		});
	});


	jQuery('[data-interactive="origen"]').change(function(e){
		var select = document.querySelector('[data-interactive="destino"]');
		var longitud = select.options.length;
		if(longitud > 1 ){
			for(var index = 1 ; index < longitud ; index++){
				select.removeChild(select.options[1]);
			}
		}
		for(var index in aeropuertos){
			if(aeropuertos[index].codigo != e.target.value){
				var option = document.createElement("option");
				option.value = aeropuertos[index].codigo;
				option.textContent = aeropuertos[index].nombre;
				select.appendChild(option);
			}
		}
	});
	jQuery('[data-interactive="buscar"]').click(function(e){
		var select = jQuery('[data-interactive="vuelos"]');
		jQuery.each( select.children(), function( key, option ) {
			if(option.value!='')
				option.remove();
		});
		var vuelo = new Vuelo();
		var origen = document.querySelector('[data-interactive="origen"]').options[document.querySelector('[data-interactive="origen"]').selectedIndex].value;
		var destino = document.querySelector('[data-interactive="destino"]').options[document.querySelector('[data-interactive="destino"]').selectedIndex].value;
		var fecha = jQuery('[data-interactive="departureDate"]').val();

		vuelo.obtenerTodos(origen, destino, fecha, function(vuelos){
			jQuery.each( vuelos, function( key, vuelo ) {
				var option = document.createElement('option');
				option.textContent = 'Numero: '+ vuelo.id +' / Fecha: '+ vuelo.fecha +' / Asientos disponibles primera: '+ vuelo.asientosDisponiblesPrimera+' / Asientos disponibles Economy: '+ vuelo.asientosDisponiblesEconomica;
				option.setAttribute('value', vuelo.id);
				select.append(option);
				if(vuelo.asientosDisponiblesPrimera > 0 ){
					jQuery('[data-interactive="primera"]').removeClass('hide');
				}
				if(vuelo.asientosDisponiblesEconomica > 0 ){
					jQuery('[data-interactive="economy"]').removeClass('hide');
				}
				jQuery('[data-interactive="primera"]').removeClass('hide');
				jQuery('[data-interactive="economy"]').removeClass('hide');
			});

			jQuery('[data-interactive="fieldVuelos"]').removeClass('hide');
			jQuery('[data-interactive="recorrido"]').addClass('hide');
		});
	});

	jQuery('[data-interactive="reservar"]').click(function(e){
		jQuery('[data-interactive="fieldDatosPersonales"]').removeClass('hide');
		jQuery('[data-interactive="fieldVuelos"]').addClass('hide');
	});

	jQuery('[data-interactive="confirmar"]').click(function(e){
		e.preventDefault();
		var vuelo = jQuery('[data-interactive="vuelos"] option:selected').val();
		var nombre = jQuery('[data-interactive="nombre"]').val();
		var email = jQuery('[data-interactive="email"]').val();
		var fecha = jQuery('[data-interactive="birthDate"]').val();
		var dni = jQuery('[data-interactive="dni"]').val();
		var categoria = jQuery('[name="categoria"]:checked').val()

		var reserva = new Reserva(vuelo, nombre, email, fecha, dni, categoria);

		reserva.crear(function(){
			sessionStorage.setItem("reserva",reserva.id);
			console.log('Reserva numero: ' + reserva.id);
			if(reserva.id =! null){
				//jQuery('[data-interactive="reserva"]').addClass('hide');
				jQuery('[data-interactive="fieldDatosPersonales"]').addClass('hide');
				jQuery('[data-interactive="contenedor"]').attr('data-mode', 'step2');
				jQuery('[data-interactive="pago"]').removeClass('hide');

				//jQuery('[data-interactive="pago"]').removeClass('hide');
				
				//Cambié ".value" por ".innerText" porque cambié los <input/> por <span>
				jQuery('[data-interactive="datosReserva"]').innerText(reserva.id);
				jQuery('[data-interactive="datosEmail"]').innerText(reserva.email);
				jQuery('[data-interactive="datosNombre"]').innerText(reserva.nombre);
				jQuery('[data-interactive="datosCategoria"]').innerText(reserva.categoria);
				jQuery('[data-interactive="datosVuelo"]').innerText(reserva.vuelo);
				jQuery('[data-interactive="datosDni"]').innerText(reserva.dni);
				jQuery('[data-interactive="datosFecha"]').innerText(reserva.fecha);

			}
		});
 	});

 	jQuery('[data-interactive="pagar"]').click(function(e){
 		e.preventDefault();
 		var reservaId = sessionStorage.getItem("reserva");
 		var formaPagoId = jQuery('[data-interactive="formas_pago"]').val();
 		if( formaPagoId == "1" && reservaId != null){
			var pago = new Pago(reservaId, formaPagoId);

			pago.crear(function(pago){
				if(pago){
					jQuery('[data-interactive="asiento"]').removeClass('hide');
					jQuery('[data-interactive="pago"]').addClass('hide');
				}else{
					console.log('Error al pagar');
				}
			});
 		}
 	});

	jQuery('[data-interactive="contenedor"]').attr('data-mode', 'step1');
	//document.querySelector('[data-interactive="contenedor"]').setAttribute('data-mode', 'step1');
});