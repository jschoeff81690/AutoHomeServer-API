<?php

class request_model extends model {

	function __construct() {
		parent::__construct ();
		$this->table_name = "requests";
	}

	function get_all() {
		$sql = "SELECT * FROM `requests` ORDER BY `date_created` DESC";
		$stmt = $this->app->db->query ( $sql );
		$this->app->load_object ( "request" );
		$result = $stmt->setFetchMode ( PDO::FETCH_CLASS, "request" );
		$requests = array ();
		while ( $request = $stmt->fetch () ) {
			$requests [] = $request;
		}
		return $requests;
	}

	function get_all_json() {
		$sql = "SELECT r.*, d.ip_address FROM `requests` as r, `devices` as d WHERE r.`device_id` = d.`device_id` AND `state` = \"pending\" ORDER BY `date_created` DESC";
		$stmt = $this->app->db->query ( $sql );
		$this->app->load_object ( "request" );
		$result = $stmt->setFetchMode ( PDO::FETCH_CLASS, "request" );
		$requests = '[';
		while ( $request = $stmt->fetch () ) {
			$requests .= $request->to_json () . ',';
		}
		
		$requests = rtrim ( $requests, ',' );
		$requests .= ']';
		return $requests;
	}

	function get_system($id) {
		$sql = "SELECT r.*, d.ip_address FROM `requests` as r, `devices` as d WHERE r.`device_id` = d.`device_id` AND r.`system_id` = '" . $id . "' AND `state` = \"pending\" ORDER BY `date_created` DESC";
		$stmt = $this->app->db->query ( $sql );
		$requests = $stmt->fetchAll ();
		return json_encode ( $requests );
	}

}
