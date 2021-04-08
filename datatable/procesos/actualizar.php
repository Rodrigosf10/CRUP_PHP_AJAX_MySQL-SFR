<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$objeto = new crud();
	$datos=array(
		$_POST['nombreU'],
		$_POST['anioU'],
		$_POST['desarrolladorU'],
		$_POST['idjuego']);
	echo $objeto->actualizar($datos);
 ?>