<?php
	class conectar{
		public function conexion(){
			$conexion=mysqli_connect('localhost','root','','videojuegos');
			$conexion->set_charset('utf8');
			return $conexion;
		}
	}
	/*
	$objeto = new conectar();
	if ($objeto->conexion()) {
		echo "Conexion Exitosa";
		echo "<hr>";
	}else{
		echo "Conexion Fallida";
		echo "<hr>";
	}
	*/
?>