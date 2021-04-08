<?php  
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$objeto = new crud();
	echo json_encode($objeto->obtenDatos($_POST['idjuego']));
?>