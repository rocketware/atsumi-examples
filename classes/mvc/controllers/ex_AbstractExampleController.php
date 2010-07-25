<?php
class ex_AbstractExampleController extends mvc_AbstractController {
	

	function preRender () {
		
		$metaData = Atsumi::app__getParserMetaData();
		$currentStackItem = end($metaData['stack']);
		$this->set('controller', $currentStackItem['controller']);
		$this->set('method', $currentStackItem['method']);
		$this->set('info', call_user_func(array( $currentStackItem['controller'], sf('info_', substr($currentStackItem['method'], 5)))));
	}

}