<?php
class device_type_model extends model {
	
	function __construct()
	{
		parent::__construct();
		$this->table_name = "device_types";
	}
}
