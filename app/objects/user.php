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

	public function load_projects($amount = false){
		$projects = $this->app->user_model->get_projects($this->id);
		if(!isset($this->app->project_model))
			$this->app->load_model('project_model');
		
		$project_model = &$this->app->project_model;
		$c =0;
		foreach($projects as $pr_id){
			if($amount != false) {
				if($c < $amount){
					$this->projects[] = $project_model->get_project($pr_id['project_id']);
				}
				else {break;}
			}
			else
			$this->projects[] = $project_model->get_project($pr_id['project_id']);
			$c++;
		}

	}

	public function load_recent_tasks($num) {
		if(!isset($this->app->user_model))
			$this->app->load_model('user_model');
			
		if($tasks = $this->app->user_model->get_recent_tasks($this->id, $num) ){
			$this->tasks = $tasks;
		}
	}

	public function load_recent_messages($num) {
		if(!isset($this->app->user_model))
			$this->app->load_model('user_model');
			
		if($messages = $this->app->user_model->get_recent_messages($this->id, $num) ){
			$this->messages = $messages;
		}
	}

	public function load_recent_updates($num) {
		if(!isset($this->app->user_model))
			$this->app->load_model('user_model');
			
		if($updates = $this->app->user_model->get_recent_updates($this->id, $num) ){
			$this->updates = $updates;
		}

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