<?php 
class api_handler {
	private $success     = true;
	private $message     = '';
	private $data        = array();
	private $data_encode = array();

	function __construct() {

	}

	function success($bool) {
		$this->success = $bool;
	}

	function data_encode($key, $value) {
		$this->data_encode[$key] = $value;
	}

	function data($key, $value) {
		$this->data[$key] = $value;
	}
	function respond() {
    	$output =  '{';
    	if($this->success) {
    		foreach($this->data_encode as $key=>$value) {
    			$output .= '"'.$key.'":'.json_encode($value).',';
	    	}
	    	foreach($this->data as $key=>$value) {
	    		$output .= '"'.$key.'":'.$value.',';
	    	}
    	}
    	else {
	    		$output .= '"message":"'.$this->data['message'].'",';
    	}
    	$output .= '"success":"'.json_encode($this->success).'"';
    	$output .= '}';
    	return $output;
	}

	function respond_error($message) {
		$this->data('message',$message);
		$this->success(false);
		return $this->respond();
	}

}
