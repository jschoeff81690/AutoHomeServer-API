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

	function get_system($user_id) {
		$sql = "SELECT * FROM `systems` as s WHERE s.user_id = ?";
		$stmt = $this->app->db->query($sql, array($user_id));
			
		if($stmt->rowCount() > 0 ) {
	       return $stmt->fetch();
	    }
	    return false;
	}

	function get_devices($system_id) {
		$sql = "SELECT d.*,dt.* FROM `devices`as d, `manufacture_devices` as md,`device_types` as dt WHERE d.system_id = ? AND md.chip_id = d.chip_id AND md.device_type_id = dt.type_id";
		$stmt = $this->app->db->query($sql, array($system_id));
			
		if($stmt->rowCount() > 0 ) {
	       return $stmt->fetchAll();
	    }
	    return false;
	}
	
 }

 ?>
