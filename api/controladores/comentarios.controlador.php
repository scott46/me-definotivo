<?php

Class ControladorComentarios{
	
	static public function ctrAgregaComentario($comentario, $token, $tipo){ 
        $link = 'resenas/'.$tipo.'/add';
		$respuesta = modeloComentarios::mdlAgregaComentario($comentario, $link, $token);
		return $respuesta;	
	}
	static public function ctrSaberSiFueValuado($valor, $tipo, $token){ 
		$link = 'puntajes/'.$tipo.'/'.$valor;
		$respuesta = modeloComentarios::mdlSaberSiFueValuado($link, $token);
		return $respuesta;	
	}
	static public function ctrAgregaValuacion($valuacion, $token){ 
		$link = 'puntajes/elementos/add';
		$respuesta = modeloComentarios::mdlAgregaValuacion($valuacion,$link, $token);
		return $respuesta;	
	}
	static public function ctrMostrarComentarios($valor, $tipo, $token){ 
		$link = 'resenas/'.$tipo.'/'.$valor;
		$respuesta = modeloComentarios::mdlMostrarComentarios($link, $token);
		return $respuesta;	
	}
	static public function ctrMostrarPuntaje($valor, $tipo, $token){ 
		$link = 'puntajes/'.$tipo.'/'.$valor;
		$respuesta = modeloComentarios::mdlMostrarComentarios($link, $token);
		return $respuesta;	
	}


}