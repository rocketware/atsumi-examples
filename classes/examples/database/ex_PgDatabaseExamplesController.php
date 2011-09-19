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



	/* caster Examples */
	function info_query_builder () {
		return 'Builds queries from calls made via the db API.';
	}
	function page_query_builder () {
		$this->setView('ex_SimpleOutputView');

		$db = $this->app->init_postgres;
		
		$queries = array();

		$queries['FETCH_1'] = $db->parseFetchQuery (
			'first_name, last_name',
			'person', 
			'first_name = %s', 'James',
			0,
			10
		);
		
		$queries['FETCH_2'] = $db->parseFetchQuery (
			'first_name, last_name',
			'person', 
			'first_name = %s', 'James'
		);
		
		$queries['FETCH_3'] = $db->parseFetchQuery (
			'*',
			'person',
			null,
			20,
			10
		);
		
		$queries['FETCH_4'] = $db->parseFetchQuery (
			'first_name',
			'person'
		);
		
		$queries['UPDATE'] = $db->parseUpdateQuery (
			'person', 
			'first_name = %s', 'James',
			'last_seen = NOW()',
			'last_name = %s', 'Forrester'
		);
		
		$queries['INSERT'] = $db->parseInsertQuery (
			'person', 
			'first_name = %s', 'James',
			'last_seen = NOW()',
			'last_name = %s', 'Forrester'
		);

		
		$this->set('output', $queries);
	}




	/* Simple query */
	function info_simple_query () {
		return 'Performs a simple select statement on the examples database, rendering the results';
	}
	function page_simple_query () {
		$this->setView('ex_SimpleOutputView');

		$db = $this->app->init_postgres;

//		$select = $db->query('select * from %@ where alias = %s', 'person', 'jimmysparkle');
		$rows = $db->query('select * from %@', 'person');
		
		$persons = array();
		foreach ($rows as $row) {
			$persons[] = sf('name: %s', $row->get('s', 'alias'));
		}
		
		$this->set('output', array('result:' => $rows, 'persons'=>$persons));
	}


	/* Simple select */
	function info_simple_fetch () {
		return 'Performs a fetch select statement on the examples database, rendering the results';
	}
	function page_simple_fetch () {
		$this->setView('ex_SimpleOutputView');

		$db = $this->app->init_postgres;

		$select = $db->fetch(	'alias, first_name, last_name', 
								'person', 
								'first_name = %s', 'James');
		
		$this->set('output', $select);
	}


	/* Simple update */
	function info_simple_update () {
		return 'Performs a simple update statement on the examples database, rendering the results';
	}
	function page_simple_update () {
		$this->setView('ex_SimpleOutputView');

		$db = $this->app->init_postgres;


		$result = $db->update (
								'person', 
								'first_name = %s', 'Bobby',
								'last_seen = NOW()',
								'last_name = %s', 'Forrester');
		
		$this->set('output', $result);
	}


	/* Simple insert */
	function info_simple_insert () {
		return 'Performs a simple insert statement on the examples database, rendering the results';
	}
	function page_simple_insert () {
		$this->setView('ex_SimpleOutputView');

		$db = $this->app->init_postgres;


		$result = $db->insert (
								'person', 
								'first_name = %s', 'Bobby',
								'last_seen = NOW()');
		
		$this->set('output', $result);
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

		$db = $this->app->init_postgres;

		$select = array();
		$select[] = $db->exists('people');
		$select[] = $db->exists('people', 'last_name = %s', 'Forrester');
		$select[] = $db->exists('people', 'first_name = %s AND last_name = %s', 'Jimmy', 'Forrester-Fellowes');
		$select[] = $db->exists('people', 'first_name = %s AND last_name = %s', 'Bobby', 'Forrester');

		$this->set('output', $select);
	}

	/* Simple select */
	function info_simple_count() {
		return 'Performs a simple count statement on the examples database, rendering the results';
	}
	function page_simple_count() {
		$this->setView('ex_SimpleOutputView');

		$db = $this->app->init_postgres;

		$select = array();
		$select[] = $db->count('people');
		$select[] = $db->count('people', 'last_name = %s', 'Forrester');
		$select[] = $db->count('people', 'first_name = %s AND last_name = %s', 'Jimmy', 'Forrester');

		$this->set('output', $select);
	}
}

?>