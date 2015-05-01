<?php
class devices extends controller {

	private $api_handler;

	function __construct() {
		parent::__construct ();
		$this->api_handler = new api_handler ();
		$this->fv = new form_validator ();
		$this->rh = new recipe_handler ();
		$this->app->load_model ( 'device_model' );
	}

	function index() {
		echo $this->api_handler->respond_error ( 'Error: device action to perform' );
	}

	function all($key = true) {
		if ($key != false) {
			//
			// handle security with key here
			//
			$devices = $this->app->device_model->get_all_json ();
			$this->api_handler->data ( 'data', $devices );
			echo $this->api_handler->respond ();
		} else {
			echo $this->api_handler->respond_error ( 'Error: missing authentication.' );
		}
	}

	function update_ip_secure($params = false) {
		$fields = array (
				"chip_id" => "1",
				"ip_address" => "1", 
				"data" => "1",
				"value" => "1"
		);
		$device_model = &$this->app->device_model;
		// change to fv->validate($fields) && $check_key && permission
		if (! $this->fv->validatePOST ( $fields )) {
			echo $this->api_handler->respond_error ( 'Error: Missing Parameters.' );
			return;
		}
		if (isset ( $_POST ['chip_id'] ))
			$result = $device_model->read ( "chip_id", $_POST ['chip_id'] );
		else
			$result = false;
		if ($result) {
			$key = $result['secret_key'];
			$iv = pack("H*",$_POST['value']);
			$cipher = pack("H*", $_POST['data']); 
			$aes = new aes_util();
			if(	$aes->set_key($key, $iv)) {

				$plain = $aes->decrypt($cipher);
				$cipher_id = trim($plain);
				if($result['chip_id'] != $cipher_id) {
					echo $this->api_handler->respond_error ( 'Error: Unauthorized.' );
					return;
				}
				//continue safely
			}

			$data = array (
					"ip_address" => $_POST ['ip_address'] 
			);
			
			if ($this->app->device_model->update ( $data, "`chip_id` = '" . $_POST ['chip_id'] . "'" )) {
				echo $this->api_handler->respond ();
			} else {
				echo $this->api_handler->respond_error ( 'Error: couldn\'t update.' );
			}
		} else {
			echo $this->api_handler->respond_error ( 'Error: Incorrect `chip_id`.' );
		}
	}

	function update_ip($params = false) {
		$fields = array (
				"chip_id" => "1",
				"ip_address" => "1" 
		);
		$device_model = &$this->app->device_model;
		// change to fv->validate($fields) && $check_key && permission
		if (! $this->fv->validatePOST ( $fields )) {
			echo $this->api_handler->respond_error ( 'Error: Missing Parameters.' );
			return;
		}
		if (isset ( $_POST ['chip_id'] ))
			$result = $device_model->read ( "chip_id", $_POST ['chip_id'] );
		else
			$result = false;
		if ($result) {
			$data = array (
					"ip_address" => $_POST ['ip_address'] 
			);
			
			if ($this->app->device_model->update ( $data, "`chip_id` = '" . $_POST ['chip_id'] . "'" )) {
				echo $this->api_handler->respond ();
			} else {
				echo $this->api_handler->respond_error ( 'Error: couldn\'t update.' );
			}
		} else {
			echo $this->api_handler->respond_error ( 'Error: Incorrect `chip_id`.' );
		}
	}

