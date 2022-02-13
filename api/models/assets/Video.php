<?php

Class Video{

	public $codigo;

	/** 
	* Constructor
	* @param array Recibe todas los datos necesarios para leer la BD
	*/
	function __construct($codigo){
		$this->codigo = $codigo;
	}


	/**
	* Obtener el HTMl del embed
	*/
	public function embed(){
		return '<div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="'.$this->embed_url().'" frameborder="0" allowfullscreen></iframe>
                </div> ';
	}

	/**
	* Obtener la URL del video para embeber
	*/
	public function embed_url(){
		return 'https://www.youtube.com/embed/'.$this->codigo;
	}

	/**
	* Obtener el thumbnail del video
	* @param $tipo Calidad de la foto. Opciones: default, sddefault, mqdefault, hqdefault, maxresdefault
	*/
	public function thumbnail($tipo = 'maxresdefault'){
		return 'https://img.youtube.com/vi/'. $this->codigo .'/'.$tipo.'.jpg';
	}

	/**
	* Obtener la URL del video para compartir
	*/
	public function url(){
		return 'https://www.youtube.com/watch?v='.$this->codigo;
	}

	/**
	* Chequear si el video existe
	*/
	public function existe(){

		if(! $this->codigo){
			return false;
		}
		
		$curl = curl_init($this->url());
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_exec($curl);

		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);

		if(isset($_GET['curl_error'])){
			echo 'httpCode: '.$httpCode.' URL: '.$this->url()."\n\n";
		}
		return $httpCode != 404 ? true : false;
	}

	/**
	* Obtener video
	*/
	static public function obtener($filtro = 'codigo', $codigo){
		$video = new Video($codigo);
		return $video->existe() ? $video : null;
	}


}