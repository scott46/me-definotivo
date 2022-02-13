<?php

/** 
* Clase base para todos los modelos
*/
abstract Class Base{

	protected $traducciones;

	/** 
	* Carga perezosa para algunas propiedades
	* @param string $propiedad Variable a cargar
	*
	*/
	public function &__get($propiedad) {
	    switch($propiedad) {
			default:
				if(method_exists( $this, $propiedad )){
					$this->$propiedad = $this->$propiedad();
				}
	    }
		return $this->$propiedad;
	}


	/** 
	* Constructor
	* @param array $datos Recibe todos los datos con los que se va a construir el objeto
	*/
	protected function __construct($datos){}


	/** 
	* Obtiene los elementos filtrados desde la base de datos
	* @param filtros Puede ser: todos, id o un array con cualquiera de esos filtros
	*/
	public static function obtener( $filtros = array('todos' => ''), $dato = null, $modelo = '', $tabla = ''){

		$filtros = !is_array($filtros) ? array($filtros => $dato) : $filtros;

		if(array_key_exists('id', $filtros) AND $filtros['id'] == 0){
			return null;
		}

		$db = DB::obtener();

		//$sql = $modelo::sql($tabla, $modelo, $filtros);
		$sql = call_user_func_array(array($modelo,'sql'), array($tabla, $modelo, $filtros));

		if( isset($_GET['sql']) AND $_GET['sql']=='wdjat' ){
			//$GLOBALS['log'][] = $modelo.' - '.$sql;
			echo $modelo.' - '.$sql;
		}

		if(! ($result = $db->query( $sql ))){
			return null;
		}

		$elementos = array();
		if( $result->num_rows>0 ){
			while( $datos = $result->fetch_object() ){
				$elementos[] = new $modelo( $datos );
			}
		}

		return (array_key_exists( 'id', $filtros ) OR 
				array_key_exists( 'ultima', $filtros ) OR 
				array_key_exists( 'uri', $filtros )) ? ( count($elementos)>0 ? reset($elementos) : null ): $elementos;
	}


	/** 
	* Crea el SQL para obtener los elementos de la base de datos
	* @param filtros Puede ser: todos, id o un array con cualquiera de esos filtros
	*/
	protected static function sql($tabla, $modelo, $filtros){

		$sql = array(
			'select'   => array(),
			'from'     => array(),
			'where'    => array(),
			'group_by' => array(),
			'order'    => array(),
			'limit'    => array(),
		);

		foreach($filtros AS $tipo => $dato){

			//$filtro = $modelo::filtro($tabla, $tipo, $dato);
			$filtro = call_user_func_array(array($modelo,'filtro'), array($tabla, $tipo, $dato));
			foreach($sql AS $clausula => $sentencias){
				if(array_key_exists($clausula, $filtro)){
					$sql[ $clausula ][] = $filtro[ $clausula ];
				}
			}
		}

		// Construyo el SQL y agrego los valores por defecto
		foreach($sql AS $clausula => $sentencias){

			$sql[ $clausula ] = call_user_func_array(
				array($modelo,'sql_defecto'),
				array($tabla, $clausula, $sentencias)
				);
		}

		return implode(' ', $sql);
	}


	/** 
	* Construye el SQL para los distintos filtros
	*/
	protected static function filtro($tabla, $tipo, $dato = null){
		$filtro = array();
		switch($tipo){
			case 'id':
				$filtro = array(
					'where'  => $tabla.'.id = '.intval($dato),
					'limit'  => '1',
				);
				break;

			case 'ultimos':
			case 'ultimas':
				$filtro = array(
					'limit'  => $dato ? intval($dato) : 1,
				);
				break;

			case 'ultima':
				$filtro = array(
					'limit'  =>  1,
				);
				break;

			case 'activa':
			case 'activo':
			case 'destacada':
			case 'destacado':
				$filtro = array(
					'where'  => $tabla.'.'.$tipo.' = 1',
				);
				break;

			case 'grupo':
				if($dato){
					$filtro = array(
						'where'  => $tabla.'.id IN ('.implode(',',array_map('intval', $dato)).')',
					);

				}else{
					$filtro = array(
						'where'  => '1 != 1',
					);
				}
				break;

			case 'excluir':
				$excluir = is_array($dato) ? implode(',',array_map('intval', $dato)) : intval($dato);
				if($excluir){
					$filtro = array(
						'where'  =>  $tabla.'.id NOT IN('.$excluir.')',
					);
				}
				break;

			case 'limit':
				if(is_array($dato)){
					$limit = intval($dato[0]).', '.intval($dato[1]);
				}else{
					$limit = intval($dato);
				}
				$filtro = array(
					'limit' => $limit,
				);
				break;

			case 'random':
				$filtro = array(
					'order'  => 'RAND() ASC',
				);
				break;

			case 'uri':
				$db = DB::obtener();
				$filtro = array(
					'where'  => $tabla.'.uri = "'.$db->real_escape_string(mb_strtolower($dato,'utf-8')).'"',
					'limit'  => '1',
				);

			case 'todos':
			case 'todas':
				// No se aplica ningún filtro.
				break;
		}

		return $filtro;
	}


	/** 
	* Traduce una propiedad
	*/
	public function traducir($propiedad, $idioma = IDIOMA){
		if( trim($this->traducciones[$propiedad.'_'.$idioma])=='' ){
			if($idioma != Idioma::defecto()){
				$idioma = Idioma::defecto();

			}else{
				// Obtengo un array de todos los otros idiomas disponibles
				$idiomas_disponibles = Idioma::idiomasDisponibles();
				if(($key = array_search(Idioma::defecto(), $idiomas_disponibles)) !== false) {
				    unset($idiomas_disponibles[$key]);
				}
				$idioma = !empty($idiomas_disponibles) ? array_shift($idiomas_disponibles) : Idioma::defecto();
			}
		}

		return $this->traducciones[$propiedad.'_'.$idioma];
	}


	/** 
	* Carga las traducciones de las propiedades seleccionadas
	* Genera las propiedades con traducción en cada idioma y crea una propiedad
	* genérica (sin el prefijo de idioma)
	*/
	protected function cargar_traducciones($propiedades, $datos){
		foreach($propiedades as $propiedad){
			foreach(Idioma::idiomasDisponibles() as $idioma){
				$campo_idioma = $propiedad."_".$idioma;
				$this->formatear_propiedad($campo_idioma, $datos->$campo_idioma);
			}
			$this->$propiedad = $this->traducir($propiedad, IDIOMA);
		}
	}


	/** 
	* Le da fomato a una propiedad
	* Especifica las reglas que le dan formato a las propiedades.
	* Por defecto no se le da ningún formato.
	*/
	protected function formatear_propiedad($propiedad_nombre, $propiedad_valor){
		$this->traducciones[$propiedad_nombre] = $propiedad_valor;
	}


	/**
	* Define el SQL por defecto para cada cláusula
	*/
	protected static function sql_defecto($tabla, $clausula, $sentencias){
		switch($clausula){
			case 'select' :
				return 'SELECT '.$tabla.'.* '.(!empty($sentencias) ? ', '.implode(',', $sentencias) : '');

			case 'from' :
				return 'FROM '.$tabla.' '.(!empty($sentencias) ? implode(' ', $sentencias) : '');

			case 'where' :
				return !empty($sentencias) ? 'WHERE ('.implode(' AND ', $sentencias).') ' : '';

			case 'group_by' :
				return !empty($sentencias) ? 'GROUP BY '.implode(',', $sentencias) : '';

			case 'order' :
				return 'ORDER BY '.(!empty($sentencias) ? implode(',', $sentencias).',' : '').' '.$tabla.'.orden ASC, '.$tabla.'.id ASC';

			case 'limit' :
				return !empty($sentencias) ? 'LIMIT '.trim($sentencias[0]) : '';
		}
	}
}