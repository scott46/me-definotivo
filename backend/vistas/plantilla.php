<?php 
$ruta = ControladorRuta::ctrRuta();
$rutaBackend = ControladorRuta::ctrRutaBackend();

// if(isset($_SESSION["idBackend"])){

// 	$admin = ControladorAdministradores::ctrMostrarAdministradores("id", $_SESSION["idBackend"]);

// }
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>| Backend</title>

	<link rel="icon" href="vistas/img/favicon/favicon-32x32.png" sizes="40x40">
	<!--=====================================
	VÍNCULOS CSS
	======================================-->
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" integrity="zmfNZmXoNWBMemUOo1XUGFfc0ihGGLYdgtJS3KCr/l0=">

	 <!-- Google Font: Source Sans Pro -->
  	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

	<!-- Theme style AdmninLTE -->
  	<link rel="stylesheet" href="vistas/css/app.css">

	<!-- Theme style AdmninLTE -->
  	<link rel="stylesheet" href="vistas/css/plugins/adminlte.min.css">

  	<!-- DataTables -->
	<link rel="stylesheet" href="vistas/css/plugins/dataTables.bootstrap4.min.css">	
	<link rel="stylesheet" href="vistas/css/plugins/responsive.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vistas/js/plugins/Buttons-1.6.3/css/buttons.bootstrap4.min.css"/>

    <link rel="stylesheet" href="vistas/js/plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css">

	<!--=====================================
	VÍNCULOS JAVASCRIPT
	======================================-->

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>	
	<!-- AdminLTE App -->
	<script src="vistas/js/plugins/adminlte.min.js"></script>

	<!-- DataTables 
	https://datatables.net/-->
  	<script src="vistas/js/plugins/jquery.dataTables.min.js"></script>
  	<script src="vistas/js/plugins/dataTables.bootstrap4.min.js"></script> 
	<script src="vistas/js/plugins/dataTables.responsive.min.js"></script>
	<script src="vistas/js/plugins/responsive.bootstrap.min.js"></script>	
	<!-- <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
	<!-- <script src="//mpryvkin.github.io/jquery-datatables-row-reordering/1.2.3/jquery.dataTables.rowReordering.js"></script> -->

	<script type="text/javascript" src="vistas/js/plugins/JSZip-2.5.0/jszip.min.js"></script>
	<script type="text/javascript" src="vistas/js/plugins/pdfmake-0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" src="vistas/js/plugins/pdfmake-0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" src="vistas/js/plugins/Buttons-1.6.3/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="vistas/js/plugins/Buttons-1.6.3/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="vistas/js/plugins/Buttons-1.6.3/js/buttons.print.min.js"></script>

	<!-- bar progress -->
	<!-- <script src="vistas/js/plugins/apb/dist/js/jquery.progresstimer.js"></script> -->

  	<!-- fechas -->	
	<script src="vistas/js/plugins/moment.js"></script>

  	<!-- SWEET ALERT 2 -->	
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	<!-- Recorta y remidenciona la imagen -->
	<script src="https://cdn.jsdelivr.net/gh/jamesssooi/Croppr.js@2.3.0/dist/croppr.min.js"></script>
	<link href="https://cdn.jsdelivr.net/gh/jamesssooi/Croppr.js@2.3.0/dist/croppr.min.css" rel="stylesheet"/>

	<!-- fullCalendar -->
	<!-- https://momentjs.com/ -->
	<script src="vistas/js/plugins/moment.js"></script>
	<!-- <script src="vistas/js/plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script> -->

	<style>
		
	.fc-today{
		background:rgba(255,255,255,0) !important;
	}

	</style>

</head>

<?php 
	if (!isset($_SESSION["validarSesionBackend"])): 
		include "paginas/login.php";
?>

<?php else: ?>

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
	<div class="wrapper">
		<?php 

		include "paginas/modulos/header.php";
		include "paginas/modulos/menu.php";
		
		/*=============================================
		Navagación de páginas
		=============================================*/
		if(isset($_GET["pagina"])){
			if ($_GET["pagina"] == "inicio" ||
				$_GET["pagina"] == "listadocontenidos" ||
				$_GET["pagina"] == "listadofaq" ||
				$_GET["pagina"] == "listadoPoliticas" ||
				$_GET["pagina"] == "listadoTyC" ||
				$_GET["pagina"] == "listadocategorias" ||
				$_GET["pagina"] == "listadotipodearchivos" ||
				$_GET["pagina"] == "listadotags" ||
				$_GET["pagina"] == "listadoautores" ||
				$_GET["pagina"] == "listadousuarios" ||
				$_GET["pagina"] == "listadotipodeexpereincias" ||
				$_GET["pagina"] == "listadocomentarios" ||
				$_GET["pagina"] == "listadogiftcard" ||
				$_GET["pagina"] == "home" || 
				$_GET["pagina"] == "banner" ||
				$_GET["pagina"] == "listadoVentas" ||
			  	$_GET["pagina"] == "salir"){
				include "../backend/vistas/paginas/".$_GET["pagina"].".php";
			}else{
				include "paginas/error404.php";
			}
		}else{
			include "paginas/inicio.php";
		}
		include "paginas/modulos/footer.php";
		?>


	</div>

	<script src="vistas/js/tablaMEFaq.js?v=<?php echo(rand()); ?>"></script>
	<script src="vistas/js/tablaMEvideos.js?v=<?php echo(rand()); ?>"></script>
	<script src="vistas/js/tablaMEcategorias.js?v=<?php echo(rand()); ?>"></script>
	<script src="vistas/js/tablaMEautores.js?v=<?php echo(rand()); ?>"></script>
	<script src="vistas/js/tablaMEgiftcard.js?v=<?php echo(rand()); ?>"></script>
	<script src="vistas/js/tablaMEusuarios.js?v=<?php echo(rand()); ?>"></script>
	<script src="vistas/js/tablaMEventas.js?v=<?php echo(rand()); ?>"></script>
	<script src="vistas/js/tablaMEPolitica.js?v=<?php echo(rand()); ?>"></script>
	<script src="vistas/js/tablaMEtyc.js?v=<?php echo(rand()); ?>"></script>
	<script src="vistas/js/banner.js?v=<?php echo(rand()); ?>"></script>
	<!-- <script src="vistas/js/experiencias.js?v=<?php echo(rand()); ?>"></script> -->

</body>

<?php endif ?>

</html>