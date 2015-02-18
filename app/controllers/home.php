<?php

class home extends controller {

	function index() {
		if ($this->app->_logged) {
			$this->app->load_model ( 'relay_model' );
			$data ['tests'] = $this->app->relay_model->list_tests ();
			$data ['main_content'] = 'devices/main_content';
			$this->app->load_view ( 'dashboard', $data );
		} else {
			$this->app->load_view ( 'landing' );
		}
	}

	function dashboard() {
		if ($this->app->_logged) {
			$this->app->load_view ( 'dash_backups/dashboard' );
		} else {
			$this->app->load_view ( 'landing' );
		}
	}

	function dashboardj() {
		if ($this->app->_logged) {
			$this->app->load_view ( 'dashboard' );
		} else {
			$this->app->load_view ( 'landing' );
		}
	}

	function login() {
		$this->app->load_model ( 'user_model' );
		$user_model = &$this->app->user_model;
		if ($user_model->login ()) {
			$this->app->redirect ( "home" );
			// $this->app->load_view('home',array('user'=>$user_model->get_user()));
		} else {
			echo '<pre>';
			var_dump ( "We had an Error" );
			echo '</pre>';
			
			$data = array (
					"error" => true,
					'error_num' => 1 
			);
			$this->app->load_view ( 'landing', $data );
		}
	}

	function register() {
		
		// have the submitted a register form?
		if (isset ( $_POST ['name'], $_POST ['password'], $_POST ['email'] )) {
			
			// load usr model for access user table db
			$this->app->load_model ( 'user_model' );
			$user_model = &$this->app->user_model;
			
			// initial info in register form
			// -- the data is sanitized in the user_model
			$name = $_POST ['name'];
			$email = $_POST ['email'];
			$password = $_POST ['password'];
			// hash the password using email as the salt
			$hash = hash ( 'sha256', $email . $password );
			$insert = array (
					'name' => $name,
					'email' => $email,
					'password' => $hash 
			);
			// check if the email is already owned by another user
			if ($user_model->exists ( 'email', $email )) {
				echo "<h1>Email already exists in DB: " . $email . "</h1>";
			}  // email doesnt exist, lets create user
else if ($result = $user_model->create ( $insert )) {
				// since we have their name name we add a row for
				// user_profile with their name
				
				// the user was created, lets get the id of that user
				$uid = $user_model->get_last_id ();
				
				// Create a system for the user
				$data = array (
						'name' => $name,
						'description' => 'My System',
						'user_id' => $uid 
				);
				$this->app->load_model ( 'system_model' );
				if (! $this->app->system_model->create ( $data )) {
					echo 'We are sorry, but there was an error adding your system.';
				}
				
				// OK SO we have registered the user, lets log them in
				$_SESSION ['uid'] = $uid;
				$_SESSION ['email'] = $email;
				$_SESSION ['hash'] = $hash;
				
				$this->app->redirect ( "home" );
			} else {
				echo '<pre>Error:';
				var_dump ( $result );
				echo '</pre>';
			}
		} else {
			echo '<pre>Error';
			var_dump ( $_POST );
			echo '</pre>';
		}
	}

	function account() {
		if (! $this->app->_logged) {
			$this->app->redirect ( '' );
			return;
		}
		
		$data ['main_content'] = 'user/account_settings';
		$this->app->load_view ( 'dashboard', $data );
	}

	function logout() {
		session_unset ();
		$this->app->load_view ( 'landing' );
	}

}

?>
