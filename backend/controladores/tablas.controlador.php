<?php



class TablasControlador {

	static public function crtMostrarTablas ($item, $valor, $token) {
		$respuesta = TablasModelo::mdlMostrarTablas ($item, $valor, 'admin');
		return $respuesta;
	}

	static public function ctrMostrarTablasUser ($item, $valor, $token) {
		$respuesta = TablasModelo::mdlMostrarTablasUser ($item, $valor, $token);
		return $respuesta;
	}


	static public function ctrTraerDatosTyc ($item, $valor, $token) {
		$respuesta = TablasModelo::mdlTraerDatosTyc ($item, $valor, $token);
		return $respuesta;
	}


	static public function ctrTraerDatosPP ($item, $valor, $token) {
		$respuesta = TablasModelo::mdlTraerDatosPP ($item, $valor, $token);
		return $respuesta;
	}

static public function ctrTraerDatosGC ($item, $valor, $token) {
		$respuesta = TablasModelo::mdlTraerDatosGC ($item, $valor, $token);
		return $respuesta;
	}

}







