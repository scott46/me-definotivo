<?php 

$avisos = ControladorAvisos::ctrMostrarAvisos(null, null);


?>

<div class="card card-secondary card-outline">
  <div class="card-header">
    <h3 class="card-title">Últimos Solicitudes de Aviso</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body p-0">
    <ul class="products-list product-list-in-card pl-2 pr-2">
      <?php foreach (limit($avisos, 3) as $key => $value): ?>
        <?php if ($value["imagenproducto"] != ""){
          $foto = $value["imagenproducto"];
        }else{
          $foto = "vistas/img/usuarios/default/default.png";
        }
        ?>
       <li class="item">
        <div class="product-img">
            <img style="object-fit: contain" src="<?php echo $foto?>" alt="Product Image" class="img-size-50 rounded-circle">
        </div>
        <div class="product-info">
          <h6 class="product-title"><?php echo $value["nombreproducto"]; ?>
          <h6 class="product-description"><?php echo "Email: ".$value["email"]; ?></h6>
            <span class="product-description">
              <?php echo $value["fechaaviso"]; ?>
            </span>
          </div>
        </li>
      <?php endforeach ?>
      </ul>
  </div>
      <!-- /.card-body -->
  <div class="card-footer text-right">
    <a href="listadoavisos" class="btn btn-secondary mt-3">Ver Avisos</a>
  </div>
      <!-- /.card-footer -->
</div>