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


	function updateip($params) {
		if(strtolower($params[0]) == "chipid") {
			$result = $this->app->device_model->read("chip_id",$params[1]);
			if($result) {
				if($params[2] == "ip" && count($params) == 7){
					$ip = $params[3].'.'.$params[4].'.'.$params[5].'.'.$params[6];
					
					$data = array( 
						"ip_address" => $ip
					);
					if($this->app->device_model->update($data,"`chip_id` = '".$params[1]."'")) {
						echo $this->api_handler->respond();
					}
					else {
						echo $this->api_handler->respond_error('Error: coudlnt update.');
					}
				}
				else {
					echo $this->api_handler->respond_error('Error: missing params.');
				}
			}
			else {
				echo $this->api_handler->respond_error('Error: wrong chip.');
			}
		}
	}

}