	function update_meta($params = false) {
		$fields = array (
				"chip_id" => "1",
				"key" => "1",
				"value" => "1" 
		);
		
		$device_model = &$this->app->device_model;
		// change to fv->validate($fields) && $check_key && permission
		if (! $this->fv->validatePOST ( $fields )) {
			echo $this->api_handler->respond_error ( 'Error: Missing Parameters.' );
			return;
		}
		
		$result = $device_model->read ( "chip_id", $_POST ['chip_id'] );
		if ($result != false) {
			
			if (isset ( $result [0] ))
				$result = $result [0];
			$value = $_POST['value'];
			$value = $this->_get_value($result,$value);
			$data = array (
					"device_id" => $result ['device_id'],
					"key" => $_POST ['key'],
					"value" => $value,
					"modified" => date('Y-m-d H:i:s', time()) 
			);
			$this->app->load_model ( "device_meta_model" );
			$exists = $this->app->device_meta_model->read ( array (
					"device_id",
					"key" 
			), array (
					$result ['device_id'],
					$_POST ['key'] 
			) );
			
			if ($exists) {
				if ($this->app->device_meta_model->update ( $data, "`device_id` = '" . $result ['device_id'] . "'" )) {
					echo $this->api_handler->respond ();
					// check recipes using recipe handler(rh)
					$this->rh->trigger ( $result ['device_id'] );
				} else {
					echo $this->api_handler->respond_error ( 'Error: couldn\'t update.' );
				}
			} else {
				if ($this->app->device_meta_model->create ( $data )) {
					echo $this->api_handler->respond ();
					// check for recipes
					$this->rh->trigger ( $result ['device_id'] );
				} else {
					echo $this->api_handler->respond_error ( 'Error: couldn\'t update.' );
				}
			}
		} else {
			echo $this->api_handler->respond_error ( 'Error: Incorrect `chip_id`.' );
		}
	}

	function update_meta_by_name($params = false) {
		$fields = array (
				"device_name" => "1",
				"sid" => "1",
				"key" => "1",
				"value" => "1" 
		);
		
		$device_model = &$this->app->device_model;
		// change to fv->validate($fields) && $check_key && permission
		if (! $this->fv->validatePOST ( $fields )) {
			echo $this->api_handler->respond_error ( 'Error: Missing Parameters.' );
			return;
		}
		
		$result = $device_model->read ( array (
				"name",
				"system_id" 
		), array (
				$_POST ['device_name'],
				$_POST ['sid'] 
		) );
		if ($result) {
			$data = array (
					"device_id" => $result ['device_id'],
					"key" => $_POST ['key'],
					"value" => $_POST ['value'] 
			);
			$this->app->load_model ( "device_meta_model" );
			$exists = $this->app->device_meta_model->read ( array (
					"device_id",
					"key" 
			), array (
					$result ['device_id'],
					$_POST ['key'] 
			) );
			
			if ($exists) {
				if ($this->app->device_meta_model->update ( $data, "`device_id` = '" . $result ['device_id'] . "'" )) {
					$this->rh->trigger ( $result ['device_id'] );
					// $this->_create_request($result,$_POST['value']);
				} else {
					echo $this->api_handler->respond_error ( 'Error: couldn\'t update.' );
				}
			} else {
				if ($this->app->device_meta_model->create ( $data )) {
					$this->rh->trigger ( $result ['device_id'] );
				} else {
					echo $this->api_handler->respond_error ( 'Error: couldn\'t update.' );
				}
			}
		} else {
			echo $this->api_handler->respond_error ( 'Error: Cannot find device name.' );
		}
	}

	function _create_request($device, $action) {
		$this->app->load_model ( 'request_model' );
		$request = array (
				'device_id' => $device ['device_id'],
				'system_id' => $device ['system_id'],
				'action' => $action 
		);
		// create the request
		$this->app->request_model->create ( $request );
		$rid = $this->app->request_model->get_last_id ();
		// get the newly created request
		$db_request = $this->app->request_model->get_last_request ( $device ['system_id'], $rid );
		
		$client = Aws\Sqs\SqsClient::factory ( array (
				'region' => 'us-east-1' 
		) );
		
		$result = $client->createQueue ( array (
				'QueueName' => 'system' . $device ['system_id'] 
		) );
		
		$queueUrl = $result->get ( 'QueueUrl' );
		
		$client->sendMessage ( array (
				'QueueUrl' => $queueUrl,
				'MessageBody' => json_encode ( $db_request ) 
		) );
	}

