<?php

class APP {

	private static $instance;

	private $route;

	public static function get_instance() {
		if (! self::$instance) {
			self::$instance = new APP ();
		}
		return self::$instance;
	}

	public function configure() {
		// get configuration details and files to include
		require_once ('system/config.php'); // holds all config information
		$this->config = new config ();
		$this->db->_connect ( $this->config->_get ( "database_information" ) );
		$this->set_route ();
		$this->load_user (); // always load the user if possible
		$this->router ();
	}

	function redirect($location) {
		header ( 'Location: ' . base_url . $location . "/" );
	}

	function load_user() {
		$this->load_model ( 'user_model' );
		$this->load_object ( 'user' );
		if ($this->user_model->_logged ()) {
			if ($this->user = $this->user_model->get_user ())
				$this->_logged = true;
			else
				$this->_logged = false;
		} else {
			$this->_logged = false;
			$this->user = false;
		}
	}

	function router() {
		$controller = $this->route ['controller'];
		$function = $this->route ['function'];
		$params = $this->route ['params'];
		if (file_exists ( app_url . "controllers/" . $controller . ".php" )) {
			$this->load_controller ( $controller, $controller );
			if (isset ( $function ))
				if (method_exists ( $this->$controller, $function )) {
					if (isset ( $params ) && ! empty ( $params ))
						$this->$controller->$function ( $params );
					else
						$this->$controller->$function ();
				} else
					$this->$controller->index ();
			else
				$this->$controller->index ();
		} else {
			$this->load_controller ( default_controller, default_controller );
			$this->{default_controller}->index ();
		}
	}

	function load_util($key, $value = FALSE) {
		if ($value === FALSE)
			require_once (util_url . $key . ".php");
		else {
			require_once (util_url . $value . ".php");
			$this->$key = new $value ();
		}
	}

	function load_controller($controller) {
		require_once (app_url . "controllers/" . $controller . ".php");
		$this->$controller = new $controller ();
	}

	function load_model($model) {
		require_once (app_url . "models/" . $model . ".php");
		$this->$model = new $model ();
	}

	function load_view($view, $data = false) {
		if (is_array ( $data )) {
			foreach ( $data as $key => $val )
				$$key = $val;
		}
		require_once (app_url . "views/" . $view . ".php");
	}

	function load_object($class) {
		require_once (app_url . "objects/" . $class . ".php");
	}

	function load_include($full_path) {
		require_once ($full_path);
	}

	function _get($key) {
		if (isset ( $this->{$key} ))
			return $this->{$key};
		return false;
	}

	function _set($key, $value) {
		$this->{$key} = $value;
	}

	function _unset($key) {
		if (isset ( $this->{$key} ))
			unset ( $this->{$key} );
	}

	function set_route() {
		$this->route = array (
				"controller" => "",
				"function" => "",
				"params" => array () 
		);
		
		if (! empty ( $_GET ['location'] )) {
			$location = preg_replace ( '/[^-a-zA-Z0-9_\/]/', '', $_GET ['location'] );
			
			// controllername/function/parameterrrs
			$location = explode ( "/", $location );
			$this->route ['controller'] = $location [0];
			if (isset ( $location [1] ))
				$this->route ['function'] = $location [1];
			if (isset ( $location [2] ) && ! empty ( $location [2] )) {
				for($x = 2; $x < count ( $location ); $x ++)
					$this->route ['params'] [] = $location [$x];
			}
		}
	}

} // eof class
?>
