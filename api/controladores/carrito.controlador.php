<?php



Class ControladorCarrito{

	
	static public function ctrAgregaProducto($valor, $token){ 
        $link = 'carrito/add/';

		$respuesta = modeloCarrito::mdlProductos($link, $valor, $token);
		return $respuesta;	
	}


	static public function ctrRemoveProducto($valor, $token){ 
        $link = 'carrito/remove/';
		$respuesta = modeloCarrito::mdlProductos($link, $valor, $token);
		return $respuesta;	
	}


	static public function ctrRemoveAllProducto($valor, $token){ 
        $link = 'carrito/removeall/';
		$respuesta = modeloCarrito::mdlProductos($link, $valor, $token);
		return $respuesta;	
	}


	static public function ctrMuesraProductos($valor, $token){ 
        $link = 'carrito/actual';
		$respuesta = modeloCarrito::mdlMostrarProductos($link, $valor, $token);
		return $respuesta;	
	}

	static public function ctrCompraOK($arrayCompra, $token){ 
        $link = 'compra/compraok';
		$respuesta = modeloCarrito::mdlCompraOK($link, $token, $arrayCompra);
		$respuestaArray = json_decode($respuesta, true);
		//var_dump($respuestaArray);
		if($respuestaArray != NULL && $respuestaArray['result'] == 'Added'){
			sleep(1);
			echo "<script>$('#compraExito').modal('toggle');
			var onlyUrl = window.location.href.replace(window.location.search,'');
			</script>";
		} else {
			echo '<script>$("#compraExito").modal("toggle")</script>';
		}
	}


	static public function ctrTreMisProductos($token){ 
        $link = 'usuarios/mystock';
		$respuesta = modeloCarrito::mdlTreMisProductos($link, $token);
		return $respuesta;	
	}

	static public function ctrTreMisDeseos($token){ 
        $link = 'deseos/actual1';
		$respuesta = modeloCarrito::mdlTreMisProductos($link, $token);
		return $respuesta;	
	}

	static public function ctrGiftAdd($data, $token){ 
        $link = 'carritogift/add';
		$respuesta = modeloCarrito::mdlGiftAdd($link, $token, $data);
		return $respuesta;	
	}

	static public function ctrGiftOk($token, $email, $arrayCompra){ 
        $link = 'compragift/compraok';
		$respuesta = modeloCarrito::mdlGiftOk($link, $token, $arrayCompra);
		return $respuesta;
	}

	static public function ctrBuscaGift($data, $token){ 
        $link = 'giftcard/codigo/'.$data;
		$respuesta = modeloCarrito::mdlGiftOk($link, $token);
		if($data == ''){
			echo "<script>$('#mensaje-gif').append('<p>Campo de código requerido</p>')</script>";
		}else {
			if($respuesta == '[]'){
				echo "<script>$('#mensaje-gif').append('<p>Código inexistente</p>')</script>";
			} else {
				$array = json_decode($respuesta, true);
				$data = array(
					'contenidoId' => $array[0]['contenidoId'],
					'codigo' => $array[0]['codigo']
				);
				return $data;
			}
		}
	}

	static public function ctrCanjeaGift($token, $codigo){ 
        $link = 'giftcard/canjear/'.$codigo;
		$respuesta = modeloCarrito::mdlCanjeaGift($link, $token);
		return $respuesta;
	}

}