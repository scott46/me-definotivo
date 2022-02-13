<?php

Class Foto extends Base{

	public $src;
	public $alt;
	public $medidas = array();


	public $ancho = 0;
	public $alto  = 0;

	protected $src_default = array();
	protected $medida_default;
	protected $nombre;
	protected $ext;
	protected $en_galeria = false;
	protected $base_src;
	protected $invertir_medidas;


	/** Constructor
	* @param array Recibe todas los datos necesarios para leer la BD
	* @param array Configaración de la foto. Tiene la forma:
	*
	* array(
	* 	'medidas' => array(
	*		array(
	* 			'ancho' 		=> '',
	* 			'alto'  		=> '',
	* 			'src_default'  	=> '',
	*		)
	* 	),
	*
	* 	'controlador' => array(
	*		'nombre' => '',
	*		'id' 	=> ''
	* 	)
	* )
	*
	*/
	function __construct( $datos, $config ){
		$this->id 	  = $datos->id;
		$this->nombre 	  = $datos->nombre;
		$this->ext 		  = $datos->ext;
		$this->alt 		  = $datos->alt;
		$this->en_galeria = $datos->en_galeria;

		foreach($config['medidas'] AS $medida){

			$m = $medida['ancho'].'x'.$medida['alto'];
			if($datos->en_galeria){
				$this->base_src = 'galleries/'.$datos->galeria.'/';
			}else{
				$this->base_src = 'images/'.$config['controlador']['nombre'].'/'.$config['controlador']['id'].'/';
			}

			$this->medidas[] 	 = $m;
			$this->src_default[] = array_key_exists('src_default', $medida) ? $medida['src_default'] : false;
		}

		if($this->medida_default == null){
			$this->medida_default = $this->medidas[0];
		}

		$this->invertir_medidas = isset($config['invertir_medidas']) ? $config['invertir_medidas'] : true;


		$this->src = $this->src( $this->medida_default );
	}


	/** Obtener el src de una foto
	* @param string opcional Es la medida de la foto que se está pidiendo
	*
	*/
	public function src( $medida = '' ){

		if(! in_array($medida, $this->medidas)){
			$medida = $this->medida_default;
		}

		// Las fotos que no son galerías tienen las medidas al revez (solo en la ruta)
		if( !$this->en_galeria AND $this->invertir_medidas){
			$medida_ruta = substr($medida, strpos($medida, 'x')+1). 'x' .substr($medida, 0, strpos($medida, 'x'));
		}else{
			$medida_ruta = $medida;
		}

		$ruta = $this->base_src.$this->nombre.($medida=='autoxauto' ? '' : '_'.$medida_ruta).'.'.$this->ext;

		// Si está activada la opción DEBUG devuelvo la ruta construida
		if( isset($_GET['debug_foto']) ){
			return RESOURCES_PATH.$ruta;
		}

		// Si existe la foto devuelvo la ruta real
		if(defined('REMOTE_CMS') AND REMOTE_CMS){

			// Si existe la foto devuelvo la ruta real
			$curl = curl_init(REMOTE_BASE_URL.( stripos($ruta, 'images')===false  ? 'images/' : '').$ruta);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

			curl_exec($curl);

			$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			curl_close($curl);

			if(isset($_GET['h'])){
				echo 'httpCode: '.$httpCode.' URL: '.REMOTE_BASE_URL.$ruta.'// '."\n\n";
			}

			$file_exists = $httpCode != 404;
			
		}else{
			$file_exists = file_exists(RESOURCES_PATH.$ruta);
		}

		if( $file_exists ){
			$this->calcularMedidaActual($medida);
			return ((defined('REMOTE_CMS') AND REMOTE_CMS) ? REMOTE_BASE_URL : BASE_URL).( stripos($ruta, 'images')===false  ? 'images/' : '').$ruta.(!(defined('REMOTE_CMS') AND REMOTE_CMS) ? '?v='.filemtime(RESOURCES_PATH.$ruta) : '');
		}


		// Averiguo cuál es la foto por defecto
		$src_default_indice = array_search($medida, $this->medidas);
		if( $src_default_indice===false ){
			$src_default_indice = 0;
		}

		// Si no existe la foto devuelvo la foto por defecto para esa medida
		if( array_key_exists($src_default_indice, $this->src_default) AND
			$this->src_default[$src_default_indice]!='' ){
			$this->calcularMedidaActual($medida);
			return BASE_URL.'images/defecto/'.$this->src_default[$src_default_indice];
		}else{

		}

		return false;
	}


	/** Calcula y actualiza el alto y ancho actuales de la foto
	*
	*/
	public function calcularMedidaActual( $medidas ){

		//Invierto ancho y alto si no es una galería
		if( !$this->en_galeria ){
			$medidas = substr($medidas,  strpos($medidas, 'x')+1). 'x' .substr($medidas, 0, strpos($medidas, 'x'));
		}

		$this->alto = substr($medidas,  strpos($medidas, 'x')+1);
		$this->ancho = substr($medidas, 0, strpos($medidas, 'x'));
	}


	/** Obtener una foto
	* @param string Es la medida de la foto que se está pidiendo
	*
	*/
	static public function obtener($filtros = array(), $config = null, $modelo = 'Foto', $tabla = 'fotos'){

		//Leo de la BD
		if( ! array_key_exists('nombre', $filtros)){

			if(array_key_exists('id', $filtros) AND $filtros['id'] == 0){
				$foto = new Foto( (object) array(
					'id' => '0',
					'nombre' => 'foto-con-foto-por-defecto',
					'ext' => 'jpg',
					'alt' => '',
					'en_galeria' => 0), $config );
				// Si tiene foto por defecto la devuelvo, si no no devulvo nada.
				return $foto->src ? $foto : null;
			}

			if(array_key_exists('galeria', $filtros) AND $filtros['galeria'] <= 0){

				if( (array_key_exists('src_default', $config['medidas'][0]) AND !$config['medidas'][0]['src_default']) OR 
					!array_key_exists('src_default', $config['medidas'][0])){
					return array();
				}

				return array(new Foto( (object) array(
					'id' => '0',
					'nombre' => 'no-existe-galeria',
					'ext' => 'jpg',
					'alt' => '',
					'galeria' => 0,
					'en_galeria' => 1), $config ));
				
			}

			$db = DB::obtener();

			$sql = 'SELECT 	id,
						filename 	AS nombre,
						extension 	AS ext,
						epigrafe 	AS alt,
						galerias_id AS galeria,
						(CASE WHEN (galerias_id>0 AND galerias_id IN(SELECT id FROM galerias)) THEN 1 ELSE 0 END) AS en_galeria

					FROM fotos';

			foreach($filtros AS $f => $dato){
				switch( $f ){

					case 'id' :
						$sql .= ' WHERE fotos.id='.$dato.' LIMIT 1';
						break;

					case 'galeria' :
						$sql .= ' WHERE fotos.galerias_id='.$dato.' ORDER BY orden ASC, id ASC';
						break;
				}
			}

			if( isset($_GET['sql']) AND $_GET['sql']=='wdjat' ){
				echo 'FOTO - '.$sql;
			}
			// Consulto la BD
			$fotos = array();
			$result = $db->query( $sql );
			if( $result AND $result->num_rows>0 ){
				while( $datos = $result->fetch_object() ){
					$fotos[] = new Foto($datos, $config);
				}
			}

			// Reviso si la galería existía pero estaba vacía
			if(array_key_exists('galeria', $filtros) AND $filtros['galeria'] > 0 AND empty($fotos)){

				$cargar_default = false;
				foreach($config['medidas'] as $med){
					if($med['src_default']){
						$cargar_default = true;
						break;
					}
				}
				if( ! $cargar_default ){
					return array();

				}else{
					$foto = new Foto( (object) array(
						'id' => '0',
						'nombre' => 'no-existe-galeria',
						'ext' => 'jpg',
						'alt' => '',
						'galeria' => 0,
						'en_galeria' => 1), $config );
					return array($foto);
				}
			}

		//Creo la foto usando solamente la configuración
		}else{

			$datos = (object) array(
				'id' => '0',
				'nombre' => '0_'.$filtros['nombre'],
				'ext' => 'jpg',
				'alt' => '',
				'en_galeria' => 0,
			);
			$foto = new Foto( $datos, $config );
			if($foto->src){
				$fotos[] = $foto;
			}
		}

		if(array_key_exists('id', $filtros) OR array_key_exists('nombre', $filtros)){
			return !empty($fotos) ? $fotos[0] : null;
		}else{
			return $fotos;
		}
	}

	/** 
	* Actualiza la medida por defecto de una foto
	*/
	function actualizarMedidaDefecto($medida){
		if(in_array($medida, $this->medidas)){
			$this->medida_default = $medida;
			$this->src = $this->src($medida);
		}
	}

	/** Actualiza o agrega la foto por defecto de una medida
	*/
	function fotoDefault($medida, $src_default){
		if(in_array($medida, $this->medidas)){
			$src_default_indice = array_search($medida, $this->medidas);
			$this->src_default[ $src_default_indice ] = $src_default;
		}
	}

}
