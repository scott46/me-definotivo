<?php 

$mejorproducto = ControladorInicio::ctrMejorProducto();
$traerFoto = ControladorInicio::ctrTraerFotoHabitacion($mejorproducto["mejor"]);
$traerFotoArray = json_decode($traerFoto["galeria_product"], true);

?>


<div class="card card-success card-outline">
	<div class="card-header">
		<h5 class="m-0">Producto mas vendido</h5>
	</div>
	<div class="card-body">
		<div style="height: 100px">
		<img style="width: 100%; height: 100%; object-fit: contain; object-position: center" src="<?php if(!isset($traerFotoArray)) {echo "vistas/img/plantilla/patternnew.jpg" ;} else {echo $traerFotoArray[0]; } ?>" class="img-thumbnail">
		</div>
		<div style="display:grid">
		<h6 class="card-title py-3"><?php echo $traerFoto['name_product']; ?></h6>
		<a href="reservas" class="btn btn-success">Ver ventas</a>
		</div>
	</div>
</div>
