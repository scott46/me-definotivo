<?php


Class ControladorCategorias{
	static public function ctrMostrarCaterogias($valor){ 
		$respuesta = modeloCategorias::mdlMostrarCaterogias($valor);
		return $respuesta;	
	}

	static public function ctrMostrarBanner(){ 
		$link = 'banners';
		$respuesta = modeloCategorias::mdlMostrarComponentes($link);
		return $respuesta;	
	}
}