<?php

class project_model extends model {

	function __construct() {
		parent::__construct ();
		$this->table_name = "projects";
	}

	function get_id($user_id, $project_name) {
		$sql = 'SELECT * FROM ( SELECT project_id as id, user_id FROM project_users WHERE user_id = ? ) AS pr, `projects` WHERE pr.id = projects.id AND projects.name = ?;';
		$stmt = $this->app->db->query ( $sql, array (
				$user_id,
				$project_name 
		) );
		return $stmt->fetchAll ();
	}

	function add_users($user_ids, $project_id) {
		$this->table_name = "project_users";
		foreach ( $user_ids as $uid ) {
			$this->create ( array (
					"user_id" => $uid,
					"project_id" => $project_id 
			) );
		}
		$this->table_name = "projects";
		return true;
	}

	function get_project($id) {
		$sql = "SELECT * from projects where id = ?";
		$stmt = $this->app->db->query ( $sql, array (
				$id 
		) );
		$this->app->load_object ( "project" );
		return $stmt->fetchObject ( "project" );
	}

	function create_task($values) {
		$this->table_name = "tasks";
		if ($this->create ( $values )) {
			
			$this->table_name = "projects";
			return true;
		}
		
		$this->table_name = "projects";
		return false;
	}

	function create_message($values) {
		$this->table_name = "project_messages";
		if ($this->create ( $values )) {
			
			$this->table_name = "projects";
			return true;
		}
		
		$this->table_name = "projects";
		return false;
	}

	function get_tasks($project_id) {
		$sql = "SELECT id, project_id, name, details, date_format( due_date, '%M %d, %Y' ) as due, date_format( date_created, '%M %d, %Y' ) as created  from tasks where project_id = ? ORDER BY due_date DESC";
		$stmt = $this->app->db->query ( $sql, array (
				$project_id 
		) );
		return $stmt->fetchAll ();
	}

	function get_messages($project_id) {
		$sql = "SELECT pm.id, project_id, sender_id, u.name as sender_name, content, date_format( pm.date_created, '%M %d, %Y' ) as send_date  from project_messages as pm, users as u  where project_id = ? AND pm.sender_id = u.id ORDER BY pm.date_created DESC;";
		$stmt = $this->app->db->query ( $sql, array (
				$project_id 
		) );
		return $stmt->fetchAll ();
	}

	function get_players($project_id) {
		$sql = "SELECT  user_id, date_created as date_joined, name, email FROM project_users AS pu, users AS u WHERE u.id = pu.user_id AND pu.project_id = ?";
		$stmt = $this->app->db->query ( $sql, array (
				$project_id 
		) );
		return $stmt->fetchAll ();
	}

}

?>
