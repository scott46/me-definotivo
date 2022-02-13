<?php



Class ControladorFaq{
	static public function ctrMostrarComponentes($valor){ 
		$respuesta = modeloCategorias::mdlMostrarComponentes($valor);
		return $respuesta;	
	}






}