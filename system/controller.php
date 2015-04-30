<?php

class controller {

	public $app;

	function __construct() {
		$this->app = APP::get_instance ();
	}

	function check_logged() {
		if (! $this->app->_logged)
			$this->app->load_view ( 'landing' );
	}

}
?>