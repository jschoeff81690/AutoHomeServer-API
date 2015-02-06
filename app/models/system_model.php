<?php
class system_model extends model {
	
	function __construct()
	{
		parent::__construct();
		$this->table_name = "systems";
	}


	function get_all_json() {
		$sql = "SELECT * FROM `systems` ORDER BY `date_created` DESC";
		$stmt = $this->app->db->query( $sql);
		$this->app->load_object('system');
		$result = $stmt->setFetchMode(PDO::FETCH_CLASS,'system');
		$systems = '[';
		while($system = $stmt->fetch() ) {
			$systems .= $system->to_json().',';
		}

    	$systems = rtrim($systems, ',');
    	$systems .= ']';
		return $systems;
	}
}
