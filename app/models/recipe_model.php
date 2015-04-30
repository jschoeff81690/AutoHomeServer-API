<?php
class recipe_model extends model {

	function __construct() {
		parent::__construct ();
		$this->table_name = "recipes";
	}
}
