<?php 

  define('SESSIONBACK', 'listadogiftcard');
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
          <h1>ME Gift Card</h1>
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
          <table class="table table-bordered table-striped dt-responsive tablaMEgiftCard" width="100%">
            <thead>
              <tr>
                <th width='200px'>Fecha Creacion</th>
                <th>codigo</th>
                <th >Comprado por</th>
                <th >Contenido Id</th>
                <th >Moneda</th>
                <th >Monto</th>
                <th >Utilizado por</th>
                <th >Estado</th>
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
<!-- <script src="vistas/js/giftcard.js?v=<?php echo(rand()); ?>"></script>
 -->
