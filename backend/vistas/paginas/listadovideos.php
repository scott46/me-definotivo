<?php 

  define('SESSIONBACK', 'videos');
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
          <h1>ME Videos</h1>
        </div>
        <div class="col-sm-2">
          <div class="row px-2" style="justify-content: flex-end">
            <button type="button" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#subirvideo"><i class="fas fa-plus pl-2 px-2"></i>Subir video</button>
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
          <table class="table table-bordered table-striped dt-responsive tablaMEvideos" width="100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>PrecioPesos</th>
                <th>PrecioDolares</th>
                <th width='70px'>Estado</th>
                <th width='120px'>Acciones</th>
              </tr>   
            </thead>
            <tbody>
              
             <!--  <tr>
                
                <td>1</td>
                <td>Suite</td>
                <td>Oriental</td>
                <td>
                  <button class="btn btn-secondary btn-sm">
                    <i class="far fa-eye"></i>
                  </button>
                </td> 

              </tr> -->

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>

<?php include "modals/subirvideo.modals.php"; ?>
<style>
  .btn-add {
    background: transparent;
    padding: 5px 10px;
    border: 1px solid #333;
    border-radius: 5px;
    transition: 0.3s all
  }
  .btn-add:hover {
    background: #333;
    color: #fff;
  }
</style>