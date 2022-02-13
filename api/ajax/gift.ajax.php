<?php

require_once '../forms/core/Emails.php';

// envia email
if(isset($_POST['enviaEmailGift'])) { 
    echo 'recibido';
    $data = json_decode($_POST['enviaEmailGift'], true);
    $email = $data['email'];
    $codigo = $data['codigo'];
    $texto = $data['texto'];
    $quienRegala = $data['quienRegala'];
    var_dump($data);
    $tipo = ['motivo' => 'enviaCodigo','codigo' => $codigo, 'texto' => $texto, 'quienRegala' => $quienRegala];
    $usuario = (object) [
        'email' => $email
    ];
    $enviar = Email::send($usuario, $tipo);
    echo $enviar;
}


