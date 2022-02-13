<?php 

  define('SESSIONBACK', 'categorias');
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
          <h1>ME Autores</h1>
        </div>
        <div class="col-sm-2">
          <!-- <div class="row px-2" style="justify-content: flex-end">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addAutor"><i class="fas fa-plus px-2"></i>Nuevo Autor</button>
          </div> -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-xl-12">
          <table class="table table-bordered table-striped dt-responsive tablaMEautores" width="100%">
            <thead>
              <tr>
                <th width='60px'>ID</th>
                <th>Nombre</th>
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

<?php include "modals/addAutor.modals.php"; ?> 
<?php include "modals/modifAutor.modals.php"; ?> 
<?php //include "modals/modifBackgroundCategoria.modals.php"; ?> 
<script src="vistas/js/autor.js?v=<?php echo(rand()); ?>"></script>

