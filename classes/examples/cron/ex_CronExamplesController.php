<?php
class ex_CronExamplesController extends ex_AbstractExampleController {

	/* Stand alone script file. */
	function info_stand_alone_script () {
		return 'Example stand alone script';
	}
	function page_stand_alone_script () {
		$this->setView('ex_SimpleOutputView');
		
		$this->set('output', 'This script can be accessed from a stand alone script file at: /exmaples/scripts/example_cron.php');
	}
	
	
	/* Stand alone script file. */
	function info_apache_denied() {
		return 'Example script only accessible from PHP-CLI as apache access is denied (for cron security)';
	}
	function page_apache_denied () {
		$this->setView('ex_SimpleOutputView');
		
		$this->set('output', 'This is an example script that does not allow apache access. This is useful for cron secruity.');
		
		if(function_exists('apache_request_headers')) 
			throw new Exception ("Access Denied: This script can only be accessed via php-cli. The script is locaed at: exmaples/scripts/apache_denied.php");
	
	
	}
	
	
}

?>