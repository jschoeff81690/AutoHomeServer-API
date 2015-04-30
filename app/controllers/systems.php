<?php
class systems extends controller {
	private $api_handler;
	function __construct() {
		parent::__construct ();
		$this->api_handler = new api_handler ();
		$this->app->load_model ( 'system_model' );
	}
	function index() {
		echo $this->api_handler->respond_error ( 'Error: missing System action.' );
	}
	function all($key = true) {
		if ($key != false) {
			//
			// handle security with key here
			//
			$systems = $this->app->system_model->get_all_json ();
			$this->api_handler->data ( 'data', $systems );
			echo $this->api_handler->respond ();
		} else {
			echo $this->api_handler->respond_error ( 'Error: missing authentication.' );
		}
	}
}
