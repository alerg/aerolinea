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
				document.querySelector('[data-interactive="origen"]').appendChild(option);
			}
		});
	});
jQuery(document).ready(function(){
	jQuery('[data-interactive="origen"]').on('change', function(e){
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
	jQuery('[data-interactive="buscar"]').on('click', function(e){
		var recorrido = new Recorrido();
		recorrido.origen = document.querySelector('[data-interactive="origen"]').options[document.querySelector('[data-interactive="origen"]').selectedIndex].value;
		recorrido.destino = document.querySelector('[data-interactive="destino"]').options[document.querySelector('[data-interactive="destino"]').selectedIndex].value;
		recorrido.obtenerTodos(function(vuelos){
			var menu = jQuery('[data-interactive="vuelos"]');
			for(var index in vuelos){
				var vuelo = vuelos[index];
				var item = document.createElement('menuItem');
				item.setAttribute('label', 'precio primera: '+ vuelo.precioPrimera +' / precio economy: '+ vuelo.precioEconomy +' / vuelo: '+ vuelo.idVuelo +' / fecha: '+ vuelo.fecha +' / Asientos disponibles: '+ vuelo.asientos_disponibles);
				menu.append(item);
			}
		});
	});
});
</script>
<select data-interactive="origen">
	<option value="">Seleccione origen</option>
</select>
<select data-interactive="destino">
	<option value="">Seleccione destino</option>
</select>
<button data-interactive="buscar">Buscar recorrido</button>

<menu data-interactive="vuelos"></menu>
</body>
</html>