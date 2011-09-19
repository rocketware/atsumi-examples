<?php
class ex_SimpleOutputView extends ex_AbstractExampleView {
	
	function renderBodyContent () {
		
		pfl('<pre>%s</pre>', stripslashes(pretty($this->get_output)));
		
	}
	
	
}