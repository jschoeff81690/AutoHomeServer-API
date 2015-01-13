<?php 
class project {
	private $id;
	private $name;
	private $company;
	private $site;
	private $contact;
	private $description;
	private $finish;
	private $date_created;
	private $app;

	function __construct() {
		$this->app = APP::get_instance();
		if(!empty($this->id)){ 
			$this->get_tasks();
			$this->get_messages();
			$this->get_players();
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

    public function get_tasks() {
    	$this->tasks = array();
		if(!isset($this->app->project_model))
			$this->app->load_model('project_model');
    	$this->tasks = $this->app->project_model->get_tasks($this->id);
    }
    public function get_messages() {
    	$this->messages = array();
    	if(!isset($this->app->project_model))
			$this->app->load_model('project_model');
    	$this->messages = $this->app->project_model->get_messages($this->id);
    }
    public function get_players() {
    	$this->players = array();
    	if(!isset($this->app->project_model))
			$this->app->load_model('project_model');
    	$this->players = $this->app->project_model->get_players($this->id);
    }
}