<?php 
session_start();

require_once "../metodos/methods.php";
require_once "../controladores/experiencia.controlador.php";
require_once "../modelos/experiencia.modelo.php";

if(isset($_SESSION["tokenBack"])) {
	$token = json_decode($_SESSION["tokenBack"], true);
} else {
	$token = null;
}

if(isset($_POST['subirExp'])) {
	$experiencia = json_decode($_POST['subirExp'], true);
	$video = base64_decode($experiencia['video']);
	$respuesta = ControladorExperiencia::ctrSubirExperiencia($experiencia, $token);
	if($respuesta['estado'] === 'ok') {
		return array(
			'mensaje' => 'ok',
			'idVideo' => $respuesta['idVideo']
			); 
	}
}

if(isset($_POST['subirCont'])) {
	$contenido = json_decode($_POST['subirCont'], true);
	$respuesta = ControladorExperiencia::ctrSubirContenido($contenido,$token);
	if($respuesta['estado'] === 'ok') {
		return array(
			'mensaje' => 'ok',
			'idVideo' => $respuesta['idVideo']
			); 
	}
}

if(isset($_POST["idVideo"])) {
	$idVideo = $_POST['idVideo'];
	$archivo = $_FILES["archivo"];
	$guardaVideo = ControladorExperiencia::ctrSubirExperienciaFile($idVideo, $archivo,$token);
	var_dump($guardaVideo);
}

if(isset($_POST["verVideoPost"])) { 
	$idVideo = intval($_POST["verVideoPost"]);
	$verVideo = ControladorExperiencia::ctrTraeVideo($idVideo,$token);
	echo base64_encode($verVideo);
}



// contenidoas
if(isset($_POST["verContenidoTodos"])) { 
	$idContenido = intval($_POST["verContenidoTodos"]);
	$respuesta = ControladorExperiencia::ctrTraeTodoContenido($idContenido,$token);
	$respuestaArray = json_decode($respuesta, true);

	$respuestaCont = ControladorExperiencia::ctrTraeUnContenido($idContenido,$token);
	$respuestaContArray = json_decode($respuestaCont, true);
	if(count($respuestaArray) >0){
		$respuestaArray[0]['tipoContenidoId'] = $respuestaContArray[0]['tipoContenidoId'];
	}
	if($respuestaArray[0]['previewRuta'] === ''){
		$respuestaArray[0]['previewRuta'] = $respuestaContArray[0]['previewRuta'];
		$respuestaObject = json_encode($respuestaArray, true);
		echo $respuestaObject;
	} else {
		$respuestaObject = json_encode($respuestaArray, true);
		echo $respuestaObject;
	}
}
if(isset($_POST["verContenido"])) { 
	$idContenido = $_POST["verContenido"];
	$respuesta = ControladorExperiencia::ctrTraeUnContenido($idContenido,$token);
	echo $respuesta;
}
if(isset($_POST['activaContenido'])) {
	$activaContenido = json_decode($_POST['activaContenido'], true);
	$respuesta = ControladorExperiencia::ctrActivaDesactivaContenido($activaContenido,$token);
	echo $respuesta;
}
if(isset($_POST['modificaContenido'])) {
	$modificaContenido = json_decode($_POST['modificaContenido'], true);
	$respuesta = ControladorExperiencia::ctrModificaContenido($modificaContenido,$token);
	echo $respuesta;
}
if(isset($_POST['modificaBackgroundContenido'])) {
	$contenido = json_decode($_POST['modificaBackgroundContenido'], true);
	$imagenAnterior = $categoria['imagenAnterior'];
	$imagen = $contenido['imagen'];
	$directorio = 'vistas/img/contenidos/'.$contenido['idContenidos'];
	$nombrearchivo = 'me-contenidos-'.$contenido['idContenidos'].'-'.date("Y-m-d").random_int(100, 999);
	if($imagenAnterior != ''){
		$nombre_fichero = '../'.$imagenAnterior;
		if (file_exists($nombre_fichero)) {
			$respuestaBorra = File::borrarImagen($imagenAnterior);
		}
		//echo $respuestaBorra;
	}
	$respuesta = File::subirImagen($directorio, $imagen, $nombrearchivo);
	$respuestaJson = json_encode($respuesta, true);
	echo $respuestaJson;
}




