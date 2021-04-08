<?php  
	class crud{
		public function agregar($datos){
			$objeto = new conectar();
			$conexion=$objeto->conexion();
			$sql="INSERT INTO juegos (nombre,anio,desarrollador) VALUES ('$datos[0]','$datos[1]','$datos[2]')";
			return mysqli_query($conexion, $sql);
		}
		public function obtenDatos($idjuego){
			$objeto = new conectar();
			$conexion=$objeto->conexion();
			$sql="SELECT id_juego,nombre,anio,desarrollador FROM juegos WHERE id_juego='$idjuego'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);
			$datos=array('id_juego'=>$ver[0],'nombre'=>$ver[1],'anio'=>$ver[2],'desarrollador'=>$ver[3]);
			return $datos;
		}
		public function actualizar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="UPDATE juegos SET nombre='$datos[0]',
									anio='$datos[1]',
									desarrollador='$datos[2]'
						WHERE id_juego='$datos[3]'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminar($idjuego){
			$objeto= new conectar();
			$conexion=$objeto->conexion();
			$sql="DELETE FROM juegos WHERE id_juego='$idjuego'";
			return mysqli_query($conexion,$sql);
		}
	}
?>