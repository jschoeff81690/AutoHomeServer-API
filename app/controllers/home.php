<?php
header ( 'Access-Control-Allow-Origin: *' );
class home extends controller {
	private $api_handler;
	
	// overwrite constructor
	function __construct() {
		parent::__construct ();
		$this->api_handler = new api_handler ();
		$this->fv = new form_validator ();
	}
	function index() {
		echo $this->api_handler->respond_error ( 'Error: Incorrect URL' );
	}
	function api_tester() {
		$this->app->load_view ( 'api_tests/device_meta' );
	}
	function mail_test() {
		$notifier = new notifier();
		$notifier->notify(71,"YOYOY");
	}
	function login() {
		$this->app->load_model ( 'user_model' );
		$user_model = &$this->app->user_model;
		if ($user_model->login ()) {
			$myfile = fopen ( "config.lua", "w" ) or die ( "Unable to open file!" );
			echo '<pre>';
			$txt = json_encode ( $user_model->get_system ( $_SESSION ['uid'] ) );
			echo ($txt);
			echo '</pre>';
			fwrite ( $myfile, $txt );
			fclose ( $myfile );
		} else {
			echo '<pre>';
			var_dump ( "We had an Error" );
			echo '</pre>';
			$data = array (
					"error" => true,
					'error_num' => 1 
			);
		}
	}
	function logout() {
		session_unset ();
		$this->app->load_view ( 'landing' );
	}
}
?>