// elementos
if(isset($_POST["verElemento"])) { 
	$idElemento = $_POST["verElemento"];
	$respuesta = ControladorExperiencia::ctrTraeUnElemento($idElemento,$token);
	echo $respuesta;
}
if(isset($_POST['activaElemento'])) {
	$activaContenido = json_decode($_POST['activaElemento'], true);
	$respuesta = ControladorExperiencia::ctrActivaDesactivaElemento($activaContenido,$token);
	echo $respuesta;
}
if(isset($_POST['modificaElemento'])) {
	$modificaElemento = json_decode($_POST['modificaElemento'], true);
	$respuesta = ControladorExperiencia::ctrModificaElemento($modificaElemento,$token);
	echo $respuesta;
}
if(isset($_POST['modificaBackgroundElemento'])) {
	$contenido = json_decode($_POST['modificaBackgroundElemento'], true);
	$imagenAnterior = $categoria['imagenAnterior'];
	$imagen = $contenido['imagen'];
	$directorio = 'vistas/img/elementos/'.$contenido['idElementos'];
	$nombrearchivo = 'me-elementos-'.$contenido['idElementos'].'-'.date("Y-m-d").random_int(100, 999);
	if($imagenAnterior != ''){
		$nombre_fichero = '../'.$imagenAnterior;
		if (file_exists($nombre_fichero)) {
			$respuestaBorra = File::borrarImagen($imagenAnterior);
		}
	}
	$respuesta = File::subirImagen($directorio, $imagen, $nombrearchivo);
	$respuestaJson = json_encode($respuesta, true);
	echo $respuestaJson;
}




// categoria
if(isset($_POST['subirCategoria'])) {
	$categoria = json_decode($_POST['subirCategoria'], true);
	$respuesta = ControladorExperiencia::ctrSubirCategoria($categoria,$token);
	echo $respuesta;
}
if(isset($_POST['verCategoria'])) {
	$idcategoria = $_POST['verCategoria'];
	$respuesta = ControladorExperiencia::ctrTraeTodoCategoria($idcategoria,$token);
	echo $respuesta;
}
if(isset($_POST['modificaCategoria'])) {
	$categoriaModifica = json_decode($_POST['modificaCategoria'], true);
	$respuesta = ControladorExperiencia::ctrModificaCategoria($categoriaModifica,$token);
	echo $respuesta;
}
if(isset($_POST['activaCategoria'])) {
	$activaCategoria = json_decode($_POST['activaCategoria'], true);
	$respuesta = ControladorExperiencia::ctrActivaDesactivaCategoria($activaCategoria,$token);
	echo $respuesta;
}
if(isset($_POST['activaAE'])) {
	$activaCategoria = json_decode($_POST['activaAE'], true);
	$respuesta = ControladorExperiencia::ctrActivaDesactivaAE($activaCategoria,$token);
	echo $respuesta;
}
if(isset($_POST['modificaBackgroundCategoria'])) {
	$categoria = json_decode($_POST['modificaBackgroundCategoria'], true);
	$imagenAnterior = $categoria['imagenAnterior'];
	$imagen = $categoria['imagen'];
	$directorio = 'vistas/img/categoria/'.$categoria['idCategoria'];
	$nombrearchivo = 'me-categoria-'.$categoria['idCategoria'].'-'.date("Y-m-d").random_int(100, 999);
	if($imagenAnterior != ''){
		$nombre_fichero = '../'.$imagenAnterior;
		if (file_exists($nombre_fichero)) {
		    $respuestaBorra = File::borrarImagen($imagenAnterior);
		} 
	}
	$respuesta = File::subirImagen($directorio, $imagen, $nombrearchivo);
	$respuestaJson = json_encode($respuesta, true);
	echo $respuestaJson;
}




//faq
if(isset($_POST['verFaq'])) {
	$idFaq = $_POST['verFaq'];
	$respuesta = ControladorExperiencia::ctrTraeUnaFaq($idFaq,$token);
	echo $respuesta;
}
if(isset($_POST['subirFaq'])) {
	$addFaq = json_decode($_POST['subirFaq'], true);
	$respuesta = ControladorExperiencia::ctrAddFaq($addFaq,$token);
	echo $respuesta;
}
if(isset($_POST['activaFaq'])) {
	$activaCategoria = json_decode($_POST['activaFaq'], true);
	$respuesta = ControladorExperiencia::ctrActivaDesactivaFaq($activaCategoria,$token);
	echo $respuesta;
}
if(isset($_POST['modificaFaq'])) {
	$faqModifica = json_decode($_POST['modificaFaq'], true);
	$respuesta = ControladorExperiencia::ctrModificaFaq($faqModifica,$token);
	echo $respuesta;
}




