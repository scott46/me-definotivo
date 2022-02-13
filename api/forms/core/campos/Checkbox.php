<?php

/** Campo checkbox
* Se muestra sin los ":" y no se imprime su valor
*
*/
Class Input_checkbox extends Input_text{

	public function mostrar(){
		return !empty($this->valor) ? $this->label.': <strong>'.(is_array($this->valor) ? implode(', ', $this->valor) : $this->valor).'</strong>' : '';
	}
}
