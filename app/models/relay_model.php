<?php

class relay_model extends model {

	function __construct() {
		parent::__construct ();
		$this->table_name = "tests";
	}

	function list_tests() {
		$sql = "SELECT * from tests ORDER BY id DESC";
		$stmt = $this->app->db->query ( $sql );
		$result = $stmt->setFetchMode ( PDO::FETCH_ASSOC );
		$users = array ();
		while ( $user = $stmt->fetch () ) {
			$users [] = $user;
		}
		return $users;
	}

}
