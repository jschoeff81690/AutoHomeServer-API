<?php
class system_model extends model {
	
	function __construct()
	{
		parent::__construct();
		$this->table_name = "systems";
	}
}
