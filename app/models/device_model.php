<?php

class device_model extends model {

	function __construct() {
		parent::__construct ();
		$this->table_name = "devices";
	}

	function get_all_json() {
		$sql = "SELECT * FROM `" . $this->table_name . "` ORDER BY `date_created` DESC";
		$stmt = $this->app->db->query ( $sql );
		$this->app->load_object ( 'device' );
		$result = $stmt->setFetchMode ( PDO::FETCH_CLASS, 'device' );
		$devices = '[';
		while ( $device = $stmt->fetch () ) {
			$devices .= $device->to_json () . ',';
		}
		
		$devices = rtrim ( $devices, ',' );
		$devices .= ']';
		return $devices;
	}
	function get_device($device_id) {
		$sql = "SELECT d.*,dt.*,dat.* FROM `devices`as d,`device_types` as dt,`data_types` as dat WHERE d.device_id = ? AND d.device_type_id = dt.type_id AND dt.data_type_id = dat.data_type_id";
		$stmt = $this->app->db->query ( $sql, array (
				$device_id 
		) );
		
		if ($stmt->rowCount () > 0) {
			return $stmt->fetch ();
		}
		return false;
	}
}