//Autores
if(isset($_POST['verAutor'])) {
	$idAutor = $_POST['verAutor'];
	$autorRerspuesta = array();
	$respuesta = ControladorExperiencia::ctrBuscoAutores(null,$token);
	$arrayAutores = json_decode($respuesta, true);
	foreach($arrayAutores as $autor){
		//var_dump($autor);
		if($autor['idAutores'] == $idAutor){
			array_push($autorRerspuesta, $autor);
		}
	}
	echo json_encode($autorRerspuesta, true);
}
if(isset($_POST['subirAutor'])) {
	$addAutor = json_decode($_POST['subirAutor'], true);
	$respuesta = ControladorExperiencia::ctrAddAutor($addAutor,$token);
	echo $respuesta;
}
if(isset($_POST['activaAutor'])) {
	$activaAutor = json_decode($_POST['activaAutor'], true);
	$respuesta = ControladorExperiencia::ctrActivaDesactivaAutor($activaAutor,$token);
	echo $respuesta;
}
if(isset($_POST['modificaAutor'])) {
	$autorModifica = json_decode($_POST['modificaAutor'], true);
	$respuesta = ControladorExperiencia::ctrModificaAutor($autorModifica,$token);
	echo $respuesta;
}


//banner
if(isset($_POST['activaBanner'])) {
	$activaBanner = json_decode($_POST['activaBanner'], true);
	$respuesta = ControladorExperiencia::ctrActivaDesactivaBanner($activaBanner,$token);
	echo $respuesta;
}




//comentarios
if(isset($_POST['activaComentario'])) {
	$activaComentario = json_decode($_POST['activaComentario'], true);
	$respuesta = ControladorExperiencia::ctrActivaDesactivaComentario($activaComentario,$token);
	echo $respuesta;
}
if(isset($_POST['borraComentario'])) {
	$borraComentario = json_decode($_POST['borraComentario'], true);
	$respuesta = ControladorExperiencia::ctrborraComentario($borraComentario,$token);
	echo $respuesta;
}


//usuarios
if(isset($_POST['activaUsuarios'])) {
	$activaUsuarios = json_decode($_POST['activaUsuarios'], true);
	$respuesta = ControladorExperiencia::ctrActivaDesactivaUser($activaUsuarios,$token);
	echo $respuesta;
}

//contenido destacado
if(isset($_POST['destacaContenido'])) {
	$idContenido = $_POST['destacaContenido'];
	$item = 'home/';
	$valor = 1;
	$traeContenido = ModeloExperiencia::mdlTraerDatos($item,$valor, $token);
	$home = json_decode($traeContenido, true);
	if($idContenido != ''){
		$home['contenidoId']=$idContenido;
		$item2 = 'home/modify/1';
		$modificaHome = ModeloExperiencia::mdlGuardaDatosExperiencia($item2, $home, $token);
		echo $modificaHome;
	} else {
		echo $home[0]['contenidoId'];
	}
}


//tyc
if(isset($_POST['verTyc'])) {
	$idTyc = $_POST['verTyc'];
	$respuesta = ControladorExperiencia::ctrTraeUnaTyc($idTyc,$token);
	echo $respuesta;
}
if(isset($_POST['subirTyc'])) {
	$addtyc = json_decode($_POST['subirTyc'], true);
	$respuesta = ControladorExperiencia::ctrAddTyc($addtyc,$token);
	echo $respuesta;
}
if(isset($_POST['activaTyc'])) {
	$activaCategoria = json_decode($_POST['activaTyc'], true);
	$respuesta = ControladorExperiencia::ctrActivaDesactivaTyc($activaCategoria,$token);
	echo $respuesta;
}
if(isset($_POST['modificaTyc'])) {
	$tycModifica = json_decode($_POST['modificaTyc'], true);
	$respuesta = ControladorExperiencia::ctrModificaTyc($tycModifica,$token);
	echo $respuesta;
}


//PP
if(isset($_POST['verPp'])) {
	$idPp = $_POST['verPp'];
	$respuesta = ControladorExperiencia::ctrTraeUnaPp($idPp,$token);
	echo $respuesta;
}
if(isset($_POST['subirPp'])) {
	$addPp = json_decode($_POST['subirPp'], true);
	$respuesta = ControladorExperiencia::ctrAddPp($addPp,$token);
	echo $respuesta;
}
if(isset($_POST['activaPp'])) {
	$activaCategoria = json_decode($_POST['activaPp'], true);
	$respuesta = ControladorExperiencia::ctrActivaDesactivaPp($activaCategoria,$token);
	echo $respuesta;
}
if(isset($_POST['modificaPp'])) {
	$ppModifica = json_decode($_POST['modificaPp'], true);
	$respuesta = ControladorExperiencia::ctrModificaPp($ppModifica,$token);
	echo $respuesta;
}


//giftCard
if(isset($_POST['activaGift'])) {
	$activaGift = json_decode($_POST['activaGift'], true);
	$respuesta = ControladorExperiencia::ctrActivaDesactivaGift($activaGift,$token);
	echo $respuesta;
}


if(isset($_POST['cambiaFree'])) {
	$cambiaFree = json_decode($_POST['cambiaFree'], true);
	$respuesta = ControladorExperiencia::ctrCambiaFree($cambiaFree,$token);
	echo $respuesta;

}