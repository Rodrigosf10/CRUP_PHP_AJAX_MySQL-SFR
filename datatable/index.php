<!DOCTYPE html>
<html>
<head>
  <title>Mis Juegos</title>
  <?php
    require_once "scripts.php";
  ?>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm12">
        <div class="card text-center">
          <div class="card-header">
            TOP Juegos Favoritos
          </div>
          <div class="card-body">
            <span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
              Agregar Nuevo Juego        <span class="fa fa-plus"></span> 
            </span>
            <hr>
            <div id="tablaDatatable"></div>
          </div>
          <div class="card-footer text-muted">
            By: Sandoval Flores Rodrigo
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Modal -->
  <div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Juego</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formularioNuevo">
            <label>Nombre</label>
            <input type="text" class="form-control input-sm" id="nombre" name="nombre">
            <label>Año</label>
            <input type="text" class="form-control input-sm" id="anio" name="anio">
            <label>Desarrollador</label>
            <input type="text" class="form-control input-sm" id="desarrollador" name="desarrollador">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" id="btnagregarcambio" class="btn btn-primary">Agregar Nuevo</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Datos del Juego</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formularioNuevoU">
            <input type="text" hidden="" id="idjuego" name="idjuego">
            <label>Nombre</label>
            <input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
            <label>Año</label>
            <input type="text" class="form-control input-sm" id="anioU" name="anioU">
            <label>Desarrollador</label>
            <input type="text" class="form-control input-sm" id="desarrolladorU" name="desarrolladorU">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-warning" id="btnActualizar">Guardar Cambios</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#btnagregarcambio').click(function(){
      datos=$('#formularioNuevo').serialize();
      $.ajax({type:"POST", data:datos, url:"procesos/agregar.php", 
        success:function(r){
          if (r==1) {
            $('#formularioNuevo')[0].reset();
            $('#tablaDatatable').load('tablas.php');
            alertify.success("Agregado con Exito");
          }else{
            alertify.error("Fallo al Agregar");
          }
        }
      });
    });
    $('#btnActualizar').click(function(){
      datos=$('#formularioNuevoU').serialize();
      $.ajax({
        type:"POST",
        data:datos,
        url:"procesos/actualizar.php",
        success:function(r){
          if(r==1){
            $('#tablaDatatable').load('tablas.php');
            alertify.success("Actualizacion con Exito");
          }else{
            alertify.error("Error al Actualizar");
          }
        }
      });
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaDatatable').load('tablas.php');
  });
</script>

<script type="text/javascript">
  function agregaFrmActualizar(idjuego){
    $.ajax({
      type:"POST",
      data:"idjuego=" + idjuego,
      url:"procesos/obtenDatos.php",
      success:function(r){
        datos=jQuery.parseJSON(r);
        $('#idjuego').val(datos['idjuego']);
        $('#nombreU').val(datos['nombre']);
        $('#anioU').val(datos['anio']);
        $('#desarrolladorU').val(datos['desarrollador']);
      }
    });
  }
  function eliminarDatos(idjuego){
    alertify.confirm('Eliminar un juego', '¿Seguro que quieres eliminar este juego?', function(){
      $.ajax({
        type:"POST",
        data:"idjuego=" + idjuego,
        url:"procesos/eliminar.php",
        success:function(r){
          if(r==1){
            $('#tablaDatatable').load('tablas.php');
            alertify.success("Eliminado con Exito");
          }else{
            alertify.error("No se elimino el juego");
          }
        }
      });
    }
    , function(){
    });
  }
</script>