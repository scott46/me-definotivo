<?php

//datos de conkfiguracion
// define('LINKAPIBACK', 'https://resetea.com.ar');
header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors',-1);
error_reporting(-1);
ini_set('display_startup_errors', 1);
session_start();

//Controladores
require_once "controladores/ruta.controlador.php";
require_once "controladores/plantilla.controlador.php";
require_once "controladores/tablas.controlador.php";
require_once "controladores/experiencia.controlador.php";
require_once "controladores/administradores.controlador.php";
require_once "controladores/banner.controlador.php";

//modelos
require_once "modelos/tablas.modelo.php";
require_once "modelos/experiencia.modelo.php";
require_once "metodos/methods.php";
require_once "modelos/administradores.modelo.php";
require_once "modelos/banner.modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();