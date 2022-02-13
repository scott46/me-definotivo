<?php 

  define('SESSIONBACK', 'faq');
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
          <h1>ME FAQ</h1>
        </div>
        <div class="col-sm-2">
          <div class="row px-2" style="justify-content: flex-end">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addFaq"><i class="fas fa-plus px-2"></i>Nueva FAQ</button>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-xl-12">
          <table class="table table-bordered table-striped dt-responsive tablaMEFaq" width="100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Orden</th>
                <th>Pregunta ES</th>
                <th>Respuesta ES</th>
                <th>Estado</th>
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

<?php include "modals/addFaq.modal.php"; ?> 
<?php include "modals/modificaFaq.modals.php"; ?> 

<script src="vistas/js/faq.js?v=<?php echo(rand()); ?>"></script>

<style>
  .tablaMEFaq tbody td:first-child:hover {
    cursor: move;
  }
  .tablaMEFaq tbody tr:hover {
    background: rgba(0, 0, 0, 0.1);
  }

</style>

