<html>
<head>
	
	<script type="text/javascript" src="/js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="/js/jquery-ui-1.10.4.custom.min.js"></script>
	<script type="text/javascript" src="/js/api.js"></script>
</head>
<body>
<script>
	var aeropuerto = new Aeropuerto('SAVR');
	/*
	aeropuerto.obtener(function(aeropuerto){
		console.log(aeropuerto.codigo);
	});
	*/
	aeropuerto.obtenerTodos(function(aeropuertos){
		jQuery(document).ready(function(){
			for(var index in aeropuertos){
				var option = document.createElement("option");
				option.value = aeropuertos[index].codigo;
				option.textContent = aeropuertos[index].nombre;
				document.querySelector('[data-interactive="origen"]').appendChild(option);
			}
		});
	});
</script>
<select data-interactive="origen">
	<option value="">Seleccione un Destino</option>
</select>
</body>
</html>