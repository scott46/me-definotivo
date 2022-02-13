<?php


var_dump($_FILES);



if(isset($_FILES['video']['tmp_name'])) {


    var_dump($_FILES['video']);


    echo $_FILES['video']['tmp_name'].'<br>';
    echo $_FILES['video']['type'].'<br>';
    echo $_FILES['video']['name'].'<br>';

	// $curl = curl_init();

 //    $url = "https://resetea.com.ar/contenidos/addvideo/185";
    
 //    $cfile = new CURLFile($_FILES['video']['tmp_name'],$_FILES['video']['type'],$_FILES['video']['name']);
 //    $data = array('files' => $cfile);

 //    curl_setopt($curl, CURLOPT_URL, $url);
 //    curl_setopt($curl, CURLOPT_POST,true);
 //    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
 //    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer admin']);

 //    $resultado = curl_exec($curl);
 //    curl_close($curl);
 //    // return $resultado;
 //    var_dump ($resultado);



}else{
    echo 'eero';
}