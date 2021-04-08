<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$objeto= new crud();
	echo $objeto->eliminar($_POST['idjuego']);
 ?>