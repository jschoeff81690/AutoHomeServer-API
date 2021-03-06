<?php

class system {

	private $system_id;

	private $name;

	private $description;

	private $date_created;

	function __construct() {
	}

	public function _get($key) {
		if (isset ( $this->{$key} ))
			return $this->{$key};
		return false;
	}

	public function _set($key, $value) {
		$this->{$key} = $value;
	}

	public function to_json() {
		$output = '{';
		foreach ( $this as $key => $value ) {
			$output .= '"' . $key . '":"' . $value . '",';
		}
		$output = rtrim ( $output, ',' );
		$output .= '}';
		return $output;
	}

}