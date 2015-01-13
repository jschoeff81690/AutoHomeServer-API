<?php
class projects extends controller {

	function index() {	
		if( $this->app->_logged ) 
			$this->app->load_view( 'home' );
		else 
			$this->app->load_view('landing');
	}

	function view($params=false) {
		if(!$this->app->_logged) {
			$this->app->load_view('landing');
			return;
		}
		if(is_array($params)) {
			$id = $params[0];
			if(!isset($this->app->project_model))
				$this->app->load_model('project_model');

			$project = $this->app->project_model->get_project($id);
			$uid = $_SESSION['uid'];
			$this->app->load_view('view_project',array('project'=>$project,'user_id' => $uid));
		}
		else 
			$this->index();
	
	}
	function create($params = false) {
		if(!$this->app->_logged) {
			$this->app->load_view('landing');
			return;
		}
		$step = 1;
		if(is_array($params)) {
			$step  = $params[0];
		}
		if( ($step > 1 && !isset($_SESSION['new_project']) ) || $step > 3) $step = 1;

		if(method_exists($this, '_step'.$step)) {

			$this->{'_step'.$step}();
		}

	}

	function _step1() {
		if(!$this->app->_logged) {
			$this->app->load_view('landing');
			return;
		}
		//STEP 1
		//
		//
		if( isset($_POST['project_name'],$_POST['project_description'], $_POST['day'], $_POST['month'], $_POST['year']) ) {
			$_SESSION['project_name'] = $_POST['project_name'];
			$_SESSION['project_description'] = $_POST['project_description'];
			$_SESSION['month'] = $_POST['month'];
			$_SESSION['day'] = $_POST['day'];
			$_SESSION['year'] = $_POST['year'];
			$data['step'] = 2;
			$this->app->load_view('create_project',$data);
		}
		else if( isset($_SESSION['project_name'],$_SESSION['project_description'], $_SESSION['day'], $_SESSION['month'], $_SESSION['year']) ) {
			$data['step'] = 2;
			$this->app->load_view('create_project',$data);
			$_SESSION['new_project'] = true;
		}
		else {
			$data['step'] = 1;
			$this->app->load_view('create_project',$data);
			$_SESSION['new_project'] = true;

		}
		
	}
	function _step2() {
		if(!$this->app->_logged) {
			$this->app->load_view('landing');
			return;
		}

		if(!empty($_POST) || !isset($_SESSION['players'])) {
			$teamplayers = array();
			foreach($_POST as $key=>$post) {
				if (strpos($key, 'user') !== FALSE){
					$teamplayers[] = $post;
				}
				
			}
			$_SESSION['players'] = json_encode($teamplayers);

			$data['step'] = 3;
			$this->app->load_view('create_project',$data);
		}
		else {

			$data['step'] = 2;
			$this->app->load_view('create_project',$data);
		}
		
	}
	function _step3() {
		if(!$this->app->_logged) {
			$this->app->load_view('landing');
			return;
		}
		//STEP 3
		//
		if( isset($_POST['finish'],$_POST['company'], $_POST['website'],$_POST['contact']) ) {
			$_SESSION['company'] = $_POST['company'];
			$_SESSION['website'] = $_POST['website'];
			$_SESSION['contact'] = $_POST['contact'];
		}
		else {
			$_SESSION['company'] = '';
			$_SESSION['website'] = '';
			$_SESSION['contact'] = '';
		}
		
		$uid = $_SESSION['uid'];
		//process New Project
		$this->app->load_model('project_model');
		$project_model = &$this->app->project_model;
		$data  = array(
			'name' => $_SESSION['project_name'],
			'description' => $_SESSION['project_description'],
			'company' => $_SESSION['company'],
			'contact' => $_SESSION['contact'],
			'site' => $_SESSION['website'],
			'finish' => $_SESSION['year']."-".$_SESSION['month']."-".$_SESSION['day']
			);

		if( $project_model->create($data) ) {
			$project_id = $project_model->get_last_id();
			$IDs = json_decode($_SESSION['players'], false);
			$IDs[] = $_SESSION['uid'];
			if($project_model->add_users($IDs,$project_id)) {
				$this->app->redirect("projects/view/".$project_id);

				$this->unset_create_values();
			}
			else {
				echo 'We are sorry, but there was an error adding your team to the project.';
			}
			// $this->view(array($project_id));

		}
		else {
			echo '<div class="text-alert"><h2>There was an error. Please try again.</h2></div>';
		
			$this->_step1();
		}
	}
	function unset_create_values() {
		unset($_SESSION['project_name']);
		unset($_SESSION['project_description']);
		unset($_SESSION['company']);
		unset($_SESSION['website']);
		unset($_SESSION['contact']);
		unset($_SESSION['year']);
		unset($_SESSION['month']);
		unset($_SESSION['day']);
		unset($_SESSION['players']);
		unset($_SESSION['new_project']);
	}


	function add_task() {
		$response = array();
		$response['error'] = false; // false until error encounteredvv
		$response['message'] = "Your task was successfully added."; // false until error encountered
		
		if(isset($_POST['task_name'], $_POST['task_details'], $_POST['month'], $_POST['day'], $_POST['year'], $_POST['project_id']) ) {
			//code here
			
			if( !empty($_POST['task_name']) ) {
				if(!isset($this->app->project_model))
					$this->app->load_model('project_model');
				$data  = array(
					'name' => $_POST['task_name'],
					'details' => $_POST['task_details'],
					'project_id' => $_POST['project_id'],
					'due_date' => $_POST['year']."-".$_POST['month']."-".$_POST['day']
				);

				if( !$this->app->project_model->create_task($data) ) {
					$response['error'] = true;
					$response['message'] = "We're sorry, there was an error adding your task. We suggest reloading the page and trying again.";
				}
			}
			else {
				$response['error'] = true;
				$response['message'] = "We're sorry, there was an error adding your task. We suggest reloading the page and trying again.";

			}
		}
		else {
			$response['error'] = true;
			$response['message'] = "We're sorry, there was an error adding your task. We suggest reloading the page and trying again.";
		}
		echo json_encode($response);
	}

	function add_message() {
		$response = array();
		$response['error'] = false; // false until error encounteredvv
		$response['message'] = "Your message was successfully added."; // false until error encountered
		
		if(isset($_POST['message'], $_POST['user_id'], $_POST['project_id']) ) {
			//code here
			
			if( !empty($_POST['message']) ) {
				if(!isset($this->app->project_model))
					$this->app->load_model('project_model');

				$data  = array(
					'content' => $_POST['message'],
					'sender_id' => $_POST['user_id'],
					'project_id' => $_POST['project_id']
				);

				if( !$this->app->project_model->create_message($data) ) {
					$response['error'] = true;
					$response['message'] = "We're sorry, there was an error adding your message. We suggest reloading the page and trying again.";
				}
			}
			else {
				$response['error'] = true;
				$response['message'] = "We're sorry, there was an error adding your message. We suggest reloading the page and trying again.";

			}
		}
		else {
			$response['error'] = true;
			$response['message'] = "We're sorry, there was an error adding your message. We suggest reloading the page and trying again.";
		}
		echo json_encode($response);
	}
}
?>