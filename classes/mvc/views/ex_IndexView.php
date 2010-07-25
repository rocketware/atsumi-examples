<?php

class ex_IndexView extends ex_AbstractHtmlView  {
	
	function renderBodyContent () {
		
		pfl('<h1>Atsumi Examples</h1>');
		pfl('<p>%s</p>', 'A collection of examples to demonstrate features of Atsumi.');
		pfl('<blockquote>');
		
		foreach ($this->get_index as $section => $exampleArr) {
			
			pfl('<h2>Examples: %s</h2>', $section);
			pfl('<ol>');
			foreach ($exampleArr as $example) {
				pfl('<li>%s &raquo; <a href="%s">%s</a> <cite>%s</cite></li>', 
					$section, Atsumi::app__createUri($example['controller'], $example['path']),  
					$example['path'], $example['controller']);
				
				if ($example['info']) pfl('<p style="margin-top:5px;">%s</p>', $example['info']);
			}
			pfl('</ol>');
		}
		pfl('</blockquote>');
		pfl('<br />');
		pfl('<br />');
		
	}
	
}


?>