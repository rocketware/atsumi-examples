<?php
class ex_ErrorExamplesController extends ex_AbstractExampleController {

	/* Atsumi Exception */
	function info_atsumi_exception () {
		return 'Throws a Atsumi HTML Exception';
	}
	function page_atsumi_exception () {
				
	}

	/* Sencha Error */
	function info_atsumi_error () {
		return 'PHP error caught';
	}
	function page_atsumi_error () {
		$var++;
	}

	/* Plaintext Exception */
	function info_plaintext_exception () {
		return 'demonstrates an exception being rendered in plaintext';
	}
	function page_plaintext_exception () {
		header("Content-Type: text/plain");
	}

	function info_listener_and_recoverer () {
		return 'Throws an exceptions which is listened to and recovered from.';
	}
	function page_listener_and_recoverer () {
		die("todo");
	}
	
}