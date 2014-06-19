<html>
<head>
	
	<script type="text/javascript" src="/js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="/js/jquery-ui-1.10.4.custom.min.js"></script>
	<script type="text/javascript" src="/js/api.js"></script>
</head>
<body>
<script>
	//var aeropuerto = new Aeropuerto();
	/*
	aeropuerto.obtener(function(aeropuerto){
		console.log(aeropuerto.codigo);
	});
	*/
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
jQuery(document).ready(function(){
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
	jQuery('[data-interactive="destino"]').change(function(e){
		var select = jQuery('[data-interactive="vuelos"]');
		jQuery.each( select.children(), function( key, option ) {
			if(option.value!='')
				option.remove();
		});
		var vuelo = new Vuelo();
		var origen = document.querySelector('[data-interactive="origen"]').options[document.querySelector('[data-interactive="origen"]').selectedIndex].value;
		var destino = document.querySelector('[data-interactive="destino"]').options[document.querySelector('[data-interactive="destino"]').selectedIndex].value;
		vuelo.obtenerTodosPor(origen, destino, function(vuelos){
			jQuery.each( vuelos, function( key, vuelo ) {
				var option = document.createElement('option');
				option.textContent = 'precio primera: '+ vuelo.precioPrimera +' / precio economy: '+ vuelo.precioEconomy +' / fecha: '+ vuelo.fecha +' / Asientos disponibles: '+ vuelo.asientos_disponibles;
				option.setAttribute('value', vuelo.idVuelo);
				select.append(option);
			});
		});
	});

	jQuery('[data-interactive="reservar"]').click(function(e){
		var vuelo = jQuery('[data-interactive="vuelos"]').val();
		if(vuelo == ''){
			console.log('No se selecciono vuelo');
			return;
		}

		
	});
});
</script>
<select data-interactive="origen">
	<option value="">Seleccione origen</option>
</select>
<select data-interactive="destino">
	<option value="">Seleccione destino</option>
</select>
<br/>
<select data-interactive="vuelos">
<option value=''>Seleccione uno</option>
</select>
<button data-interactive='reservar'>Reservar</button>
</body>
</html>