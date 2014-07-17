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
	obtenerTodos : function(origen, destino, fecha, cb){
		var that = this;
		jQuery.get('/api/vuelos/obtenerTodos', {'origen':origen, 'destino':destino, 'fecha': fecha}, function(data){
			that = data;
			if(cb)
				cb(that);
		});
	}
}

//Necesita CORE
var Reserva = function (vuelo, nombre, email, fecha, dni, categoria){
	this.id = null;
	this.vuelo = vuelo;
	this.nombre = nombre;
	this.email = email;
	this.fecha = fecha;
	this.dni = dni;
	this.categoria = categoria;
}

Reserva.prototype = {
	crear : function(cb){
		var that = this;

		jQuery.post('/api/reservas/', 
				{id: that.id,
				vuelo: that.vuelo,
				nombre: that.nombre,
				email: that.email,
				fecha: that.fecha,
				dni: that.dni,
				categoria: that.categoria})
			.done( function(data) {
			    jQuery.extend(that, data);
					if(cb)
						cb(that);
		    });
	}
}
var Pago = function (idPasaje, formaPago){
	this.idPasaje = idPasaje;
	this.formaPago = formaPago;
}

Pago.prototype = {
	crear : function(cb){
		var that = this;

		jQuery.post('/api/pagos/', {
			pasaje: that.idPasaje,
			formaPago: that.formaPago
		}).done( function(data) {
		    jQuery.extend(that, data);
				if(cb)
					cb(that);
	    });
	}
}