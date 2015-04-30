<?php

class requests extends controller {

	private $api_handler;

	function __construct() {
		parent::__construct ();
		$this->api_handler = new api_handler ();
		$this->app->load_model ( 'request_model' );
	}

	function index() {
	}

	function add($params = false) {
		$this->app->load_model ( "device_meta_model" );
		if (isset ( $_POST ['action_type'] )) {
			// needs to change, this only works with switches, this sould do a check on datatype then set value
			$action = (isset ( $_POST ['action'] )) ? $_POST ['action'] : "off";
			$request = array (
					"system_id" => $_POST ['system_id'],
					"device_id" => $_POST ['device_id'],
					"action" => $action 
			);
			$data = array (
					"device_id" => $_POST ['device_id'],
					"key" => 'state',
					"value" => $action 
			);
			
			$meta_result = $this->app->device_meta_model->update_device_state ( $_POST ['device_id'], $action );
			if ($meta_result) {
				// create the request in db
				if ($result = $this->app->request_model->create ( $request )) {
					
					// create the request in users sqs queue
					$rid = $this->app->request_model->get_last_id ();
					
					$db_requests = $this->app->request_model->get_last_request ( $_POST ['system_id'], $rid );
					
					$client = Aws\Sqs\SqsClient::factory ( array (
							'region' => 'us-east-1' 
					) );
					
					$createQueueResult = $client->createQueue ( array (
							'QueueName' => 'system' . $_POST ['system_id'] 
					) );
					
					$queueUrl = $createQueueResult->get ( 'QueueUrl' );
					
					$client->sendMessage ( array (
							'QueueUrl' => $queueUrl,
							'MessageBody' => $db_requests 
					) );
					if (isset ( $_SESSION ['referrer'] ))
						$this->app->redirect ( $_SESSION ['referrer'] );
					else
						$this->app->redirect ( "home" );
				} else {
					if (isset ( $_SESSION ['referrer'] ))
						$this->app->redirect ( $_SESSION ['referrer'] );
					else
						$this->app->redirect ( "home" );
				}
			}
		}
	}

	function send_message() {
		$client = Aws\Sns\SnsClient::factory ( array (
				'region' => 'us-east-1' 
		) );
		
		$result1 = $client->getTopicAttributes ( array (
				'TopicArn' => 'arn:aws:sns:us-east-1:270069375191:Test' 
		) );
		echo "<pre>";
		echo var_dump ( $result1 );
		echo "<pre>";
		
		$result2 = $client->getSubscriptionAttributes ( array (
				'SubscriptionArn' => 'arn:aws:sns:us-east-1:270069375191:Test:62c85636-edd0-4174-83bb-6bad1f43f3f7' 
		) );
		echo "<pre> Subscription ";
		echo var_dump ( $result2 );
		echo "<pre>";
	}

	function send_email() {
		$client = Aws\Ses\SesClient::factory ( array (
				'region' => 'us-east-1' 
		) );
		
		$result = $client->sendEmail ( array (
				
				// Source is required
				'Source' => 'autohome0@gmail.com',
				
				// Destination is required
				'Destination' => array (
						'ToAddresses' => array (
								'7862597659@tmomail.net' 
						) 
				),
				
				// Message is required
				'Message' => array (
						
						// Subject is required
						'Subject' => array (
								
								// Data is required
								'Data' => 'Home Intrusion' 
						),
						
						// Body is required
						'Body' => array (
								'Text' => array (
										
										// Data is required
										'Data' => "The Reed sensor has been tripped." 
								) 
						) 
				) 
		) );
		echo "<pre>";
		echo var_dump ( $result );
		echo "<pre>";
	}
}
