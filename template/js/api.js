//Necesita CORE
var Aeropuerto = function (codigo){
	this.codigo = codigo;
	this.ciudad = null;
	this.provincia = null;
	this.nombre = null;
}

Aeropuerto.prototype = {
	obtener : function(cb){
		var that = this;
		jQuery.get('/api/aeropuertos/' + this.codigo, {}, function(data){
			jQuery.extend(that, data);
			if(cb)
				cb(that);
		});
	}
}

Aeropuerto.obtenerTodos = function(cb){
	var that = this;
	jQuery.get('/api/aeropuertos/obtenerTodos', {}, function(data){
		var retorno = [];
		for (var index in data) {
			var aeropuerto = new Aeropuerto();
			jQuery.extend(aeropuerto, data[index]);
			retorno.push(aeropuerto);
		}
		cb(retorno);
	});
}

//Necesita CORE
var Vuelo = function (){}

Vuelo.prototype = {
	obtenerTodosPor : function(origen, destino, cb){
		var that = this;
		jQuery.get('/api/vuelos/obtenerTodosPor', {'origen':origen, 'destino':destino}, function(data){
			that = data;
			if(cb)
				cb(that);
		});
	}
}
/*
var recorridos = {
	id:null,
	origen:'pepe',
	destino:'pepa',
	obtener : function(){
		var that = this;
		jQuery.get('/api/recorridos/' + id, function(data){
			jQuery.extend(that, data);
		});
	}
}*/