<?php

/* Transforma un teléfono en un enlace */
function enlaceTel( $tel ){

	if(! $tel){
		return '#';
	}

	return 'tel:' . str_replace('---', '-', str_replace(
			array('(',')',' '), 
			array('','','-'),
			trim($tel)
		));
}