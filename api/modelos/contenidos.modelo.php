<?php


class modeloContenidos {

        public const MY_PUBLIC = 'https://resetea.com.ar';
        //public const MY_PUBLIC = 'http://34.121.172.16:3050';


        // Agregar usuario
	static public function mdlMostrarDatos($link, $token) {
                //var_dump($user);
                $url = self::MY_PUBLIC."/".$link;
                $envioJSON = 'null';
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POST, FALSE);
                curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.$token.'']);
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
                //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $resultado = curl_exec($curl);
                curl_close($curl);
                return $resultado;

        }


        static public function mdlMostrarArchivos($link, $token) {
                ini_set("memory_limit", "-1");
                $url = self::MY_PUBLIC."/".$link;
                $agent = " Googlebot/2.1 (+http://www.google.com/bot.html)"; // es el navegador que usaremos
                $timeout = 50;
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_USERAGENT, $agent); // establece el navegador
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.$token.'']);
                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
                $resultado = curl_exec($curl);
                curl_close($curl);
                //return $resultado;
                return $resultado;
        }


}