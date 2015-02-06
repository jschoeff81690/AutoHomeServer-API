<?php
class requests extends controller {
	private $api_handler;

	function __construct() {
		parent::__construct();
		$this->api_handler = new api_handler();
		$this->app->load_model('request_model');
	}

	function index() {

	}

	function all($key = true) {
		if($key != false) {
			//
			//handle security with key here
			//
			$requests = $this->app->request_model->get_all_json();
			$this->api_handler->success(true);
			$this->api_handler->data('data',$requests);
			echo $this->api_handler->respond();
		}
		else {
			echo $this->api_handler->respond_error('Error: missing authentication.');
		}
	}

	function find($params) {
		if(!empty($params) && isset($params[0])) {
			//
			//handle security with key here
			//-- add to if "&& isset($params[1])" to check for key
			//
			
		}
		else {
			echo $this->api_handler->respond_error('Error: missing authentication.');
		}
	}	

}
