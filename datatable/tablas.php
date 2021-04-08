<?php  
	require_once "clases/conexion.php";
	$objeto = new conectar();
	$conexion=$objeto->conexion();
	$sql="SELECT id_juego,nombre,anio,desarrollador FROM juegos";
	$result=mysqli_query($conexion,$sql);
?>
<div>
	<table class="table table-hover table-condensed table-bordered" id="iddatatable1">
		<thead style="background-color: red; color:black; font-weight: bold;">
			<tr>
				<td>Nombre</td>
				<td>Año</td>
				<td>Desarrollador</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc; color:gray; font-weight: bold;">
			<tr>
				<td>Nombre</td>
				<td>Año</td>
				<td>Desarrollador</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</tfoot>
		<tbody style="background-color: white">
			<?php  
				while ($mostrar=mysqli_fetch_row($result)){
					#code
			?>
			<tr>
				<td><?php echo $mostrar[1] ?></td>
				<td><?php echo $mostrar[2] ?></td>
				<td><?php echo $mostrar[3] ?></td>
				<td style="text-align: center;">
					<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')">
						<span class="fa fa-pencil"></span>
					</span>
				</td>
				<td style="text-align: center;">
					<span class="btn btn-danger btn-sm" onclick="eliminarDatos('<?php echo $mostrar[0] ?>')">
						<span class="fa fa-trash"></span>
					</span>
				</td>
			</tr>
			<?php  
				}
			?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
    	$('#iddatatable1').DataTable();
	});
</script>