jQuery(document).ready(function(){
	jQuery('[data-interactive="login"]').click(function(e){
		var user = jQuery('[data-interactive="usuario"]').val();
		var password = jQuery('[data-interactive="contrasena"]').val();

		if(user == 'admin' && password == 'admin'){
			window.location = '/menu';
		}
	});
});