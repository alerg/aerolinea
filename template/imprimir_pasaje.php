<?php 

$html = '<html>
  <body>
	<head>
		<style type="text/css">
			.contenedor{ width:700px; margin:0 auto;}
			.pasaje{ border:1px solid #004388; border-radius:4px; padding:20px 30px; text-align:left; font-family:Arial, sans-serif; text-align:left;}
			.pasaje_datos{ border-bottom:1px solid grey; padding-bottom:0px;  }
			.pasaje_datos-vuelo{ padding-bottom:20px; padding-top:15px; width:100%; }
			.pasaje_datos-vuelo tr{height:25px;}
			.aviso{text-align:center; display:block; font-size:12px; }
			.logo{padding:10px;}
			.p{ color:black; font-size:12px; font-family:Arial; }
			.strong{ font-weight:bold; }
			.h2 { margin:15px 0; font-size:16px; font-weight:bold; color:black; }
		</style>
	</head>
	
	<body>		
		<div class="contenedor">
			<div class="pasaje">
				
				<img class="logo" src="img/logo.gif" width="160" height="58"/>
				<div class="pasaje_datos">
					<p><strong>Fecha: </strong>'.date("d/m/Y").' 
					<strong style="padding-left:15px;"> Hora: </strong>'.date("H:i\h\s").' 
					<strong style="padding-left:15px;"> Precio: </strong>$111</p>
				</div>
				
				<table class="pasaje_datos-vuelo" cellspacing="0" border="0">
					<tr>
						<td>
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td><strong>Pasajero: </strong>ALEJANDRO GARCÍA</td>
								</tr>
								<tr>
									<td><strong>Reserva: </strong>0879879</td>
								</tr>
								<tr>
									<td><strong>Vuelo: </strong>098372</td>
								</tr>
								<tr>
									<td><strong>Categoria: </strong>Primary</td>
								</tr>
							</table>
						</td>
						<td>
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td><strong>Fecha de partida: </strong>21/7/2014</td>
								</tr>
								<tr>
									<td><strong>Origen: </strong>Capital</td>
								</tr>
								<tr>
									<td><strong>Destino: </strong>Pinamar</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<span class="aviso">Comprobante de pago válido.<br /> Conservelo</span>
			</div>
		</div>
	</body>
</html>';
?>