<?php  
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$objeto = new crud();
	$datos=array($_POST['nombre'],$_POST['anio'],$_POST['desarrollador']);
	echo $objeto->agregar($datos);
?>