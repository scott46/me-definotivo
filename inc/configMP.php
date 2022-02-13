<?php

    $price = 2000;
    $monto = base64_encode($price);
    $id = base64_encode(132131);
    $estado = base64_encode('approved');
    $moneda = base64_encode('Pesos');
    $proveedor = base64_encode('Mercado Pago');
    //mercado pgo de prueba
    require 'api/libs/vendor/autoload.php';
    MercadoPago\SDK::setAccessToken("TEST-6249239861962237-071602-dc159d42d1afaaf1038b93564c0bad4b-27757616");
    $preference = new MercadoPago\Preference();
    $item = new MercadoPago\Item();
    $item->title = 'ME';
    $item->quantity = 1;
    $item->unit_price = $price;
    $preference->items = array($item);
    $preference->back_urls = array(
        "success" => "http://c2370883.ferozo.com/md/me/me",
        "failure" => "http://c2370883.ferozo.com/md/me/productos", 
        "pending" => "http://c2370883.ferozo.com/md/me/productos"
    );
    $preference->auto_return = "approved"; 
    $preference->save();
    $response = array(
        'id' => $preference->id,
    );

?>