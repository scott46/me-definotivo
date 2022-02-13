<?php


class modeloComentarios {
    
    public const MY_PUBLIC = 'https://resetea.com.ar';
    //public const MY_PUBLIC = 'http://34.121.172.16:3050';

    // Agregar usuario
    static public function mdlAgregaComentario($comentario, $link, $token) {
	    $url = self::MY_PUBLIC."/".$link;
	    $envioJSON = json_encode($comentario);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, FALSE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json', 'Authorization: Bearer '.$token.'']);
        curl_setopt($curl, CURLOPT_POST, 1);
        //curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
        //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $resultado = curl_exec($curl);
        curl_close($curl);
        return $resultado;
    }

    static public function mdlSaberSiFueValuado($link, $token) {
	    $url = self::MY_PUBLIC."/".$link;
	    $envioJSON = '';
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

    static public function mdlAgregaValuacion($valuacion, $link, $token) {
	    $url = self::MY_PUBLIC."/".$link;
	    $envioJSON = json_encode($valuacion);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, FALSE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json', 'Authorization: Bearer '.$token.'']);
        curl_setopt($curl, CURLOPT_POST, 1);
        //curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
        //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $resultado = curl_exec($curl);
        curl_close($curl);
        return $resultado;
    }

	static public function mdlMostrarComentarios($link, $token) {
        //var_dump($user);
	    $url = self::MY_PUBLIC."/".$link;
	    $envioJSON = '';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, FALSE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json', 'Authorization: Bearer admin']);
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