<?php
class recipe_handler {
	function __construct() {
		$this->app = APP::get_instance ();
		$this->notifier = new notifier();
	}
	function trigger($device_id) {
		$this->app->load_model ( 'this_block_model' );
		$this->app->load_model ( 'that_block_model' );
		$this->app->load_model ( 'recipe_model' );
		$this->app->load_model ( 'request_model' );
		$this->app->load_model ( 'device_meta_model' );
		$this_blocks = $this->app->this_block_model->read ( 'monitor_id', $device_id );
		// is there any this_blocks with this device as the monitor?
		if ($this_blocks != false) {
			// since read() can return a single row(for one block) or an array with many blocks
			// we have to check if element 0 isset. if not, we have a single row, lets make it an array of rows
			if (! isset ( $this_blocks [0] ))
				$this_blocks = array (
						$this_blocks 
				);
				
				// using this blocks find their recipes and then trigger actors based on each recipe
			foreach ( $this_blocks as $this_block ) {
				$blocks_from_recipe = $this->app->this_block_model->read ( 'recipe_id', $this_block ['recipe_id'] );
			
				if ($blocks_from_recipe != false) {
					// get the recipe associated with block
					$recipe = $this->app->recipe_model->read ( "recipe_id", $this_block ['recipe_id'] );
					
					// we can have this blocks for recipe, this will be the end result if all conditions are met or not
					$is_true = true;
					
					// make sure the result is an iterable array if only one row returned
					if (! isset ( $blocks_from_recipe [0] ))
						$blocks_from_recipe = array (
								$blocks_from_recipe 
						);
						
						// go through each block and chck if meet conditions
					foreach ( $blocks_from_recipe as $current_block ) {
						$is_true = $is_true && $this->check_condition ( $current_block );
					}
					// if not all blocks met the conditions we need to set the recipe to not active
					if (! $is_true) {
						if ($recipe ['active'])
							
							$this->app->recipe_model->update ( array (
									'active' => 0 
							), "`recipe_id` = '" . $recipe ['recipe_id'] . "'" );
					} else {
						// all conditions for recipehave been met!
						// is the recipe already active,if not do nothing else
						if (! $recipe ['active']) {
							// update recipe to active
							$this->app->recipe_model->update ( array (
									'active' => 1 
							), "`recipe_id` = '" . $recipe ['recipe_id'] . "'" );
							// kick off actions
							$this->do_actions ( $recipe );
						}
					}
				}
			}

		} else {
			$that_blocks = $this->app->that_block_model->read ( 'actor_id', $device_id );
			if ($that_blocks != false) {
				
				// using that_blocks find their recipes and then trigger actors based on each recipe
				foreach ( $that_blocks as $that_block ) {
					$update = array (
							'active' => 0 
					);
					$recipe = $this->app->recipe_model->update ( $update, "`recipe_id` = '" . $that_block ['recipe_id'] . "'" );
				}
			}
		}
	}
	function do_actions($recipe) {
		$that_blocks = $this->app->that_block_model->read ( 'recipe_id', $recipe ['recipe_id'] );
		if (! $that_blocks) {
			// there was an error?
			return;
		}
		// if only returned on row, make it an iterable array
		if (! isset ( $that_blocks [0] ))
			$that_blocks = array (
					$that_blocks 
			);
		foreach ( $that_blocks as $that_block ) {
			$device = $this->app->device_model->read ( 'device_id', $that_block ['actor_id'] );
			$system_id = 1;
			if($device != false && isset($device['system_id']))
				$system_id = $device['system_id'];

			if($system_id > 0) {
				// create request
				$request = array (
						"system_id" => $recipe ['system_id'],
						"device_id" => $that_block ['actor_id'],
						"action" => strtolower($that_block ['action']) 
				);
				$data = array (
						"device_id" => $that_block ['actor_id'],
						"key" => 'state',
						"value" => $that_block ['action'] 
				);
				
				$meta_result = $this->app->device_meta_model->update_device_state ( $that_block ['actor_id'], $that_block ['action'] );
				if ($meta_result) {
					// create the request in db
					if ($result = $this->app->request_model->create ( $request )) {
						
						// create the request in users sqs queue
						$rid = $this->app->request_model->get_last_id ();
						
						$db_requests = $this->app->request_model->get_last_request ( $recipe ['system_id'], $rid );
						if ($db_requests) {
							$client = Aws\Sqs\SqsClient::factory ( array (
									'region' => 'us-east-1' 
							) );
							$createQueueResult = $client->createQueue ( array (
									'QueueName' => 'system' . $recipe ['system_id'] 
							) );
							
							$queueUrl = $createQueueResult->get ( 'QueueUrl' );
							
							$client->sendMessage ( array (
									'QueueUrl' => $queueUrl,
									'MessageBody' => $db_requests 
							) );
						}
					}
				} else {
				
				}
			}
			elseif($system_id == 0 ) {
			//lucas HERE UNCOMMENT
			//$this->notifier->notify($that_block['actor_id'], $that_block['action']);
			}
		}
	}
	
	// Queries DB For needed conditon and device info then returns if the device meets the condition
	function check_condition($this_block) {
		$this->app->load_model ( 'device_meta_model' );
		$this->app->load_model ( 'device_condition_model' );
		$condition = $this->app->device_condition_model->read ( 'condition_id', $this_block ['condition_id'] );
		$device_meta = $this->app->device_meta_model->read ( array (
				'device_id',
				'key' 
		), array (
				$this_block ['monitor_id'],
				'state' 
		) );
		if ($condition != false && $device_meta != false) {
			$current_value = $device_meta ['value'];
			$condition = $condition ['_condition'];
			$test_value = $this_block ['value'];
			return $this->compare ( $current_value, $test_value, $condition );
		}
		return false;
	}
	// takes 2 values and compares them base on conditions
	function compare($a, $b, $condition) {
		$result = false;
		switch ($condition) {
			case ">" :
				$result = $a > $b;
				break;
			case "<" :
				$result = $a < $b;
				break;
			default :
					$result = $a == $b;
				break;
		}
		return $result;
	}
}
