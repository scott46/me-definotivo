<?php 


define('SESSIONBACK', 'inicio');

// cantidad de usuarios registrados





// cantidad de canales activos





// cantidad de experiencias únicas. 








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
        <div class="col-sm-6">
          <h1>Analíticas</h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active px-3">Analíticas</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row py-4 px-3">

        <div class="col-3">
          <div class="box-data">
            <label for="">Usuarios Registrados</label>
            <h1>1,612</h1>
          </div>    

          <div class="box-data">
            <label for="">Canales Activos</label>
            <h1>25</h1>
          </div>    

          <div class="box-data">
            <label for="">Total de Compras</label>
            <h1>20</h1>
          </div>    
        </div>

        <div class="col-3">
          <div class="box-data">
            <label for="">Usuarios Navegando</label>
            <h1>75</h1>
          </div>    

          <div class="box-data">
            <label for="">Experiencias únicas Activas</label>
            <h1>8</h1>
          </div>    
        </div>

        <div class="col-6">
          <div class="box-data-paises">
            <label for="">Ubicaciones</label>
            <h1>Argentina</h1>
            <h1>Estados unidos</h1>
            <h1>México</h1>
            <h1>Chile</h1>
            <h1>Brasil</h1>
            <h1>Paraguay</h1>
            <h1>Canadá</h1>
            <h1>España</h1>
          </div>    
        </div>

      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

<style>
  .box-data h1 {
    font-size: 5rem;
  }
</style>