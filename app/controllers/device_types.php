<?php
class device_types extends controller {
	private $api_handler;
	function __construct() {
		parent::__construct ();
		$this->api_handler = new api_handler ();
		$this->fv = new form_validator ();
		$this->app->load_model ( 'device_model' );
	}
	function index() {
		echo $this->api_handler->respond_error ( 'Error: device action to perform' );
	}
}
