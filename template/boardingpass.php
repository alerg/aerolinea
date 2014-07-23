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
include "../entidades/Recorrido.php";
include "../entidades/Vuelo.php";
include "../Asiento.php";

$id = $_GET['id'];
$recurso = new Recurso_Pasajes();
$retorno = $recurso->obtenerPorId($id);

if($retorno->categoria == 'Primera'){
	$serie = array('A', 'B', 'C', 'D');
}else{
	$serie = array('V', 'W', 'X', 'Y', 'Z');
}

$asiento = $serie[$retorno->asiento->columna-1] . $retorno->asiento->fila;

$html = '<html>
	<head>
		<style type="text/css">
			.contenedor{ width:700px; margin:0 auto;}
			.boardingpass{ border:2px solid #004388; padding:0px; text-align:left; font-family:Arial,sans-serif; border-radius:8px; }
			.boardingpass_datos{ border-bottom:1px solid grey; padding-bottom:15px; }
			.boardingpass_datos-vuelo{ padding-bottom:20px; }
			.aviso{text-align:center; display:block; }
			.logo{display:block; margin:10px auto;}
			.p{ color:black; font-size:12px; font-family:Arial; }
			.b{ font-weight:bold; }
			.h2 { margin:15px 0; font-size:16px; font-weight:bold; color:black; }
		</style>
	</head>
	
	<body>		
		<div class="contenedor">
			<div class="boardingpass">
				<table cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td style="text-align:left; padding:20px; pading-right:5px;">
							<table cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td colspan="2" width="120">
										<img style="vertical-align:top;" src="http://localhost/template/img/logo.gif" width="100" height="38" />
									</td>
								</tr>
								<tr>
									<td style="padding-right:20px; padding-top:20px;">
										<img src="http://localhost/qr?id='.$id.'" height="100" width="100"/>
									</td>
									<td style="padding:0px 0 40px 0;">
										<p>Hola, <b>{{nombre}}</b><br />Este es tu boarding pass para el vuelo <b>#{{vuelo}}</b> desde <b>{{origen}}</b> hasta <b>{{destino}}</b>.</p>
										
										<p>Tu asiento, de categoría <b>{{categoria}}</b>, es el <b>{{asiento}}</b>.<br />
										El vuelo es el <b>{{fecha_partida}}</b>.</p>
									</td>
								</tr>
							</table>
						</td>
						<td style="font-size:12px; padding:20px 10px 20px 15px; border-left:1px dashed black;">
							<table cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td style="padding-bottom:10px;" colspan="2">
										<img style="vertical-align:top;" src="http://localhost/template/img/logo.gif" width="100" height="38" />
									</td>
								</tr>
								<tr>
									<td style="font-size:12px;" colspan="2">
									{{nombre}},<br />
									disfruta el vuelo #{{vuelo}}<br />
									desde {{origen}} hasta {{destino}}.<br /><br />
									</td>
								</tr>
								<tr>
									<td style="font-size:12px;" >ASIENTO</td><td style="font-size:12px;">{{asiento}}</td>
								</tr>
								<tr>
									<td style="padding-top:10px;" colspan="2">
										<img src="http://localhost/qr?id='.$id.'" height="50" width="50"/>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>';

$valoresPorReemplazar = array('{{precio}}','{{nombre}}','{{vuelo}}','{{categoria}}','{{fecha_partida}}','{{origen}}','{{destino}}', '{{asiento}}');
$valoresFinales =array($retorno->precio, $retorno->nombre, $retorno->vuelo, $retorno->categoria, $retorno->fechaPartida, $retorno->aeropuertoOrigen->ciudad.' - '.$retorno->aeropuertoOrigen->provincia, $retorno->aeropuertoDestino->ciudad.' - '.$retorno->aeropuertoDestino->provincia, $asiento);


$html = str_replace($valoresPorReemplazar, $valoresFinales, $html);
	#echo $html;

	$html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($html);
    $html2pdf->Output("boarding.pdf");
