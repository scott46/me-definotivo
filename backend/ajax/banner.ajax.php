<?php

require_once "../controladores/banner.controlador.php";
require_once "../modelos/banner.modelo.php";
require_once "../controladores/tablas.controlador.php";
require_once "../modelos/tablas.modelo.php";

session_start();




class AjaxBanner{
    
	/*=============================================
	Editar Banner
	=============================================*/	
	// public $idBanner;
	// public function ajaxMostrarBanner(){
	// 	$respuesta = ControladorBanner::ctrMostrarBanner("id", $this->idBanner);
	// 	echo json_encode($respuesta);
	// }
	/*=============================================
	Eliminar Banner
	=============================================*/	
    public $token;
	public $idEliminar;
	public $rutaBanner;
	public function ajaxEliminarBanner(){
		$respuesta = ControladorBanner::ctrEliminarBanner($this->idEliminar, $this->rutaBanner, $this->token);
		echo $respuesta;
	}
}

/*=============================================
Editar Banner
=============================================*/	
// if(isset($_POST["idBanner"])){
// 	$editar = new AjaxBanner();
// 	$editar -> idBanner = $_POST["idBanner"];
// 	$editar -> ajaxMostrarBanner();
// }

/*=============================================
Eliminar Banner
=============================================*/	
if(isset($_POST["idEliminar"])){
	$eliminar = new AjaxBanner();
	$eliminar -> idEliminar = $_POST["idEliminar"];
	$eliminar -> rutaBanner = $_POST["rutaBanner"];
    $eliminar -> token = json_decode($_SESSION["tokenBack"], true);
	$eliminar -> ajaxEliminarBanner();
}

/*=============================================
edita texto Banner
=============================================*/	
if(isset($_POST["editaBannerTexto"])){
	$id = $_POST["editaBannerTexto"];
	$respuesta = TablasControlador::crtMostrarTablas('banners', null, $token);
	$arrayRespuesta = json_decode($respuesta, true);
	$data = array();
	foreach ($arrayRespuesta as $row) {
		if($row['idBanners'] == $id){
			array_push($data, $row);
		}
	}
	echo json_encode($data);
}
/*=============================================
edita texto Banner
=============================================*/	
if(isset($_POST["editaBannerTextoInput"])){
	$token = json_decode($_SESSION["tokenBack"], true);
	$data = json_decode($_POST["editaBannerTextoInput"], true);
	$respuesta = ControladorBanner::ctrEditaTextoBanner($data, $token);
	echo $respuesta;
}