	function _get_value($result, $value){
		if($result['device_type_id'] == 7 ){
			$resistance = 221000/((3.3/($value/1000)) - 1);
			$tmp = log($resistance);
			$temp = 1/(0.0014 + (0.000218 * $tmp) + (0.0000000996741 * $tmp * $tmp * $tmp)); 
			$value =  floor((($temp - 273.15)*1.80 + 32)+.5);  		
		}
		return $value;
	}
	
	function hash($params=false) {
		$text = $params[0];
		$raw = hash ( 'sha256', $text );
		var_dump(substr($raw,0,32) );
	}

	function test_aes($params=false){
		$key= "12345678912345678912345678901234";
		//$key= "D>m|z7&pIg]y4I?3|dy$-,9DmYo]&<O!";
		//$iv = "1234567891234567";
		$data = "10455290-detected-".time();
		$aes = new aes_util();
		$arw = $aes->generate_iv();
		var_dump($arw);
		var_dump(bin2hex($arw));
		if(	$aes->set_key($key,$arw)) {
			$c = $aes->encrypt($data);
			//$c = pack("H*" ,"E462082AA608187CB77954F147705927");
			$p = $aes->decrypt($c);
			
			$position = strpos($p,"---");
			if($position !== false) {
				$plaintext = substr($p,0,$position);
				var_dump("Err");
				var_dump(trim($plaintext));
			}
			var_dump(strtotime(time()))	;
			var_dump($data);
			var_dump($c);
			var_dump(bin2hex($c));
			var_dump($p);
		}
	}


	function update_meta_secure($params = false) {
		$fields = array (
				"chip_id" => "1",
				"data" => "1",
				"val" => "1", 
				"key" => "1",
				"value" => "1" 
		);
		
		$device_model = &$this->app->device_model;
		// change to fv->validate($fields) && $check_key && permission
		if (! $this->fv->validatePOST ( $fields )) {
			echo $this->api_handler->respond_error ( 'Error: Missing Parameters.' );
			return;
		}
		
		$result = $device_model->read ( "chip_id", $_POST ['chip_id'] );
		if ($result != false) {
			
			$key = $result['secret_key'];
			$iv = pack("H*",$_POST['val']);
			$cipher = pack("H*", $_POST['data']); 
			$aes = new aes_util();
			if(	$aes->set_key($key, $iv)) {

				$plain = $aes->decrypt($cipher);
				$cipher_id = trim($plain);
				if($result['chip_id'] != $cipher_id) {
					echo $this->api_handler->respond_error ( 'Error: Unauthorized.' );
					return;
				}
				//continue safely

			}
			

			if (isset ( $result [0] ))
				$result = $result [0];
			$value = $_POST['value'];
			$value = $this->_get_value($result,$value);
			$data = array (
					"device_id" => $result ['device_id'],
					"key" => $_POST ['key'],
					"value" => $value,
					"modified" => date('Y-m-d H:i:s', time()) 
			);
			$this->app->load_model ( "device_meta_model" );
			$exists = $this->app->device_meta_model->read ( array (
					"device_id",
					"key" 
			), array (
					$result ['device_id'],
					$_POST ['key'] 
			) );
			
			if ($exists) {
				if ($this->app->device_meta_model->update ( $data, "`device_id` = '" . $result ['device_id'] . "'" )) {
					echo $this->api_handler->respond ();
					// check recipes using recipe handler(rh)
					$this->rh->trigger ( $result ['device_id'] );
				} else {
					echo $this->api_handler->respond_error ( 'Error: couldn\'t update.' );
				}
			} else {
				if ($this->app->device_meta_model->create ( $data )) {
					echo $this->api_handler->respond ();
					// check for recipes
					$this->rh->trigger ( $result ['device_id'] );
				} else {
					echo $this->api_handler->respond_error ( 'Error: couldn\'t update.' );
				}
			}
		} else {
			echo $this->api_handler->respond_error ( 'Error: Incorrect `chip_id`.' );
		}
	}

}

