<?php
class ex_DatabaseExamplesController extends ex_AbstractExampleController {

	/* Simple select */
	function info_simple_select () {
		return 'Performs a simple select statement on the examples database, rendering the results';
	}
	function page_simple_select () {
		$this->setView('ex_SimpleOutputView');

		$db = $this->app->init_mysql;

		$select = $db->select('forename, surname', 'people', 'surname = %s AND age > %i', 'oates', 21);

		$this->set('output', $select);
	}

	/* Simple select one */
	function info_simple_select_one() {
		return 'Performs a simple select one statement on the examples database, rendering the results';
	}
	function page_simple_select_one() {
		$this->setView('ex_SimpleOutputView');

		$db = $this->app->init_mysql;

		$select = $db->selectOne('forename, surname', 'people', 'forename = %s AND surname = %s', 'james', 'oates');

		$this->set('output', $select);
	}

	/* Simple select */
	function info_simple_fetch () {
		return 'Performs a simple select statement on the examples database, rendering the results';
	}
	function page_simple_fetch () {
		$this->setView('ex_SimpleOutputView');

		$db = $this->app->init_mysql;

		$select = $db->fetch('people', 'surname = %s AND age > %i', 'oates', 21);

		$this->set('output', $select);
	}

	/* Simple select */
	function info_simple_fetch_one() {
		return 'Performs a simple select one statement on the examples database, rendering the results';
	}
	function page_simple_fetch_one() {
		$this->setView('ex_SimpleOutputView');

		$db = $this->app->init_mysql;

		$select = $db->fetchOne('people', 'forename = %s AND surname = %s', 'james', 'oates');

		$this->set('output', $select);
	}

	/* Simple select */
	function info_simple_exists() {
		return 'Performs a simple exists statement on the examples database, rendering the results';
	}
	function page_simple_exists() {
		$this->setView('ex_SimpleOutputView');

		$db = $this->app->init_mysql;

		$select = array();
		$select[] = $db->exists('people');
		$select[] = $db->exists('people', 'surname = %s', 'oates');
		$select[] = $db->exists('people', 'forename = %s AND surname = %s', 'james', 'oates');
		$select[] = $db->exists('people', 'forename = %s AND surname = %s', 'jimmy', 'oates');

		$this->set('output', $select);
	}

	/* Simple select */
	function info_simple_count() {
		return 'Performs a simple count statement on the examples database, rendering the results';
	}
	function page_simple_count() {
		$this->setView('ex_SimpleOutputView');

		$db = $this->app->init_mysql;

		$select = array();
		$select[] = $db->count('people');
		$select[] = $db->count('people', 'surname = %s', 'oates');
		$select[] = $db->count('people', 'forename = %s AND surname = %s', 'james', 'oates');

		$this->set('output', $select);
	}
}

?>