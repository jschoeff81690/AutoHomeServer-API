<?php

class device_meta_model extends model {

	function __construct() {
		parent::__construct ();
		$this->table_name = "device_meta";
	}

	function update_device_state($device_id, $state) {
		$data = array (
			"device_id" => $device_id,
			"value" => $state 
		);	
		
		if (!$this->app->device_meta_model->update ( $data, "`device_id` = '" . $device_id . "'" )) {
			if (!$this->app->device_meta_model->create ( $data )) {
				return false;	
			}
		}
		return true;
	}
}
