<?php

class requests extends controller
{

    private $api_handler;

    function __construct ()
    {
        parent::__construct();
        $this->api_handler = new api_handler();
        $this->app->load_model('request_model');
    }

    function index ()
    {}

    function all ($key = true)
    {
        if ($key != false) {
            //
            // handle security with key here
            //
            $requests = $this->app->request_model->get_all_json();
            $this->api_handler->success(true);
            $this->api_handler->data('data', $requests);
            echo $this->api_handler->respond();
        } else {
            echo $this->api_handler->respond_error(
                    'Error: missing authentication.');
        }
    }

    function find ($params)
    {
        if (! empty($params) && isset($params[0])) {
            //
            // handle security with key here
            // -- add to if "&& isset($params[1])" to check for key
            //
            $requests = $this->app->request_model->get_system($params[0]);
            $this->api_handler->success(true);
            $this->api_handler->data('data', $requests);
            echo $this->api_handler->respond();
        } else {
            echo $this->api_handler->respond_error(
                    'Error: missing authentication.');
        }
    }

    function add ($params = false)
    {
        if (isset($_POST['action_type'])) {
            $action = (isset($_POST['action'])) ? $_POST['action'] : "off";
            $request = array(
                    "system_id" => $_POST['system_id'],
                    "device_id" => $_POST['device_id'],
                    "action" => $action
            );
            if ($result = $this->app->request_model->create($request)) {
                $this->app->redirect("home");
            } else {
                $this->app->redirect("home");
            }
        }
    }

    function updatestate ($params)
    {
        if (strtolower($params[0]) == "request_id") {
            $result = $this->app->request_model->read("request_id", $params[1]);
            if ($result) {
                if ($params[2] == "state" && count($params) == 4) {
                    $state = $params[3];
                    
                    $data = array(
                            "state" => $state
                    );
                    if ($this->app->request_model->update($data, 
                            "`request_id` = '" . $params[1] . "'")) {
                        echo $this->api_handler->respond();
                    } else {
                        echo $this->api_handler->respond_error(
                                'Error: coudlnt update.');
                    }
                } else {
                    echo $this->api_handler->respond_error(
                            'Error: missing params.');
                }
            } else {
                echo $this->api_handler->respond_error(
                        'Error: invalid requestID.');
            }
        } else {
            echo $this->api_handler->respond_error('Error: invalid request.');
        }
    }
}
