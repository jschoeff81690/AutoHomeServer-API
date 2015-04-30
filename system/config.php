<?php

/*
 * Start PHP SESSION
 */
session_start ();

class config {
	/*
	 * Database INFO
	 */
	private $database_information = array (
			'host' => 'localhost',
			'username' => 'root',
			'password' => 'SENIOR+PASSWORD',
			'database_name' => 'project' 
	);
	
	/*
	 * Domain informations
	 */
	private $constants = array (
			'base_url' => 'http://52.1.91.1/api/',
			'util_url' => '/api/system/', // start with a /, used for file_includes
			'app_url' => '/api/app/', // start with a /, used for file_includes
			'main_title' => 'AutoHome',
			'default_controller' => 'home' 
	);

	private $util_names = array (
			"db" => "db", // a DataBase class that uses pdo.
			"controller",
			"model",
			"view" 
	);

	private $object_names = array (
			"api_handler",
			"form_validator",
			"notifier",
			"aes_util",
			"recipe_handler"
	);
	/* full path to include will be var/www/html/api/".$include_loccations[index] */
	private $include_locations = array (
			'vendor/autoload.php',
			'PHPMailer/PHPMailerAutoload.php'
	);


	private $app;

	function __construct() {
		$this->set_root ( $this->constants ['util_url'] );
		$this->set_root ( $this->constants ['app_url'] );
		
		$this->app = APP::get_instance ();
		$this->make_constants ( $this->constants );
		unset ( $this->constants );
		
		$this->utilities ( $this->util_names );
		unset ( $this->util_names );
		
		$this->objects ( $this->object_names );
		unset ( $this->util_names );
		
		$this->includes ( $this->include_locations );
		unset ( $this->include_locations );
	}

	function utilities($utils) {
		foreach ( $utils as $key => $util )
			if (! is_numeric ( $key ))
				$this->app->load_util ( $key, $util );
			else
				$this->app->load_util ( $util );
	}

	function objects($objects) {
		foreach ( $objects as $object )
			$this->app->load_object ( $object );
	}

	function includes($includes) {
		foreach ( $includes as $include )
			$this->app->load_include ( $include );
	}

	function _get($key) {
		if (isset ( $this->{$key} ))
			return $this->{$key};
		return false;
	}

	function make_constants($constants) {
		foreach ( $constants as $key => $val )
			define ( $key, $val );
	}

	function set_root(&$str) {
		$str = $_SERVER ['DOCUMENT_ROOT'] . $str;
	}

}
