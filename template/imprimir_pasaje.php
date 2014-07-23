<?php 
require_once('../lib/html2pdf/html2pdf.class.php');

include '../lib/phpqrcode/qrlib.php';
include "../core/ConexionMySQL.php";
include "../core/Entidad.php";
include "../core/Recurso.php";
include "../recursos/Aeropuertos.php";
include "../recursos/Checkin.php";
include "../recursos/Pasajes.php";
include "../recursos/Vuelos.php";
include "../entidades/Aeropuerto.php";
include "../entidades/Checkin.php";
include "../entidades/Pasaje.php";
include "../entidades/Vuelo.php";
include "../entidades/Recorrido.php";
include "../Asiento.php";

$recurso = new Recurso_Pasajes();
$retorno = $recurso->obtenerPorId($_GET['id']);

$html = '<html>
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
				
				<img class="logo" src="http://localhost/template/img/logo.gif" width="160" height="58"/>
				<div class="pasaje_datos">
					<p><strong>Fecha: </strong>'.date("d/m/Y").' 
					<strong style="padding-left:15px;"> Hora: </strong>'.date("H:i\h\s").' 
					<strong style="padding-left:15px;"> Precio: </strong>{{precio}}</p>
				</div>
				
				<table class="pasaje_datos-vuelo" cellspacing="0" border="0">
					<tr>
						<td>
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td><strong>Pasajero: </strong>{{nombre}}</td>
								</tr>
								<tr>
									<td><strong>Reserva: </strong>{{reserva}}</td>
								</tr>
								<tr>
									<td><strong>Vuelo: </strong>{{vuelo}}</td>
								</tr>
								<tr>
									<td><strong>Categoria: </strong>{{categoria}}</td>
								</tr>
							</table>
						</td>
						<td>
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td><strong>Fecha de partida: </strong>{{fecha_partida}}</td>
								</tr>
								<tr>
									<td><strong>Origen: </strong>{{origen}}</td>
								</tr>
								<tr>
									<td><strong>Destino: </strong>{{destino}}</td>
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

$valoresPorReemplazar = array('{{precio}}','{{nombre}}','{{reserva}}','{{vuelo}}','{{categoria}}','{{fecha_partida}}','{{origen}}','{{destino}}');
$valoresFinales =array($retorno->precio,$retorno->nombre,$retorno->id,$retorno->vuelo,$retorno->categoria,$retorno->fechaPartida, $retorno->aeropuertoOrigen->ciudad.' - '.$retorno->aeropuertoOrigen->provincia, $retorno->aeropuertoDestino->ciudad.' - '.$retorno->aeropuertoDestino->provincia);


$html = str_replace($valoresPorReemplazar, $valoresFinales, $html);
	#echo $html;

$html2pdf = new HTML2PDF('L','A4','fr', true, 'UTF-8');
$html2pdf->WriteHTML(utf8_encode($html));
$html2pdf->Output("pasaje". date("dmyHihs") .".pdf");
?>