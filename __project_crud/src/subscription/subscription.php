<?php
namespace allproject\subscription;
session_start();
// Turn off all deprecated warnings.
error_reporting(E_ALL ^ E_DEPRECATED);

Class Subscription{
	public $id = '';
	public $subscriber_name = '';
	public $subscriber_email = '';
	public $time;
	public function __construct(){
		$conn = mysql_connect('localhost','root','') or die("Connection aborted");
		mysql_select_db('bitm_112110') or die('Select database error!');
		return $this->time = date('Y-m-d h:i:s');
	}
	public function getID($getID = ''){
		if (isset($getID['id'])) {
			return $this->id = $getID['id'];
		}
	}
	public function prepare($data = ''){
		if (isset($data['subscriber_name'])) {
			$this->subscriber_name = $data['subscriber_name'];
			$this->subscriber_email = $data['subscriber_email'];
		}
			return $this;
	}
	public function store(){
		if( isset($this->subscriber_name) && !empty($this->subscriber_name) ){
			$query = "INSERT INTO subscriptions (subscriber_name,subscriber_email,created_at,updated_at,deleted_at) VALUES ('".$this->subscriber_name."','".$this->subscriber_email."','".$this->time."','".$this->time."',NULL)";
			if(mysql_query($query)){
                $_SESSION['message'] = "Well done! successfully added data.";
            }else{
                $_SESSION['message'] = "Opps! Here some problems.";
            }
            header('location:index.php');
         }else{
             $_SESSION['message'] = "Please insert data.";
             header('location:index.php');
         }
	}
	public function index(){
		$array = array();
		$query = "SELECT * FROM subscriptions WHERE deleted_at IS NULL";
		$result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	}
	public function show(){
		$query = "SELECT * FROM subscriptions WHERE id = $this->id";
		$result = mysql_query($query);
		if (!empty($result)) {
			$row = mysql_fetch_assoc($result);
			return $row;
		}
	}
	public function update(){
		if (isset($this->subscriber_name) && !empty($this->subscriber_name)) {
			$query = "UPDATE subscriptions SET subscriber_name = '".$this->subscriber_name."',subscriber_email = '".$this->subscriber_email."' WHERE id = $this->id";
			if(mysql_query($query)){
	            $_SESSION['message'] = "Well done! successfully update data.";
        		header('location:index.php');
	        }else{
	            $_SESSION['message'] = "Opps! Here some problems.";
	        }
	    }else{
	    	$_SESSION['message'] = "Please insert data";
	    	header('location:edit.php'."?id=".$this->id);
	    }
	}
	public function trash(){
		$query =  "UPDATE subscriptions SET deleted_at = '".$this->time."' WHERE id = $this->id";
		if (mysql_query($query)) {
			$_SESSION['message'] = "Temporary delete";
		}else{
			$_SESSION['message'] = "Opps! Here some problems.";
		}
		header('location:index.php');
	}
	public function trashed(){
		$array = array();
		$query = "SELECT * FROM subscriptions WHERE deleted_at IS NOT NULL";
		$result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	} 
	public function delete(){
		$query = "DELETE FROM subscriptions WHERE id = $this->id";
		if (mysql_query($query)) {
			$_SESSION['message'] = "Delete Parmanently";
		}else{
			$_SESSION['message'] = "Opps! Here some problems.";
		}
		header('location:restore.php');
	}
	public function restored(){
		$query =  "UPDATE subscriptions SET deleted_at = NULL WHERE id = $this->id";
		if (mysql_query($query)) {
			$_SESSION['message'] = "Restore successfully";
		}else{
			$_SESSION['message'] = "Opps! Here some problems.";
		}
		header('location:restore.php');
	}
}