<?php
class ex_IndexController extends mvc_AbstractController {

	function page_index () {
		
		$this->setView('ex_IndexView');
		
		$spec = $this->app->init_specification();
		
		
		$index = array();
		
		$index['database-postgresql'] 	= $this->getExamples($spec['database-postgresql']);
		$index['database-mysql'] 		= $this->getExamples($spec['database-mysql']);
		$index['forms'] 				= $this->getExamples($spec['forms']);
		$index['errors'] 				= $this->getExamples($spec['errors']);
		$index['cron'] 					= $this->getExamples($spec['cron']);
		$index['pagination'] 			= $this->getExamples($spec['pagination']);
		// forms
		
			
			$this->set('index', $index);
			//$index[$key][]
	}
		
	
	function getExamples ($spec) {
		$index = array();
		foreach ($spec as $base => $controller) {
			foreach (get_class_methods($controller) as $key => $method) {
				if (substr($method, 0, 5) == 'page_') {
						
					if (method_exists($controller, sf('info_', substr($method, 5))))
						$info = call_user_func(array($controller, sf('info_', substr($method, 5))));
					else $info = '';
					
					$index[] = array(	'path' 			=> substr($method, 5),
												'controller' 	=> $controller,
												'info'			=> $info);
				}
			}
		return $index;
		}

	}
}