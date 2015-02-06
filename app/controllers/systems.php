<?php
class systems extends controller {
	private $api_handler;

	function __construct() {
		parent::__construct();
		$this->api_handler = new api_handler();
		$this->app->load_model('system_model');
	}

	function index() {
		if( $this->app->_logged ) 
			$this->app->load_view( 'home' );
		else 
			$this->app->load_view('landing');
	}

	function add($key = false) {
		if(!$key) {
			$this->app->load_view('new_system');
		}
		if( isset($_POST['system_name']) && isset($_POST['system_description']) ) {
			//setup system model
			$system_model = &$this->app->system_model;
			//set up array to match new db row
			$data  = array(
				'name' => $_POST['system_name'],
				'description' => $_POST['system_description']
			);
			echo '<pre>';
			var_dump("got $_POsT");
			echo '</pre>';
			//create and confirm it was a success
			if( $system_model->create($data) ) {
				$system_id = $system_model->get_last_id();
				$this->app->redirect("systems/view/".$system_id);
				
			}
			else {
				echo 'We are sorry, but there was an error adding your system.';
			}
		}
	}


	function all($key = true) {
		if($key != false) {
			//
			//handle security with key here
			//
			$systems = $this->app->system_model->get_all_json();
			$this->api_handler->data('data',$systems);
			echo $this->api_handler->respond();
		}
		else {
			echo $this->api_handler->respond_error('Error: missing authentication.');
		}
	}

}