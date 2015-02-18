<?php

class system_model extends model {

	function __construct() {
		parent::__construct ();
		$this->table_name = "systems";
	}

	function get_all_json() {
		$sql = "SELECT * FROM `" . $this->table_name . "` ORDER BY `date_created` DESC";
		$stmt = $this->app->db->query ( $sql );
		$this->app->load_object ( 'system' );
		$result = $stmt->setFetchMode ( PDO::FETCH_CLASS, 'system' );
		$systems = '[';
		while ( $system = $stmt->fetch () ) {
			$systems .= $system->to_json () . ',';
		}
		
		$systems = rtrim ( $systems, ',' );
		$systems .= ']';
		return $systems;
	}

	function get_by_user($uid) {
		$sql = "SELECT * FROM `" . $this->table_name . "` WHERE user_id = ? ";
		$stmt = $this->app->db->query ( $sql, array (
				$uid 
		) );
		return $stmt->fetch ();
	}

}
