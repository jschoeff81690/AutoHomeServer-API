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

	function get_last_request($sid, $rid) {
		$sql = "SELECT r.*, d.ip_address,d.secret_key, d.chip_id FROM `requests` as r, `devices` as d WHERE r.`device_id` = d.`device_id` AND r.`system_id` = '" . $sid . "' AND `state` = \"pending\" AND r.`request_id` ='" . $rid . "'";
		$stmt = $this->app->db->query ( $sql );
		$requests = $stmt->fetch ();
		//setup cipher
		$plaintext = $requests['chip_id'];
		$len = strlen($plaintext);
		$num = 16-($len%16);
		if($len%16 != 0)
			for($i=0; $i < $num; $i++)
				$plaintext .= " ";
		$key = $requests['secret_key'];
		$aes = new aes_util();
		$raw_iv = $aes->generate_iv();
		$iv = bin2hex($raw_iv);
		$cipher = "";
		if(	$aes->set_key($key, $raw_iv)) {
			$cipher = $aes->encrypt($plaintext);
		}
		$requests['c'] = bin2hex($cipher);
		$requests['iv']= $iv;
		unset($requests['secret_key']);
		unset($requests['chip_id']);
		return json_encode ( $requests );
	}
}
