<?php
class form_validation {
	
	$table_name = "";
	$fields = array();
	$db_fields = array();
	$hash = "";
	
	/**
	 * Takes an array as input and sets to fields
	 */
	function set_fields($fields) {
		if(is_array($fields)) $this->fields = $fields;
		else $this->fields = array($fields);
	}
	function add_field($key, $value) {
		$this->fields[$key] = $value;
	}

	function set_table($table) {
		$this->table_name = $table;
	}

	function set_hash($key) {
		$this->hash = hash('sha256', $key);
		return $this->hash;
	}

	function set_form_session(&$db) {
		$sql  = "INSERT INTO ".$this->table_name." (`hash`, `values`) VALUES(".$this->hash.",".implode(",",$this->fields).");";
		$db->query($sql);
	}

	function get_form_session(&$db) {

		$sql  = "SELECT * FROM ".$this->table_name." WHERE `hash` ='".$this->hash."';";
		$result = $db->query($sql);
		if($result->rowCount() > 0 ) {
		    $result = $result->fetch();
			$this->db_fields = $result['values']
		}

	}

	function verify_values($fields) {
		foreach($db_fields as $field) {
			if(!isset($fields[$field])) 
				return false;
		}
		return false;
	}
}