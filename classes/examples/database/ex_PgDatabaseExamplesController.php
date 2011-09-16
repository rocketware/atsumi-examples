<?php
class ex_PgDatabaseExamplesController extends ex_AbstractExampleController {

	/* caster Examples */
	function info_caster () {
		return 'Performs a simple select statement on the examples database, rendering the results';
	}
	function page_caster () {
		$this->setView('ex_SimpleOutputView');

		$testArr = array();
		$testArr[] = array(	'string'	=> 'SELECT * FROM %@ where name = %s and id > %i and created > %d',
												'args'		=> array('developer', 'jimmy', 202, '1995-01-01'));
												
		$testArr[] = array(	'string'	=> 'SELECT * FROM %@ where created = %t and confirmed = %b limit %i offset %i',
												'args'		=> array('transaction', time(), true, 20, 0));

		foreach ($testArr as $idx => $test)
				$testArr[$idx]['output'] = call_user_func_array(
																		array('caster_PostgreSQL','cast'), 
																		array_merge(
																			array($testArr[$idx]['string']),
																			$testArr[$idx]['args'] )
																	);
																	
		
		$this->set('output', $testArr);
	}

	/* Simple query */
	function info_simple_query () {
		return 'Performs a simple select statement on the examples database, rendering the results';
	}
	function page_simple_query () {
		$this->setView('ex_SimpleOutputView');

		$db = $this->app->init_postgres;

		$select = $db->query('select * from %@ where alias = %s', 'person', 'jimmysparkle');
		
		$this->set('output', $select);
	}


	/* Simple select */
	function info_simple_select () {
		return 'Performs a simple select statement on the examples database, rendering the results';
	}
	function page_simple_select () {
		$this->setView('ex_SimpleOutputView');

		$db = $this->app->init_postgres;

		$select = $db->select('alias, first_name, last_name', 'person', 'first_name = %s', 'James');
		
		$this->set('output', $select);
	}

	/* Simple select one */
	function info_simple_select_one() {
		return 'Performs a simple select one statement on the examples database, rendering the results';
	}
	function page_simple_select_one() {
		$this->setView('ex_SimpleOutputView');

		$db = $this->app->init_postgres;

		$select = $db->selectOne('*', 'person', 'id = %i', 1);

		$this->set('output', $select);
	}

	/* Simple select */
	function info_simple_fetch () {
		return 'Performs a simple select statement on the examples database, rendering the results';
	}
	function page_simple_fetch () {
		$this->setView('ex_SimpleOutputView');

		$db = $this->app->init_postgres;

		$select = $db->fetch('person', 'last_name = %s', 'Forrester-Fellowes');

		$this->set('output', $select);
	}

	/* Simple select */
	function info_simple_fetch_one() {
		return 'Performs a simple select one statement on the examples database, rendering the results';
	}
	function page_simple_fetch_one() {
		$this->setView('ex_SimpleOutputView');

		$db = $this->app->init_postgres;

		$select = $db->fetchOne('person', 'alias = %s', 'jimmysparkle');

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