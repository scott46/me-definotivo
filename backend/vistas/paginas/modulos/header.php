<?php 

// $notificaciones = ControladorInicio::ctrMostrarNotificaciones();

// $totalNotificaciones = 0;
// $totalVentas = 0;
// $totalClientes = 0;
// $totalAvisos = 0;

// foreach ($notificaciones as $key => $value) {

//    $totalNotificaciones += $value["cantidad"];

//     if($value["tipo"] == "ventas"){
      
//       $totalVentas = $value["cantidad"];

//     }elseif ($value["tipo"] == "clientes"){

//       $totalClientes = $value["cantidad"];
    
//     } else {
     
//       $totalAvisos = $value["cantidad"];
      
//     }
// }
  $segundos =  600;//5 minutos
  if(($_SESSION['tiempo']+$segundos) < time()) {
    echo'<script type="text/javascript">alert("Su sesion ha expirado por inactividad';
    echo', vuelva a logearse para continuar");window.location.href="salir";</script>';    
  }else{
    $_SESSION['tiempo']=time();
  }

?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
  <!--=====================================
  Botón que colapsa el menú lateral
  ======================================--> 
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a class="nav-link">Hola <?php //echo $admin["nombre"]; ?></a>
    </li>
  </ul>
  <!--=====================================
  Notifiaciones
  ======================================--> 
  <ul class="navbar-nav ml-auto">
<!--     <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
        <i class="far fa-bell"></i>
        <span class="badge badge-danger navbar-badge icon-camp"><?php //if($totalNotificaciones != 0){echo $totalNotificaciones;}  ?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header"><?php //echo $totalNotificaciones; ?> Notificaciones</span>
        <div class="dropdown-divider"></div>
        <a href="index.php?pagina=reservas&not=0" class="dropdown-item">
          <i class="far fa-calendar-alt mr-2 float-right"></i>
          <span class="badge <?php //if($totalVentas!=0){echo "badge-info";} ?> "><?php //echo $totalVentas; ?> Ventas nuevas</span>
        </a>
         <div class="dropdown-divider"></div>
        <a href="index.php?pagina=usuarios&not=0" class="dropdown-item">
          <i class="fas fa-user-check mr-2 float-right"></i>
          <span class="badge <?php //if($totalClientes!=0){echo "badge-info";} ?> "><?php //echo $totalClientes; ?> Clientes nuevos</span>
        </a>
        <div class="dropdown-divider"></div>
          <a href="index.php?pagina=listadoavisos&not=0" class="dropdown-item">
            <i class="fas fa-user-check mr-2 float-right"></i>
            <span class="badge <?php //if($totalAvisos!=0){echo "badge-info";} ?> "><?php //echo $totalAvisos; ?> Solicitudes de Aviso</span>
          </a>
      </div>
    </li>
 -->    <!--=====================================
    Botón salir del sistema
    ======================================--> 
    <li class="nav-item">
      <a class="nav-link" href="salir">
        <i class="fas fa-sign-out-alt"></i>
      </a>   
    </li>
  </ul>
</nav>
<style>
/* @keyframes latidos {
    from { transform: none; }
    50% { transform: scale(1.4); }
    to { transform: none; }
}

.icon-camp {
  display: inline-block;
	font-size: 150px;
	text-shadow: 0 0 10px #222,1px 1px  0 #450505;
	color: red;
	animation: latidos 1s infinite;
  transform-origin: center;
  position: absolute;
  background: red;
  padding: 0;
  border-radius: 50%;
  width: 18px;
  text-align: center;
  font-size: 13px;
  right: 5px;
  top: 5px;
  color: #ffffff

} */
</style>

<?php include 'spinner.php'; ?>