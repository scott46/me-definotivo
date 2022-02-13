<?php 



class File {

    public static function subirImagen($directorio, $archivo, $nombrearchivo) {

        $newDirectorio = '../'.$directorio;

        //recupero el tamaño de las imagenes
        list($ancho, $alto) = getimagesize($archivo);
        $nuevoAncho = 1920;
        $nuevoAlto = 1080;
    
        // creo la carpeta
        if(!file_exists($newDirectorio)){   
            mkdir($newDirectorio, 0755, true);
        }
        
        //creo y copio la imagen
        $ruta = $newDirectorio."/".$nombrearchivo.".jpg";
        $newRuta = $directorio."/".$nombrearchivo.".jpg";
        $origen = imagecreatefromjpeg($archivo);
        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto); 
        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
        imagejpeg($destino, $ruta); 
    
        //retorna la ruta de la imagen
        return array(
            'resultado' => 'ok',
            'ruta' => $newRuta
        );

    }

    public static function borrarImagen($archivo) {

        unlink('../'.$archivo);
        //retorna la ruta de la imagen    
        return 'ok';

    }









}