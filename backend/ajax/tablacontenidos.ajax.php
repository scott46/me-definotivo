<?php 

require_once "../controladores/tablas.controlador.php";
require_once "../modelos/tablas.modelo.php";
require_once "../controladores/experiencia.controlador.php";
require_once "../modelos/experiencia.modelo.php";


session_start();

class TablaCategorias{
	/*=============================================
	Tabla Tags
	=============================================*/ 
	public function mostrarTabla(){
		
		if(isset($_SESSION["tokenBack"])) {
			$token = $_SESSION["tokenBack"];
		} else {
			$token = null;
		}

		$respuesta = TablasControlador::crtMostrarTablas('contenidos', null, $token);
		$arrayrta = json_decode($respuesta, true);
		//var_dump($arrayrta);
		$respuestaCat = TablasControlador::crtMostrarTablas('categorias', null, $token);
		$arrayrtaCat = json_decode($respuestaCat, true);



		if($arrayrta == NULL){
			$datosJson = '{"data":[]}';
			echo $datosJson;
			return;
		} else {
			$array = json_decode($respuesta, true);
			$datosJson = '{
			"data":[';
			foreach ($array as $key => $value) {

				foreach ($arrayrtaCat as $categoria) {
					if($value['categoriaId'] == $categoria['idCategorias']) {
						$nombreCategoria = ucfirst(strtolower(substr($categoria['titulo1'], 0, 30).' ...'));
					}
				}

				$respuestaElementos = ControladorExperiencia::ctrTraeTodoContenido($value["idContenidos"], 'admin');
				$arrayrtaElementos = json_decode($respuestaElementos, true);
				if($arrayrtaElementos != NULL){
					$cantidad = count($arrayrtaElementos);
				}else {
					$cantidad = 0;
					$tipoContenido = '';
				}

				$desde = strtotime(date('d-m-Y H:i:00',strtotime($value["vigenciaDesde"])));
				$hasta = strtotime(date('d-m-Y H:i:00',strtotime($value["vigenciaHasta"])));
				$hoy = strtotime(date("d-m-Y H:i:00",time()));
				if($hoy >= $desde && $hoy <= $hasta) {
					$estadoVigencia = "<div>VIGENTE</div>";
				} else if($hoy < $desde ) {
					$estadoVigencia = "<div>PROXIMAMENTE</div>";
				} else {
					$estadoVigencia = "<div class='text-danger text-bold'>VENCIDO</div>";
				}


				if($value['activo'] == 0) {
					$estado = "<div class='text-center'><button title='Activa el contenido' class='btn btn-outline-dark btn-sm btnActivar-contenido' estadoContenido='1' idContenido='".$value["idContenidos"]."'>Desactivado</button></div>";
				} else {
					$estado = "<div class='text-center'><button title='Desactiva el contenido' class='btn btn-dark btn-sm btnActivar-contenido' estadoContenido='0' idContenido='".$value["idContenidos"]."'>Activado</button></div>";
				}


				if($value['tipoContenidoId'] == 1) {
					$tipoContenido = 'Canal';
					$btnAgrega  = "<button title='Agregar elementos' class='btn btn-dark btn-sm agregaElemento mx-2' tipoContenido='".$value['tipoContenidoId']."' idContenidos='".$value["idContenidos"]."'><i class='fas fa-plus'></i></button>";
				} else {
					$tipoContenido = 'Exp única';
					if($cantidad >= 1){
						$btnAgrega  = "<span class='btn btn-ouline-primary btn-sm mx-2' idContenidos='".$value["idContenidos"]."'><i class='fas fa-plus'></i></span>";
					} else {
						$btnAgrega  = "<button class='btn btn-dark btn-sm agregaElemento mx-2' tipoContenido='".$value['tipoContenidoId']."' idContenidos='".$value["idContenidos"]."'><i class='fas fa-plus'></i></button>";
					}
				}

				$btnPreview = "<div style='text-align: center'><a title='Visualiza el contenido' class='btn btn-dark btn-sm' target='_blank' href='http://c2370883.ferozo.com/md/me/contenidoPreview?contenido=".$value['idContenidos']."'><i class='fas fa-eye'></i></a></div>";


				$acciones = "<div class='btn-group d-flex justify-content-arrow'>".$btnAgrega."<button title='Listado de elementos' class='btn btn-dark btn-sm verElementos mx-2' idContenidos='".$value["idContenidos"]."'><i class='far fa-list-alt'></i></button><button title='Edita Contenido' class='btn btn-dark btn-sm editarContenido mx-2' data-toggle='modal' data-target='#editarAdministrador' idContenido='".
				$value["idContenidos"]."'><i class='fas fa-pencil-alt'></i></button><button title='Edita Background Contenido' class='btn btn-dark btn-sm modificaBackground-contenido mx-2' idContenido='".$value["idContenidos"]."'><i class='fas fa-image'></i></button></div>";

				$preview = "<img style='width: 90px;height: auto' src='../backend/".$value["previewRuta"]."' alt='imagen'>";

				
				$datosJson .='[
						"'.$preview.'",
						"'.$value['orden'].'",
						"'.$value['titulo1'].'",
						"'.$tipoContenido.'",
						"'.$nombreCategoria.'",
						"$ '.$value['precioPesos'].'",
						"U$D '.$value['precioDolares'].'",
						"'.$cantidad.'",
						"'.$estadoVigencia.'",
						"'.$estado.'",
						"'.$btnPreview.'",
						"'.$acciones.'"
					    ],';

			}


			$datosJson = substr($datosJson, 0, -1);
			$datosJson .= ']}';
			echo $datosJson;
		}
	}
}

/*=============================================
Tabla Tags
=============================================*/ 
$tabla = new TablaCategorias();
$tabla -> mostrarTabla();



