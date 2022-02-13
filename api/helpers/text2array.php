<?php

function text2array( $texto ){
	if(! $texto){
		return array();
	}
	return	preg_split('/<br[^>]*>/i', preg_replace( "/\r|\n/", "", nl2br(trim($texto))) );
}