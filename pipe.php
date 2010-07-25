<?php
// Get sencha2
require_once("../atsumi/init.php");

// Add class areas to the class loader
atsumi_Loader::references(array(
						'examples'	=> 'app examples mvc',
						'atsumi' 	=> 'parser mvc widgets validators cache database'
					));


// Initalise sencha and the url parser
$settings = new ex_Settings();
Atsumi::initApp($settings);
Atsumi::app__setUriParser('uriparser_Gyokuro');


// Execute sencha
try {
	Atsumi::app__go($_SERVER['REDIRECT_URL']);
} catch(app_PageNotFoundException $e) {
	Atsumi::app__go("/404/");
}

// Render the processed output
Atsumi::app__render();

?>