<?php 

  define('SESSIONBACK', 'comentarios');
  /*
  if($admin["perfil"] != "Administrador"){

    echo '<script>

      window.location = "banner";

    </script>';

    return;

  }
*/
 ?>

 <div class="content-wrapper" style="min-height: 717px;">
  <section class="content-header">
    <div class="container-fluid">
      
      <div class="row mb-2">
        <div class="col-sm-10">
          <h1>ME Reseñas</h1>
        </div>
        <div class="col-sm-2">
          <!-- <div class="row px-2" style="justify-content: flex-end">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addAutor"><i class="fas fa-plus px-2"></i>Nuevo Comentario</button>
          </div> -->
        </div>
      </div>

      <div class="col-4 px-0 py-3">
        <select class="form-select" aria-label="Default select example" id="tipoDeComentarios">
          <option value="">Todos</option>
          <option value="contenidos">Contenidos</option>
          <option value="elementos">Elementos</option>
        </select>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-xl-12">
          <table class="table table-bordered table-striped dt-responsive tablaMEComentarios" width="100%">
            <thead>
              <tr>
                <th width='60px'>ID</th>
                <th>Tipo Contenido</th>
                <th>Titlo Elemento</th>
                <th>Comentario</th>
                <th>Usuario</th>
                <th>Iniciales</th>
                <th width='100px'>Estado</th>
                <th width='80px' >Acciones</th>
              </tr>   
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>

<?php //include "modals/addAutor.modals.php"; ?> 
<?php //include "modals/modifAutor.modals.php"; ?> 
<?php //include "modals/modifBackgroundCategoria.modals.php"; ?> 
<script src="vistas/js/tablaMEcomentarios.js?v=<?php echo(rand()); ?>"></script>

<script>
  $(document).ready(() => {
    $('#tipoDeComentarios').change(() => {
      var consulta = $('#tipoDeComentarios').val();
      var url;
      if(consulta == ''){
        url = "ajax/tablacomentarios.ajax.php";
      } else {
        url = "ajax/tablaComentariosxTema.ajax.php";
      }
      $.ajax({
    	  url: url,
    	  method: "POST",
    	  data: {tipoConsulta: consulta},
    	  success: function (respuesta) {
          var json = JSON.parse(respuesta);
          createTablaComentarios(json)
        }
      });


    })
  })

  function createTablaComentarios(json) {
    console.log(json.data);
    var data = json.data;
    var table = $('.tablaMEComentarios').DataTable({
      data: data,
      destroy: true,
      searching: true,
      createdRow: function(row, data, dataIndex){
        $(row).attr('id', data.id);
      },
      rowReorder: {
        dataSrc: 'order',
        selector: 'td:first-child',
      },
    });
  }

  $(document).on("click", ".borraComentario", function(){
    var idComentario = $(this).attr('idComentario');
    var tabla = $(this).attr('data-tipo');
    var borra = {
      idComentario: idComentario,
      tabla: tabla
    }
    var json = JSON.stringify(borra);  
    $.ajax({
      url: 'ajax/experiencia.ajax.php',
      method: "POST",
      data: {borraComentario: json},
      success: function (respuesta) {
        if(respuesta.includes('Deleted') || respuesta.includes('Modified')) {
          Swal.fire({
            icon: 'success',
            title: 'El Comentario se ha eliminado',
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.reload();
            }
          })
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Se ha producido un error. Intente nuevamente',
          })
        }
      }
    });
  });





</script>