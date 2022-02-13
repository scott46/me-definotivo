<?php 

  define('SESSIONBACK', 'tablaMEtyc');
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
          <h1>ME Política de privacidad</h1>
        </div>
        <div class="col-sm-2">
          <div class="row px-2" style="justify-content: flex-end">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addpp"><i class="fas fa-plus px-2"></i>Nuevo Pp</button>
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
          <table class="table table-bordered table-striped dt-responsive tablaMEPolitica" width="100%">
            <thead>
              <tr>
                <th style="width: 80px;">ID</th>
                <th>Orden</th>
                <th>Titulo ES</th>
                <th>Parrafo EN</th>
                <th style="width: 150px;">Estado</th>
                <th style="width: 80px;">Acciones</th>
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

<?php include "modals/addPp.php"; ?> 

<script src="vistas/js/politica.js?v=<?php echo(rand()); ?>"></script>

<style>
  .tablaMEFaq tbody td:first-child:hover {
    cursor: move;
  }
  .tablaMEFaq tbody tr:hover {
    background: rgba(0, 0, 0, 0.1);
  }

</style>

