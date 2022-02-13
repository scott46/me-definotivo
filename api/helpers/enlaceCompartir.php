<?php

/**
* Generador de enlaces para compartir en redes sociales
*
* @param $url URL a compartir
* @param $red_social Red social en la que se compartirá
* @param $html Opcional. HTML que iría dentro del enlace
* @param $mensaje Opcional. Mensaje que se va a compartir
* @param $foto Opcional. Foto que se va a compartir
*
*/
function enlaceCompartir($url, $red_social, $html='', $mensaje='', $foto=''){

	switch($red_social){
		case 'facebook':
			$url_compartir = 'https://www.facebook.com/sharer/sharer.php?u='.$url;
			break;

		case 'twitter':
			$url_compartir = 'https://twitter.com/intent/tweet?text='.urlencode($mensaje).
				(defined('REDES_TW') ? '&via='.REDES_TW : '');
			break;

		case 'google plus':
			$url_compartir = 'https://plus.google.com/share?url='.$url;
			break;

		case 'pinterest':
			$url_compartir = 'http://pinterest.com/pin/create/button/?url='.$url.($foto ? '&media='. $foto : '').'&description='.$mensaje;
			break;

		// https://developer.linkedin.com/docs/share-on-linkedin#
		case 'linkedin':
			$url_compartir = 'https://www.linkedin.com/shareArticle?mini=true&url='.$url.($foto ? '&media='. $foto : '').'&summary='.$mensaje;
			break;
	}

	return 
		'<a href="'. $url_compartir .'" onclick="window.open(this.href, \''. ucfirst($red_social) .'\', \'width=600, menubar=no,toolbar=no,resizable=yes,scrollbars=yes\'); return false;">'.
			$html.
		'</a>';
}