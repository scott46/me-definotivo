<?php 

/**
* Clase de conexión a la base de datos
*
* Se conecta a la base de datos definida en la configuración (config/database.php)
* y devuelve un objeto Mysqli con la conexión actual.
*
*/
class DB{

	private static $instancia = null;

	/**
	* Obtiene un objeto mysqli conectado a la base de datos
	*/
	public static function obtener(){

		if(DB::$instancia == null){
			$db = Config::obtener('database');
			$mysqli = new mysqli(
				$db->hostname, 
				$db->username, 
				$db->password, 
				$db->database
			);
			if($mysqli->connect_errno AND ENV == 'desarrollo'){
			    echo "Fallo al contectar a MySQL: (" .$mysqli->connect_errno. ") ".$mysqli->connect_error;
			}

			$mysqli->set_charset( $db->charset );

			DB::$instancia = $mysqli;
		}
		return DB::$instancia;
	}

	// Dejo estos métodos vacíos para evitar que se pueda crear objetos de esta clase
	private function __construct(){}
    private function __clone() {}
    private function __wakeup() {}
}