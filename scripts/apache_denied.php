<?php

$currentPath = explode('/',__FILE__);
$basePath = implode("/",array_slice($currentPath,0, count($currentPath)-3));
require_once($basePath."/sencha2/init.php");



// Add class areas to the class loader
Sencha::references(array(	
						'examples'	=> 'app examples mvc',
						'sencha2' 	=> 'mvc widgets validators cache'
					));
	

// Initalise sencha and the url parser
$settings = new ex_Settings();
Sencha::initApp($settings);
Sencha::app__setUrlParser('urlparser_Gyokuro');


// Execute sencha
Sencha::app__go('/cron/apache_denied/');


// Render the processed output
Sencha::app__render();

// Render debug if required
if($settings->get_debug) {
	Sencha::app__renderDebug();
}

?>