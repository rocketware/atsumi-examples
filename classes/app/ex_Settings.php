<?php

class ex_Settings extends atsumi_AbstractAppSettings {
	protected $settings = array(
		'debug'		=> true
	);

	public function __construct() {

	}

	public function init_postgres() {
		return new db_PostgreSql(
			array(
				'host'			=> 'localhost',
				//'port'			=> 5432,
				'dbname'		=> 'atsumiexample',
				'username'		=> 'atsumiexample',
				'password'		=> 'password'
			)
		);
	}

	public function init_mysql() {
		return new db_MySql(
			array(
				'host'			=> 'localhost',
				//'port'			=> 5432,
				'dbname'		=> 'example',
				//'unix_socket'	=> '',
				'username'		=> 'exampleusr',
				'password'		=> '319W6X3'
			)
		);
	}

	public function init_sqlite() {
		return new db_MySql(
			array(
				//'version'		=> 2,
				'path'			=> '/tmp/mydb'
			)
		);
	}

	public function init_specification () {

		return	array(
			''				=> 'ex_IndexController',
			'errors'		=> array (
				'' 				=> 'ex_ErrorExamplesController'
			),
			'forms'		=> array (
				'' 				=> 'ex_FormExamplesController'
			),
			'pagination'		=> array (
				'' 				=> 'ex_PaginationExamplesController'
			),
			'postgresql-database'		=> array (
				'' 				=> 'ex_PgDatabaseExamplesController'
			),
			'database'		=> array (
				'' 				=> 'ex_DatabaseExamplesController'
			),
			'cron'			=> array (
				''				=> 'ex_CronExamplesController'
				)

		); 

	}
}


?>