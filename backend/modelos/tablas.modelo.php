<?php





class TablasModelo {

    public const MY_PUBLIC = 'https://resetea.com.ar';
	//public const MY_PUBLIC = 'http://34.121.172.16:3050';


	static public function mdlMostrarTablas($item, $valor, $token) {
	    $url = self::MY_PUBLIC."/".$item.$valor;
	    //$envioJSON = json_encode($valor);
	    $envioJSON = $valor; 
	    $curl = curl_init();
	    curl_setopt($curl, CURLOPT_URL, $url);
	    curl_setopt($curl, CURLOPT_POST, FALSE);
	    curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json', 'Authorization: Bearer '.$token.'']);
	    curl_setopt($curl, CURLOPT_POST, 1);
	    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
	    curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
	    //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	    $resultado = curl_exec($curl);
	    curl_close($curl);
	    return $resultado;

	}


	static public function mdlMostrarTablasUser($link, $valor, $token) {
		//var_dump($user);
		
		$url = self::MY_PUBLIC.'/usuarios/all';
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, FALSE);
		$headers[] = "Authorization: Bearer ".$token;
		curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt( $curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$resultado = curl_exec($curl);
		curl_close($curl);
		return $resultado;
	}

  	function mdlTraerDatosTyc() {
        $url = self::MY_PUBLIC."/tyc/all";
        $envioJSON = 'null';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, FALSE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer admin']);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
        //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $resultado = curl_exec($curl);
        curl_close($curl);
        return $resultado;
	}


  	function mdlTraerDatosPP() {
        $url = self::MY_PUBLIC."/politicas/all";
        $envioJSON = 'null';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, FALSE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer admin']);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
        //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $resultado = curl_exec($curl);
        curl_close($curl);
        return $resultado;
	}

	function mdlTraerDatosGC() {
        $url = self::MY_PUBLIC."/giftcard/all";
        $envioJSON = 'null';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, FALSE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer admin']);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
        //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $resultado = curl_exec($curl);
        curl_close($curl);
        return $resultado;
	}
}

