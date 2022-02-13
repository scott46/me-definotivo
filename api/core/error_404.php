<?php

function error_404(){
	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
	include('./errores/404/index.php');
	exit;
}
