<?php 
class user {
	private $id;
	private $name;
	private $email;
	private $password;
	private $app;

	function __construct() {
		$this->app = APP::get_instance();
	}

	public function _get($key) {
        if(isset($this->{$key}))
            return $this->{$key};
        return false;
    }

    public function _set($key,$value) {
        $this->{$key} = $value;
    }

    public function dump() {
    	$fields = array("id","name","email","password");
    	$dump = array();
    	foreach($fields as $key) {
    		$dump[$key] = $this->_get($key);
    	}
    	return $dump;
    }
}