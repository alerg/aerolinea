jQuery(document).ready(function(){
	jQuery('[data-interactive="consulta"]').click(function(e){
		e.preventDefault();
		var consulta = jQuery(e.target).attr('consulta');
		var posicion_x; 
		var posicion_y; 
		var ancho = 500;
		var alto = 500;
		posicion_x=(screen.width/2)-(ancho/2); 
		posicion_y=(screen.height/2)-(alto/2); 
		window.open("/template/impresionpdf.php?id=" + consulta, "Consultas", "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+"");
	});
});