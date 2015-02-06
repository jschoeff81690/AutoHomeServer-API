<?php
class devices extends controller {
	private $api_handler;

	function __construct() {
		parent::__construct();
		$this->api_handler = new api_handler();
		$this->app->load_model('device_model');
	}

	function index() {
	}


	function all($key = true) {
		if($key != false) {
			//
			//handle security with key here
			//
			$devices = $this->app->device_model->get_all_json();
			$this->api_handler->data('data',$devices);
			echo $this->api_handler->respond();
		}
		else {
			echo $this->api_handler->respond_error('Error: missing authentication.');
		}
	}
}
