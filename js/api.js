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
var Recorrido = function (){
	this.origen = '';
	this.destino = '';
}

Recorrido.prototype = {
	obtenerTodos : function(cb){
		var that = this;
		jQuery.get('/api/recorridos/obtenerTodos', {origen:this.origen, destino:this.destino}, function(data){
			jQuery.extend(that, data);
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