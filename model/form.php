<?php
require_once "connect.php";

$objData = new Database;

//print_r($objData);die;

if (isset($_GET['option'])) {
//  $option = $_GET['option'];
	//  echo $option;
	$sth1 = $objData->prepare('SELECT * FROM CUENTA as a LEFT JOIN BANCO  as b ON a.id_tipo_banco = b.id_banco WHERE id_cuenta = :id');

	$sth1->bindParam(':id', $_GET['option']);

	$sth1->execute();

	$result1 = $sth1->fetchAll();

}

$ssth = $objData->prepare('SELECT * FROM CUENTA WHERE id_cuenta = :id');

$ssth->bindParam(':id', $_GET['option']);

$ssth->execute();
$result = $ssth->fetchAll();
//print_r($result);
?>