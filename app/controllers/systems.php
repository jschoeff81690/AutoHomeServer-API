<?php
class systems extends controller {
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
			$this->app->load_model('system_model');
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
}