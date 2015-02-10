<?php
class model {

	public $table_name = false; //what table to access in DB

	//set up singleton app.
	public $app;
	function __construct() {
		$this->app = APP::get_instance();
	}

	function create($values, $columns = false) {
		if($this->table_name != false) {

			$column_names = '';
			$values_str = '';
			if($columns != false) {
				$column_names .= "(";
				foreach($columns as $name){
					$column_names .= $name.',';
				}
				$column_names = substr($column_names, 0, -1);
				$column_names .= ") ";
			
				foreach($values as $value){
					$values_str .= "'".$this->app->db->escape_str($value)."',";
				}
				$values_str = substr($values_str, 0, -1);
			}
			else {

				$column_names .= "(";
				foreach($values as $column => $value) {
					$column_names .= $column.',';
					$values_str .= $this->app->db->escape_str($value).",";

				}
				$column_names = substr($column_names, 0, -1);
				$column_names .= ") ";
				$values_str = substr($values_str, 0, -1);
			}
			$sql = 'INSERT INTO '.$this->table_name.' '.$column_names.' VALUES('.$values_str.');';
			
			$query = $this->app->db->query($sql);
			if($query) {
				return true;
			}
		}
		return false;
	}
	/*
		Update a table with given values and columns
	 	builds: 
		UPDATE table_name SET column1=value1,column2=value2,... WHERE some_column=some_value;
		
		@param set :  is an array("column1"=>value1,"column2"=>value2...)
		@param where_statement :  is a string for where part of clause "`table_id` = 12";
		@returns true if successful, false if not.
	*/
	function update($set, $where_statement) {
		if($this->table_name != false) {
			$updates = '';
			foreach($set as $name => $value){
						$updates .= "`".$name."`=".$this->app->db->escape_str($value).",";
			}
			$updates = substr($updates, 0, -1);
			$sql = 'UPDATE '.$this->table_name.' SET '.$updates.' WHERE '.$where_statement;
			$query = $this->app->db->query($sql);
			if($query) {
				return true;
			}
		}
		return false;	
	}
	/*
	SELECTS FROM TABLE WHERE KEY = VALUE
	 */
	function read($key, $value) {
		if($this->table_name != false) {
			$sql = 'SELECT * FROM '.$this->table_name.' WHERE `'.$key."` = ?;";
			$stmt = $this->app->db->query($sql, array($value));
			
			if($stmt->rowCount() > 0 ) {
		       return $stmt->fetch();
		    }
		}
		return false;
	}

	function delete($key,$value) {
		if($this->table_name != false) {
			$sql = 'DELETE FROM '.$this->table_name.' WHERE `'.$key.'` = ?;';
			$stmt = $this->app->db->query($sql, array($value));
			if($stmt) {
		       return true;
		    }
		}
		return false;
	}

	function exists($field, $value) {
		if($this->table_name != false) {
			if(is_array($field) && is_array($value)) {
				$sql  = "select 1 from ".$this->table_name." where ";
			
				foreach($field as $f) {
					$sql .= "$f = ? AND";
				}	
				$sql = substr($sql, 0, -3).";";
			}
			else {
				$sql  = "select 1 from ".$this->table_name." where $field = ? ;";
			}
			$handler = &$this->app->db->handler();
			$stmt = $handler->prepare($sql);
			$exec = is_array($value) ? $value : array($value);
			$stmt->execute($exec);
			if($stmt->rowCount() == 0)
				return false;
			else return true;
		}

		return false;
	}

	function get_last_id() {
		return  $this->app->db->last_id();
	}
}
?>