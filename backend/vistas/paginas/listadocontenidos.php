<?php 
if(isset($_SESSION["tokenBack"])) {
  // $token = $_SESSION["tokenBack"];
  $token = $_SESSION["tokenBack"];
  $categorias = json_decode(TablasControlador::crtMostrarTablas ('contenidos', null, $token), true);
} else {
  $token = null;
}
define('SESSIONBACK', 'videos');
 ?>

 <div class="content-wrapper" style="min-height: 717px;">
  <section class="content-header">
    <div class="container-fluid mt-2">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>ME Contenidos</h1>
        </div>
        <div class="col-sm-4">
          <div class="input-group px-2">
            <span class="input-group-text" >Contenido Destacado</span>
            <select class="form-select" id="destacar-contenido" aria-label="Floating label select example">
              <?php foreach ($categorias as $categoria ) { ?> 
              <option value="<?= $categoria['idContenidos']?>"><?= strtoupper($categoria['titulo1'])?></option>
              <?php } ?> 
            </select>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row px-2" style="justify-content: flex-end">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#subirContenido"><i class="fas fa-plus pl-2 px-2"></i>Nuevo Contenido</button>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-12 text-left mt-4">
          <div class="card">
            <div class="card-body">
              <p class="mb-0" ><strong>Background: </strong>(Contenidos y elementos)Las imágenes deben ser menores a 2 MB, para un mejor rendimiento. <br>
              <strong>Videos, audios y pdf: </strong>deben ser menores a 100 MB, para un mejor rendimiento.<hr><strong>Background: </strong>(Contenidos y elementos)Las imágenes deben ser menores a 2 MB, para un mejor rendimiento. 
              </p>
            </div>
          </div>
        </div>

        <div class="col-12 col-xl-12">
          <table class="table table-bordered table-striped dt-responsive tablaMEvideos" width="100%">
            <thead>
              <tr>
                <th >Preview</th>
                <th  width='50px'>Orden</th>
                <th>Titulo</th>
                <th>Tipo</th>
                <th>Categoria</th>
                <th>PrecioPesos</th>
                <th>PrecioDolares</th>
                <th width='70px'># Ele</th>
                <th width='70px'>Vigencia</th>
                <th width='70px'>Estado</th>
                <th width='70px'>Preview</th>
                <th width='120px'>Acciones</th>
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

<?php include "modals/subirContenido.modals.php"; ?>
<?php include "modals/subirvideo.modals.php"; ?>
<?php include "modals/vervideo.modals.php"; ?>
<?php include "modals/listadoElementos.modals.php"; ?>
<?php include "modals/modifContenidoDetalle.modals.php"; ?>
<?php include "modals/modifBackgroundContenido.php"; ?>
<?php include "modals/modificaDetalleElemento.modals.php";?>
<?php include "modals/modifBackgroundElementos.php"; ?>
<?php include "modals/subirvideo-exp.modals.php"; ?>
<?php include "modals/subirvideo-exp-modif.modals.php"; ?>

<script src="vistas/js/plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>

<style>
table tbody tr td {
  height: 70px;
  align-items: center;
}
</style>
<script type="text/javascript">
  $('.btn-close').click((e)=> {
    $('#box-video').empty();
  })
</script>
<script src="vistas/js/contenidos.js?v=<?php echo(rand()); ?>"></script>
<script src="vistas/js/elementos.js?v=<?php echo(rand()); ?>"></script>


<script>
$(document).ready(function(){
  $.ajax({
    url:"ajax/experiencia.ajax.php",
    method: "POST",
    data: {destacaContenido: ''},
    success: function (respuesta) {
      console.log(respuesta);
      $("#destacar-contenido option[value="+respuesta+"]").attr("selected",true);
    }
  })
})

$(document).on("change", "#destacar-contenido", function(){
	var idcontenido = $('#destacar-contenido').val();
  $.ajax({
    url:"ajax/experiencia.ajax.php",
    method: "POST",
    data: {destacaContenido: idcontenido},
    success: function (respuesta) {
      console.log(respuesta);
      if(respuesta.includes('Modified')){
        Swal.fire({
          icon: 'success',
          title: 'El contenido se ha destacado exitosamente!',
        })
      }
    }
  })
})
</script>