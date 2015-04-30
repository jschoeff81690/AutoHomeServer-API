<?php

class place_model extends model {

	function __construct() {
		parent::__construct ();
		$this->table_name = "places";
		$this->device_table = "place_devices";
	}

	function get_places($system_id){
		$sql = 'SELECT * FROM '.$this->table_name.' WHERE `system_id` = ?';
		$stmt = $this->app->db->query ( $sql, array (
				$system_id 
		) );
		
		if ($stmt->rowCount () > 0) {
			return $stmt->fetchAll ();
		}

		return false;
	}
	
	function get_device_count($place_id){
		$sql = 'SELECT count(*) as count FROM '.$this->device_table.' WHERE `place_id` = ?';
		$stmt = $this->app->db->query ( $sql, array (
				$place_id 
		) );
		
		if ($stmt->rowCount () > 0) {
			$result =$stmt->fetch();
			if(isset($result['count']) )
				return $result['count'];
		}

		return false;
	}

	function get_devices($place_id) {
		$sql = 'SELECT * FROM '.$this->device_table.' WHERE `place_id` = ?';
		$stmt = $this->app->db->query ( $sql, array (
				$place_id 
		) );
		
		if ($stmt->rowCount () > 0) {
			$result =$stmt->fetchAll();
			$devices = array();
			foreach($result as $device) {
				$sql2 = "SELECT d.*,dt.*,dat.* FROM `devices`as d,`device_types` as dt,`data_types` as dat WHERE d.device_id = ? AND d.device_type_id = dt.type_id AND dt.data_type_id = dat.data_type_id";
				$stmt2 = $this->app->db->query ( $sql2, array (
						$device['device_id'] 
				) );
				
				if ($stmt2->rowCount () > 0) {
					$result = $stmt2->fetch ();
					$sql3 = "SELECT modified FROM device_meta WHERE device_id=? ORDER BY modified DESC LIMIT  1";
					$stmt3 = $this->app->db->query ( $sql3, array (
							$device['device_id'] 
					) );
					$result['modified'] = '';
					if ($stmt3->rowCount () > 0) {
						$mod_result = $stmt3->fetch();
						$result['modified'] = $mod_result['modified'];
					}
					$devices[] = $result;
				}
			}
			return $devices;
		}

		return false;
	}	
}
