<?php

class modeloCarrito {

    public const MY_PUBLIC = 'https://resetea.com.ar';
    //public const MY_PUBLIC = 'http://34.121.172.16:3050';

    // Agregar usuario
    static public function mdlProductos($link, $valor, $token) {
        //var_dump($user);
        
        $url = self::MY_PUBLIC.'/'.$link.$valor;
        $envioJSON = 'null';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, FALSE);
        $headers[] = "Authorization: Bearer ".$token;
        curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POST, 1);
        //curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $resultado = curl_exec($curl);
        curl_close($curl);
        return $resultado;
    }

    static public function mdlMostrarProductos($link, $valor, $token) {
        //var_dump($user);

        $url = self::MY_PUBLIC.'/'.$link.$valor;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, FALSE);
        $headers[] = "Authorization: Bearer ".$token;
        curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt( $curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);
        $resultado = curl_exec($curl);
        curl_close($curl);
        return $resultado;
    }

    static public function mdlCompraOK($link, $token, $arrayCompra) {
        $url = self::MY_PUBLIC.'/'.$link;
        $envioJSON = json_encode($arrayCompra);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, FALSE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json', 'Authorization: Bearer '.$token.'']);
        curl_setopt($curl, CURLOPT_POST, 1);
        //curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $resultado = curl_exec($curl);
        curl_close($curl);
        return $resultado;
    }


    static public function mdlTreMisProductos($link, $token) {
        //var_dump($user);
        $url = self::MY_PUBLIC.'/'.$link;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, FALSE);
        $headers[] = "Authorization: Bearer ".$token;
        curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        //curl_setopt( $curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);
        $resultado = curl_exec($curl);
        curl_close($curl);
        return $resultado;
    }

    static public function mdlGiftAdd($link, $token, $data) { 

        $url = self::MY_PUBLIC.'/'.$link;
        $envioJSON = json_encode($data);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, FALSE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json', 'Authorization: Bearer '.$token.'']);
        curl_setopt($curl, CURLOPT_POST, 1);
        //curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $resultado = curl_exec($curl);
        curl_close($curl);
        return $resultado;

    }

    static public function mdlGiftOk($link, $token, $arrayCompra) {
        //var_dump($user);
        //var_dump($arrayCompra);

        $url = self::MY_PUBLIC.'/'.$link;
        $envioJSON = json_encode($arrayCompra);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, FALSE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json', 'Authorization: Bearer '.$token.'']);
        curl_setopt($curl, CURLOPT_POST, 1);
        //curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $resultado = curl_exec($curl);
        curl_close($curl);
        return $resultado;
    }


    static public function mdlCanjeaGift($link, $token) {
        //var_dump($user);
        $url = self::MY_PUBLIC.'/'.$link;
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

}