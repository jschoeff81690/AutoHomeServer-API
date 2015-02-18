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

}
