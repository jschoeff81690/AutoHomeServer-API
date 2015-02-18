<?php

class form_validator {
	
	// private $table_name = "";
	// private $fields = array();
	// private $db_fields = array();
	// private $hash = "";
	
	/**
	 * Takes an array as input and sets to fields
	 */
	function set_fields($fields) {
		if (is_array ( $fields ))
			$this->fields = $fields;
	}

	function add_field($key, $value) {
		$this->fields [$key] = $value;
	}
	
	// function set_table($table) {
	// $this->table_name = $table;
	// }
	
	// function set_hash($key) {
	// $this->hash = hash('sha256', $key);
	// return $this->hash;
	// }
	
	// function set_form_session(&$db) {
	// $sql = "INSERT INTO ".$this->table_name." (`hash`, `values`)
	// VALUES(".$this->hash.",".implode(",",$this->fields).");";
	// $db->query($sql);
	// }
	
	// function get_form_session(&$db) {
	
	// $sql = "SELECT * FROM ".$this->table_name." WHERE `hash`
	// ='".$this->hash."';";
	// $result = $db->query($sql);
	// if($result->rowCount() > 0 ) {
	// $result = $result->fetch();
	// $this->db_fields = $result['values']
	// }
	
	// }
	function validatePOST($fields, $location = false) {
		if (empty ( $_POST ))
			return false;
		
		foreach ( $_POST as $field => $value ) {
			
			if (! isset ( $fields [$field] )) {
				if ($location)
					$this->app->redirect ( $location );
				else
					return false;
			}
		}
		return true;
	}

}