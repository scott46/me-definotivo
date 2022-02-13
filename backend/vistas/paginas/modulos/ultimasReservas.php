<?php 

$reservas = ControladorReservas::ctrMostrarReservas(null, null);


?>

<div class="card card-dark card-outline">
  <div class="card-header">
    <h3 class="card-title">Últimas Ventas</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body p-0">
    <ul class="products-list product-list-in-card pl-2 pr-2">
      <?php foreach (limit($reservas, 3) as $key => $value): ?>
        <?php if ($value["imagen_producto"] != ""){
          $foto = $value["imagen_producto"];
        }else{
          $foto = "vistas/img/usuarios/default/default.png";
        }
        ?>
       <li class="item">
        <div class="product-img">
            <img style="object-fit: contain" src="<?php echo $foto?>" alt="Product Image" class="img-size-50 rounded-circle">
        </div>
        <div class="product-info">
          <h6 class="product-title"><?php echo "ID Producto: ".$value["idventa"]; ?></h6>
          <h6 class="product-description"><?php echo "Producto: ".$value["nombre_producto"]; ?></h6>
            <span class="product-description">
              <?php echo $value["fechavta"]; ?>
            </span>
          </div>
        </li>
      <?php endforeach ?>
      </ul>
  </div>
      <!-- /.card-body -->
  <div class="card-footer text-right">
    <a href="reservas" class="btn btn-dark mt-3">Ver Ventas</a>
  </div>
      <!-- /.card-footer -->
</div>