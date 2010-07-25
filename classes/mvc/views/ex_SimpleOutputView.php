<?php
class ex_SimpleOutputView extends ex_AbstractExampleView {
	
	function renderBodyContent () {
		
		pfl('<pre>');
		dump($this->get_output);
		pfl('</pre>');
		
	}
	
	
}