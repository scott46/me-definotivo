<?php

//require_once "conexion.php";


class modeloCategorias {

        public const MY_PUBLIC = 'https://resetea.com.ar';
        //public const MY_PUBLIC = 'http://34.121.172.16:3050';

        static public function mdlMostrarCaterogias($valor) {
                $url = self::MY_PUBLIC.'/categorias/'.$valor;
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
                curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
                $resultado = curl_exec($curl);
                curl_close($curl);
                return $resultado;
        }

        static public function mdlMostrarComponentes($valor) {
                $url = self::MY_PUBLIC.'/'.$valor;
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
                curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
                $resultado = curl_exec($curl);
                curl_close($curl);
                return $resultado;
        }
}