<?php

class devices extends controller
{

    private $api_handler;

    function __construct ()
    {
        parent::__construct();
        $this->api_handler = new api_handler();
        $this->fv = new form_validator();
        $this->app->load_model('device_model');
    }

    function index ()
    {
        if ($this->app->_logged) {
            $data['main_content'] = 'devices/main_content';
            $data['active_link'] = "devices";
            $this->app->load_view('dashboard', $data);
        } else {
            $this->app->load_view('landing');
        }
    }

    function insert ()
    {
        $this->fv->validatePOST(
                array(
                        "name" => "1",
                        "chip_id" => "1"
                ), "devices/add");
        // if( $permisson->edit("device",$this->user)) return false;
        $this->app->load_model("system_model");
        $system = $this->app->system_model->get_by_user(
                $this->app->user->_get('id'));
        $data = array(
                'name' => $_POST['name'],
                'chip_id' => $_POST['chip_id'],
                'system_id' => $system['system_id']
        );
        // create and confirm it was a success
        if ($this->app->device_model->create($data)) {
            $device_id = $this->app->device_model->get_last_id();
            $this->app->redirect("devices/view/" . $device_type_id);
        } else {
            echo 'We are sorry, but there was an error adding your device.';
        }
    }

    function ajax_add ()
    {
        $this->fv->validatePOST(
                array(
                        "name" => "1",
                        "chip_id" => "1"
                ));
        // if( $permisson->edit("device",$this->user)) return false;
        $this->app->load_model("system_model");
        $system = $this->app->system_model->get_by_user(
                $this->app->user->_get('id'));
        $data = array(
                'name' => $_POST['name'],
                'chip_id' => $_POST['chip_id'],
                'system_id' => $system['system_id']
        );
        // create and confirm it was a success
        if ($this->app->device_model->create($data)) {
            $device_id = $this->app->device_model->get_last_id();
            // $this->app->redirect("devices/view/".$device_type_id);
            echo $device_id;
        } else {
            echo 'We are sorry, but there was an error adding your device.';
        }
    }

    function add ()
    {
        $this->check_logged();
        $data['main_content'] = 'devices/new_device';
        $data['active_link'] = "devices";
        $this->app->load_view('dashboard', $data);
    }

    function form_view ()
    {
        $this->check_logged();
        $this->app->load_view('devices/new_device', 
                array(
                        'ajax' => '1'
                ));
    }

    function all ($key = true)
    {
        if ($key != false) {
            //
            // handle security with key here
            //
            $devices = $this->app->device_model->get_all_json();
            $this->api_handler->data('data', $devices);
            echo $this->api_handler->respond();
        } else {
            echo $this->api_handler->respond_error(
                    'Error: missing authentication.');
        }
    }

    function updateip ($params = false)
    {
        $fields = array(
                "chip_id" => "1",
                "ip_address" => "1"
        );
        $device_model = &$this->app->device_model;
        // change to fv->validate($fields) && $check_key && permission
        if (! $this->fv->validatePOST($fields)) {
            echo $this->api_handler->respond_error('Error: Missing Parameters.');
            return;
        }
        if (isset($_POST['chip_id']))
            $result = $device_model->read("chip_id", $_POST['chip_id']);
        else
            $result = false;
        if ($result) {
            $data = array(
                    "ip_address" => $_POST['ip_address']
            );
            
            if ($this->app->device_model->update($data, 
                    "`chip_id` = '" . $_POST['chip_id'] . "'")) {
                echo $this->api_handler->respond();
            } else {
                echo $this->api_handler->respond_error(
                        'Error: couldn\'t update.');
            }
        } else {
            echo $this->api_handler->respond_error(
                    'Error: Incorrect `chip_id`.');
        }
    }

    function updatesensors ($params = false)
    {
        $fields = array(
                "chip_id" => "1",
                "sensortype" => "1",
                "value" => "1"
        );
        $device_model = &$this->app->device_model;
        // change to fv->validate($fields) && $check_key && permission
        if (! $this->fv->validatePOST($fields)) {
            echo $this->api_handler->respond_error('Error: Missing Parameters.');
            return;
        }
        
        echo "<pre>";
        echo var_dump($_POST);
        echo "</pre>";
        
        if (isset($_POST['chip_id']))
            $result = $device_model->read("chip_id", $_POST['chip_id']);
        else
            $result = false;
        if ($result) {
            $data = array(
                    "sensortype" => $_POST['sensortype'],
                    "value" => $_POST['value']
            );
            
            if ($this->app->device_model->update($data, 
                    "`chip_id` = '" . $_POST['chip_id'] . "'")) {
                echo $this->api_handler->respond();
            } else {
                echo $this->api_handler->respond_error(
                        'Error: couldn\'t update.');
            }
        } else {
            echo $this->api_handler->respond_error(
                    'Error: Incorrect `chip_id`.');
        }
    }
}
