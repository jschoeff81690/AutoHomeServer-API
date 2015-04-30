<?php

class devices extends controller {

	private $api_handler;

	function __construct() {
		parent::__construct ();
		$this->api_handler = new api_handler ();
		$this->fv = new form_validator ();
		$this->app->load_model ( 'device_model' );
		$this->app->load_model ( 'device_meta_model' );
		$this->app->load_model ( 'device_type_model' );
	}

	function index() {
		$_SESSION ['referrer'] = 'devices';
		if ($this->app->_logged) {
			$data ['main_content'] = 'devices/main_content';
			$data ['active_link'] = "devices";
			$daat['header'] = 'My Devices';
			$data ['user_devices'] = $this->get_user_devices ();
			$this->app->load_view ( 'dashboard', $data );
		} else {
			$this->app->load_view ( 'landing' );
		}
	}
	
	
	function security() {
		$_SESSION ['referrer'] = 'devices/security';
		if ($this->app->_logged) {
			$data ['main_content'] = 'devices/main_content';
			$data ['active_link'] = "security";
			$data['header'] = 'My Security Components';
			$data ['user_devices'] = $this->_get_devices_by_type(array(9,10));
			$this->app->load_view ( 'dashboard', $data );
		} else {
			$this->app->load_view ( 'landing' );
		}
	}
	
	function ambience() {
		$_SESSION ['referrer'] = 'devices/ambience';
		if ($this->app->_logged) {
			$data ['main_content'] = 'devices/main_content';
			$data ['active_link'] = "ambience";
			$data['header'] = 'My Ambient Components';
			$data ['user_devices'] = $this->_get_devices_by_type(array(7,12,17,18));
			$this->app->load_view ( 'dashboard', $data );
		} else {
			$this->app->load_view ( 'landing' );
		}
	}

	function outlets() {
		$_SESSION ['referrer'] = 'devices/outlets';
		if ($this->app->_logged) {
			$data ['main_content'] = 'devices/main_content';
			$data ['active_link'] = "outlets";
			$data ['header'] = 'My Outlets';
			$data ['user_devices'] = $this->_get_devices_by_type(8);
			$this->app->load_view ( 'dashboard', $data );
		} else {
			$this->app->load_view ( 'landing' );
		}
	}
	
	function _get_devices_by_type($types) {
		$system = $this->app->user_model->get_system ( $this->app->user->_get ( 'id' ) );
		if(!is_array($types))
			$types = array($types);

		$devices = array();
		foreach($types as $device_type_id) {
			//get device by type, and system
			$devices = array_merge ( $devices, $this->app->device_model->get_typed_devices($system['system_id'], $device_type_id) );
		}
		if ($devices != false && count ( $devices ) > 0) {
			for($i = 0; $i < count ( $devices ); $i ++) {
				$meta = $this->app->device_meta_model->read ( 'device_id', $devices [$i] ['device_id'] );
				$devices [$i] ['meta'] = $meta;
			}
		} else
			$devices = array ();

		return $devices;
	}


	function insert() {
		$this->fv->validatePOST ( array (
				"name" => "1",
				"chip_id" => "1" 
		), "devices/add" );
		// if( $permisson->edit("device",$this->user)) return false;
		$this->app->load_model ( "system_model" );
		$system = $this->app->system_model->get_by_user ( $this->app->user->_get ( 'id' ) );
		$data = array (
				'name' => $_POST ['name'],
				'chip_id' => $_POST ['chip_id'],
				'system_id' => $system ['system_id'] 
		);
		// create and confirm it was a success
		if ($this->app->device_model->create ( $data )) {
			$device_id = $this->app->device_model->get_last_id ();
			$this->app->redirect ( "devices/view/" . $device_type_id );
		} else {
			echo 'We are sorry, but there was an error adding your device.';
		}
	}

	function ajax_add() {
		// var_dump($_POST);
		$safe = $this->fv->validatePOST ( array (
				"name" => "1",
				"chip_id" => "1" 
		) );
		if (! $safe) {
			echo $this->api_handler->respond_error ( 'Error: missing authentication.' );
			return;
		}
		// if( $permisson->edit("device",$this->user)) return false;
		$this->app->load_model ( "system_model" );
		$system = $this->app->system_model->get_by_user ( $this->app->user->_get ( 'id' ) );
		$manufact_device = $this->app->device_model->manufacture_device ( $_POST ['chip_id'] );
		
		if ($manufact_device == false) {
			echo $this->api_handler->respond_error ( 'We are sorry, your chip_id was not found.' );
			return;
		}
		
		$data = array (
				'name' => $_POST ['name'],
				'chip_id' => $_POST ['chip_id'],
				'device_type_id' => $manufact_device ['device_type_id'],
				'system_id' => $system ['system_id'] 
		);
		// create and confirm it was a success
		if ($this->app->device_model->create ( $data )) {
			$device_id = $this->app->device_model->get_last_id ();
			// $this->app->redirect("devices/view/".$device_type_id);
			$data ['id'] = $device_id;
			$this->api_handler->data_encode ( 'object', $data );
			$this->api_handler->data_encode ( 'message', "Device was successfully added." );
			echo $this->api_handler->respond ();
			// echo $device_id;
		} else {
			echo $this->api_handler->respond_error ( 'We are sorry, but there was an error adding your device.' );
		}
	}

	function add() {
		$this->check_logged ();
		$data ['main_content'] = 'devices/new_device';
		$data ['active_link'] = "devices";
		$this->app->load_view ( 'dashboard', $data );
	}

	function form_view($params = false) {
		$this->check_logged ();
		$count = 0;
		if (isset ( $params [0] ) && is_numeric ( $params [0] ))
			$count = $params [0];
		$this->app->load_view ( 'devices/new_device', array (
				'ajax_count' => $count 
		) );
	}

	function get_user_devices() {
		$system = $this->app->user_model->get_system ( $this->app->user->_get ( 'id' ) );
		$devices = $this->app->user_model->get_devices ( $system ['system_id'] );
		$this->app->load_model ( 'device_meta_model' );
		if ($devices != false && count ( $devices ) > 0) {
			for($i = 0; $i < count ( $devices ); $i ++) {
				$meta = $this->app->device_meta_model->read ( 'device_id', $devices [$i] ['device_id'] );
				$devices [$i] ['meta'] = $meta;
			}
		} else
			$devices = array ();
		return $devices;
	}


	function get_history2($device_id) {
		$this->app->load_model ( 'device_meta_model' );
		$history = $this->app->device_meta_model->get_history2( $device_id [0] );
		echo $history;
	}

	function get_history($device_id) {
		$this->app->load_model ( 'device_meta_model' );
		$history = $this->app->device_meta_model->get_history ( $device_id [0] );
		echo $history;
	}
	function get_average_history($device_id) {
		$this->app->load_model ( 'device_meta_model' );
		$history = $this->app->device_meta_model->get_average_history ( $device_id [0] );
		echo $history;
	}
	function history($device_id) {
		$this->app->load_model ( 'device_meta_model' );
		
		$data ['main_content'] = 'devices/history';
		$data ['active_link'] = "dashboard";
		//$data ['graph_data'] = $this->app->device_meta_model->get_history ( $device_id [0] );
		
		$this->app->load_view ( 'dashboard', $data );
	}

	function notify($device_id) {
	}
}
