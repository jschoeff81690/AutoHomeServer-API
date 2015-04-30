<?php
class device_meta_model extends model {
	function __construct() {
		parent::__construct ();
		$this->table_name = "device_meta";
	}
	function get_meta($device_id) {
		$sql = "SELECT * FROM `device_meta` WHERE `device_id`= ?";
		$stmt = $this->app->db->query ( $sql, array (
				$device_id 
		) );
		return $stmt->fetch ();
	}
	function get_history2($device_id) {
		$data = array ();
		
		$sql = "SELECT `device_meta_history`.`date` AS `date`,`device_meta_history`.`value` AS `value` FROM `device_meta_history` WHERE `device_id`= ? ORDER BY `date`";
		$stmt = $this->app->db->query ( $sql, array (
				$device_id 
		) );
		
		$results = $stmt->fetchAll ();
		
		foreach ( $results as $key => $value ) {
			
			// $data [$key] ['x'] = date('Y-m-d H:i:s',strtotime());;
			if (is_numeric ( $value ['value'] )) {
				$data [$key] ['x'] = date ( 'Y-m-d', strtotime ( $value ['date'] ) );
				;
				$data [$key] ['y'] = $value ['value'];
			}
		}
		
		return json_encode ( $data );
	}
	function get_history($device_id) {
		$data = array ();
		
		$sql = "SELECT `device_meta_history`.`date` AS `date`,`device_meta_history`.`value` AS `value` FROM `device_meta_history` WHERE `device_id`= ? ORDER BY `date`";
		$stmt = $this->app->db->query ( $sql, array (
				$device_id 
		) );
		
		$results = $stmt->fetchAll ();
		
		foreach ( $results as $key => $value ) {
			if (is_numeric ( $value ['value'] )) {
				
				$data [$key] ['x'] = $value ['date'];
				$data [$key] ['y'] = $value ['value'];
			}
		}
		
		return json_encode ( $data );
	}
	function get_average_history($device_id) {
		$data = array ();
		
		$sql = "SELECT DATE(`device_meta_history`.`date`) AS `date`,avg(`device_meta_history`.`value` )AS `value` 
			FROM `device_meta_history` 
			WHERE `device_id`= ? 
			group by DATE(`device_meta_history`.`date`)
			order by DATE(`device_meta_history`.`date`) asc";
		$stmt = $this->app->db->query ( $sql, array (
				$device_id 
		) );
		
		$results = $stmt->fetchAll ();
		
		foreach ( $results as $key => $value ) {
			if (is_numeric ( $value ['value'] )) {
				
				$data [$key] ['x'] = $value ['date'];
				$data [$key] ['y'] = $value ['value'];
			}
		}
		
		return json_encode ( $data );
	}
	function update_device_state($device_id, $state) {
		$data = array (
				"device_id" => $device_id,
				"key" => "state",
				"value" => $state 
		);
		
		if (! $this->app->device_meta_model->update ( $data, "`device_id` = '" . $device_id . "'" )) {
			if (! $this->app->device_meta_model->create ( $data )) {
				return false;
			}
		}
		return true;
	}
}

