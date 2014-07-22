<?php
require_once("/xampp/php/pear/fpdf/fpdf.php");
include '../lib/phpqrcode/qrlib.php';
include "../core/ConexionMySQL.php";
include "../core/Entidad.php";
include "../core/Recurso.php";
include "../recursos/Aeropuertos.php";
include "../recursos/Pasajes.php";
include "../recursos/Vuelos.php";
include "../entidades/Aeropuerto.php";
include "../entidades/Pasaje.php";
include "../entidades/Vuelo.php";
include "../entidades/Recorrido.php";



$recurso = new Recurso_Pasajes();
$retorno = $recurso->obtenerPorId($_GET['id']);
if($retorno <> false)
    $retorno = $recurso;
    // outputs image directly into browser, as PNG stream 

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Image(QRcode::png(json_encode($retorno)),20,20,100,100);
$pdf->Output();
?>

<button onclick="window.print();"></button>