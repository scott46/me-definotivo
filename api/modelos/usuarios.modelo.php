<?php

//require_once "conexion.php";


class modeloUsuarios {

        public const MY_PUBLIC = 'https://resetea.com.ar';
        //public const MY_PUBLIC = 'http://34.121.172.16:3050';

        // Agregar usuario
	static public function mdlAddUser($user) {
                //var_dump($user);
                $url = self::MY_PUBLIC."/usuarios/add";
                $envioJSON = json_encode($user);
                //$envioJSON = json_encode($productos); 
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POST, FALSE);
                curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json']);
                curl_setopt($curl, CURLOPT_POST, 1);
                //curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
                //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $resultado = curl_exec($curl);
                curl_close($curl);
                return $resultado;
        }


        // validar email
        static public function mdlValidarEmail($valor) {
                $url = self::MY_PUBLIC."/usuarios/verificar";
                $envioJSON = json_encode($valor);
                //$envioJSON = json_encode($productos); 
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POST, FALSE);
                curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json']);
                curl_setopt($curl, CURLOPT_POST, 1);
                //curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
                //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $resultado = curl_exec($curl);
                curl_close($curl);
                return $resultado;
        }


        // inicio de session
        static public function mdlInicioSessionDirecto($valor) {
                $url = self::MY_PUBLIC."/usuarios/login";
                $envioJSON = json_encode($valor);
                //var_dump($envioJSON);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $envioJSON);
                $result = curl_exec($ch);
                curl_close($ch);

                return $result;
        }


        // olvide contraseña
        static public function mdlOlvideContrasena($email) {
                $url = self::MY_PUBLIC."/usuarios/resetask";
                $dato = array (
                        'usuario' => $email
                );
                $envioJSON = json_encode($dato);
                //$envioJSON = json_encode($productos); 
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POST, FALSE);
                curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json']);
                curl_setopt($curl, CURLOPT_POST, 1);
                //curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
                //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $resultado = curl_exec($curl);
                curl_close($curl);
                return $resultado;
        }

        // genera nueva contraseña
        static public function mdlNuevaContrasena($dato) {
                $url = self::MY_PUBLIC."/usuarios/changepassword";
                $envioJSON = json_encode($dato);
                //$envioJSON = json_encode($productos); 
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POST, FALSE);
                curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json']);
                curl_setopt($curl, CURLOPT_POST, 1);
                //curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
                //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $resultado = curl_exec($curl);
                curl_close($curl);
                return $resultado;
        }


        // reenvia email de verificacion
        static public function mdlReenviaEmailVarificacion($email) { 
                $url = self::MY_PUBLIC."/usuarios/reverificar";
                $dato = array (
                        'usuario' => $email
                );
                $envioJSON = json_encode($dato);
                //$envioJSON = json_encode($productos); 
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POST, FALSE);
                curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json']);
                curl_setopt($curl, CURLOPT_POST, 1);
                //curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
                //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $resultado = curl_exec($curl);
                curl_close($curl);
                return $resultado;
        }


        static public function mdlBuscaMEDatos($link, $valor, $token) {
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
                $resultado = curl_exec($curl);
                curl_close($curl);
                return $resultado;
        }
        
        static public function mdlBuscaHome($item, $valor) {
                $url = self::MY_PUBLIC.'/'.$item.$valor;
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POST, FALSE);
                $headers[] = "Authorization: Bearer admin";
                curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt( $curl, CURLOPT_FAILONERROR, true);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $resultado = curl_exec($curl);
                curl_close($curl);
                return $resultado;
        }

        static public function mdlModificaDatosUser($link, $user, $token) {
                //var_dump($user);
                $url = self::MY_PUBLIC."/".$link;
                $envioJSON = json_encode($user);
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POST, FALSE);
                curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json', 'Authorization: Bearer '.$token.'']);
                curl_setopt($curl, CURLOPT_POST, 1);
                //curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($curl, CURLOPT_POSTFIELDS, $user);
                //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $resultado = curl_exec($curl);
                curl_close($curl);
                return $resultado;
        }

                      

}
