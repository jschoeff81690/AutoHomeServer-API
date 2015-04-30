<?php

class DB {
	
	// the PDO object
	private $handler;
	
	/*
	 * DB Constructor
	 * - Initiates a DB object and creates a PHP PostgreSQL connection
	 *
	 *
	 * @param String $host 	- Host server IP address or "localhost"
	 * @param String $database - database to select for use
	 * @param String $user 	- username to login with
	 * @param String $password - password to login with
	 *
	 * @return void
	 */
	public function _connect($database_info) {
		$host = $database_info ['host'];
		$database = $database_info ['database_name'];
		$user = $database_info ['username'];
		$password = $database_info ['password'];
		try {
			$this->handler = new PDO ( "mysql:host=$host;dbname=$database", $user, $password );
			$this->handler->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$this->handler->setAttribute ( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
		} catch ( PDOException $e ) {
			print 'Error!: ' . $e->getMessage () . '<br/>';
			die ();
		}
	}

	public function query($prepd_query, $arr_values = false) {
		try {
			if ($arr_values != false) {
				$stmt = $this->handler->prepare ( $prepd_query );
				$stmt->execute ( $arr_values );
				return $stmt;
			} else {
				$stmt = $this->handler->prepare ( $prepd_query );
				$stmt->execute ();
				return $stmt;
			}
		} catch ( PDOException $e ) {
			print 'Error!: ' . $e->getMessage () . '<br/>';
			return false;
		}
	}

	public function handler() {
		return $this->handler;
	}

	private function __deconstruct() {
		$this->handler = null;
	}

	function escape_str($str, $quote = TRUE) {
		if (is_array ( $str )) {
			foreach ( $str as $key => $val ) {
				$str [$key] = $this->escape_str ( $val, $like );
			}
			
			return $str;
		}
		if ($quote)
			$str = $this->handler->quote ( $str );
		
		return $str;
	}

	function last_id() {
		return $this->handler->lastInsertId ();
	}

}