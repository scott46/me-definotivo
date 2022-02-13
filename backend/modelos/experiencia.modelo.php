<?php





class ModeloExperiencia {

    //public const MY_PUBLIC = 'http://34.121.172.16:3050';
    public const MY_PUBLIC = 'https://resetea.com.ar';

    static public function mdlTraerDatos($item, $valor, $token) {
        $url = self::MY_PUBLIC."/".$item."/".$valor;
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


	static public function mdlGuardaDatosExperiencia($item, $valor, $token) {
	    $url = self::MY_PUBLIC."/".$item;
	    $envioJSON = json_encode($valor);
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


    static public function mdlGuardaDatosContenido($item, $valor, $token) {
        $url = self::MY_PUBLIC."/".$item;
        $envioJSON = json_encode($valor);
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

    

    static public function mdlSubirVideo($id, $valor, $token) {
        $curl = curl_init();
        $url = self::MY_PUBLIC."/elementos/addvideo/".$id;
        $cfile = new CURLFile($valor['tmp_name'],$valor['type'],$valor['name']);
        $data = array('files' => $cfile);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST,true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.$token.'']);
        $resultado = curl_exec($curl);
        curl_close($curl);
        return $resultado;
    }




    static public function mdlTraeVideo($valor, $token) {
        //$valor = 161;
        $url = self::MY_PUBLIC."/elementos/getelement/".$valor;
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


    static public function mdlTraeTodoContenido($valor, $token) {
        //$valor = 161;/contenidos/id/159
        $url = self::MY_PUBLIC."/elementos/idcontenido/".$valor;
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


    static public function mdlTraeUnContenido($valor, $token) {
        //$valor = 161;/contenidos/id/159
        $url = self::MY_PUBLIC."/contenidos/id/".$valor;
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

    
    static public function mdlTraeUnElemento($valor, $token) {
        //$valor = 161;/contenidos/id/159
        $url = self::MY_PUBLIC."/elementos/id/".$valor;
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




    static public function mdlTraeCategoria($valor, $token) {
        //$valor = 161;/contenidos/id/159
        $url = self::MY_PUBLIC."/categorias/".$valor;
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

    static public function mdlTraeUnaFaq($valor, $token) {
        //$valor = 161;/contenidos/id/159
        $url = self::MY_PUBLIC."/faq/id/".$valor;
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




    // agrega faq y autor
    static public function mdlAddComponente($link, $addFaq, $token) {
        $url = self::MY_PUBLIC."/".$link;
        $envioJSON = json_encode($addFaq);
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

    
    //modifica una categoria y FAQ
    static public function mdlModificaComponentes($item, $categoria, $id, $token) {
        $url = self::MY_PUBLIC.'/'.$item.'/'.$id;
        $envioJSON = json_encode($categoria);
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

    //activa desactiva categoria Y faq
    static public function mdlActivaDesactivaComponentes($item, $id, $token) {
        // echo $item;
        // echo $id;
        // echo $token;
        $url = self::MY_PUBLIC.'/'.$item.'/'.$id;
        $envioJSON = '';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, FALSE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.$token.'']);
        curl_setopt($curl, CURLOPT_POST, 1);
        //curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
        //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $resultado = curl_exec($curl);
        curl_close($curl);
        return $resultado;
    }

    //busco todos los autores
	static public function mdlBuscoAutores($item, $valor, $token) {
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



    //borro comentarios
	static public function mdlborraComentario($link, $token) {
        
	    $url = self::MY_PUBLIC."/".$link;
	    //$envioJSON = json_encode($valor);
        $envioJSON = '';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, FALSE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.$token.'']);
        curl_setopt($curl, CURLOPT_POST, 1);
        //curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
        //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $resultado = curl_exec($curl);
        curl_close($curl);
        return $resultado;

	}

    //trae compronentes
    static public function mdlVerComponente($valor, $token) {
        //$valor = 161;/contenidos/id/159
        $url = self::MY_PUBLIC."/".$valor;
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


    static public function mdlCambiaFree ($esPreview,$token, $item, $valor) {
        $url = self::MY_PUBLIC."/".$item.$valor;
        $envioJSON = json_encode($esPreview); 
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json', 'Authorization: Bearer '.$token.'']);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
        //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $resultado = curl_exec($curl);
        curl_close($curl);
        return $resultado;

    }


}

