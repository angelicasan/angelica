<?php

include("connect.php");


/* CLIENTE */ 

$nombre_cliente = $_POST['nombre_cliente'];
$dni_cliente = $_POST['dni_cliente'];


/*TITULAR */ 
$fecha = date('m/d/Y', time());
$titular = $_POST['nombre_titular'];
$cedula = $_POST['cedula'];
$num_cuenta = $_POST['num_cuenta'];
$banco = $_POST['tipo_banco'];
$tasa = $_POST['tasa'];

/*Importes */
$importe_pesos = $_POST['importe_pesos'];
$tipo_pago = $_POST["tipo_pago"];
$importe_destino = get_importe_bs($importe_pesos, $tasa);
echo "Recibimos... <br>";
echo "Fecha de Transaccion:  " .$fecha. "<br>";
echo "Titular: ".$titular."<br>";
echo "Cedula: ".$cedula."<br>";
echo "N° de cuenta: ".$num_cuenta ."<br>";
echo "banco: ".$banco . "<br>";
echo "Importe en Pesos: ".$importe_pesos."<br>";
echo "tipo pago:  " . $tipo_pago . "<br>";
echo "Importe destino: " . $importe_destino . "Bs" ;
/*
$insertar = "insert into cuenta (
	id_cliente,
	id_tipo_banco,
	num_cuenta,
	nombre_titular_cuenta,
	apellido_titular_cuenta,
	ceddula_titular_cuenta
	) VALUES (
	'',
*/

function get_importe_bs($pesos, $tasa){

	$importe_destino = $pesos * $tasa;

	return $importe_destino;
}