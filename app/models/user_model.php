<?php
class user_model extends model {
	
	function __construct()
	{
		parent::__construct();
		$this->table_name = "users";
	}

	function _logged() {
	//check if a user is logged
		if(isset($_SESSION['uid'],$_SESSION['hash'])) {

			$uid   = $_SESSION['uid'];
			$email = $_SESSION['email'];
			$hash  = $_SESSION['hash'];
			$sql   = "SELECT password FROM users WHERE id = ?";
			$query = $this->app->db->query($sql, array($uid));
			$row   = $query->fetch();
			if($hash == trim($row['password']) ){
				return true;
			}
		}
		else {
			if($this->login())
				return true;
		}

		return false;
	}
	function login() {
		if(isset($_POST['email'], $_POST['password'])) {
			$sql   = "SELECT id, email,  password FROM users WHERE email = ?";
			$stmt = $this->app->db->query($sql, array($_POST['email']));
			if(!$stmt) {
				//Error
				echo 'Email not in the Database';
			}
			$row = $stmt->fetch();
			$hash = hash('sha256', $this->app->db->escape_str($_POST['email'],false).$this->app->db->escape_str($_POST['password'],false));
			if($hash == $row['password']){
				$_SESSION['uid']   = $row['id'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['hash']  = $hash;
				return true;
			}
			else {
				//Error
				$user_data = array(
						'uid'   => $row['id'],
						'email' => $row['email'],
						'hash'  => $hash
				);
			}
		}
		else {

		}
		return false;
	}
	function get_user($id = false) {
		if(!$id && !isset($_SESSION['uid'])) return false;
		if($id == false){
			$id = $_SESSION['uid'];
		}
		$sql = "SELECT * from users where id = ?";
		$stmt = $this->app->db->query( $sql, array($id) );
		$this->app->load_object("user");
		return $stmt->fetchObject("user");
	}

	function get_all_users() {
		$sql = "SELECT * from users";
		$stmt = $this->app->db->query( $sql);
		$this->app->load_object("user");
		$result = $stmt->setFetchMode(PDO::FETCH_CLASS,"user");
		$users = array();
		while($user = $stmt->fetch() ) {
			$users[] = $user;
		}
		return $users;
	}

	function get_projects($id = false) {
		if($id == false){
			$id = $_SESSION['uid'];
		}
		$sql = "SELECT project_id from project_users where user_id = ?";
		$stmt = $this->app->db->query( $sql, array($id) );
		return $stmt->fetchAll();
	}

	function get_recent_tasks($id, $limit) {
		$sql = 'SELECT pu.user_id, pu.project_id, pr.name as project_name, t.id, t.name, t.details, date_format( t.due_date, \'%M %d, %Y\' ) as due, date_format( t.date_created, \'%M %d, %Y\' ) as created FROM `project_users` as pu, `projects` as pr, `tasks` as t WHERE pu.user_id = ? AND t.project_id = pr.id AND pr.id = pu.project_id ORDER BY t.date_created DESC limit '.$limit.';';
		$stmt = $this->app->db->query( $sql, array($id) );
		return $stmt->fetchAll();
	}

	function get_recent_messages($id, $limit) {
		$sql = 'SELECT pu.user_id, pu.project_id, pr.name as project_name, m.id, m.content, date_format( m.date_created, \'%M %d, %Y\' ) as created,u.name as sender FROM `project_users` as pu, `projects` as pr, `project_messages` as m, `users` as u WHERE pu.user_id = ? AND m.project_id = pr.id AND pr.id = pu.project_id AND u.id = m.sender_id ORDER BY m.date_created DESC LIMIT '.$limit.';';
		$stmt = $this->app->db->query( $sql, array($id) );
		return $stmt->fetchAll();
	}

	function get_recent_updates($id, $limit) {
		$sql = '(SELECT pu.user_id, pu.project_id, pr.name as 
project_name,"message" as name, TIMEDIFF(CURRENT_TIMESTAMP(), 
m.date_created) as created, u.name as sender, "message" as type FROM `project_users` as pu, `projects` as pr, `project_messages` as m, `users` as u WHERE pu.user_id = ? AND m.project_id = pr.id AND pr.id = pu.project_id AND u.id = m.sender_id) UNION (SELECT pu.user_id, pu.project_id, pr.name as project_name, t.name, TIMEDIFF(CURRENT_TIMESTAMP(), t.date_created  ) as created, "user" as sender, "task" as type  FROM `project_users` as pu, `projects` as pr, `tasks` as t WHERE pu.user_id = ? AND t.project_id = pr.id AND pr.id = pu.project_id )ORDER BY created ASC LIMIT '.$limit.';';
		$stmt = $this->app->db->query( $sql, array($id,$id) );
		return $stmt->fetchAll();
	}
 }

 ?>
