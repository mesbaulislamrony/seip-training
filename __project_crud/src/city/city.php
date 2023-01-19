<?php
namespace allproject\city;
session_start();
// Turn off all deprecated warnings.
error_reporting(E_ALL ^ E_DEPRECATED);

Class city{
	public $id = '';
	public $title = '';
	public $time;

	public function __construct(){
		mysql_connect('localhost','root','') or die('Not connection');
		mysql_select_db('bitm_112110') or die('Can not select db');
		return $this->time = date('Y-m-d h:i:s');
	}

	public function prepare($data = ''){
		if (array_key_exists('title', $data)) {
			$this->title = $data['title'];
		}
		if (array_key_exists('id', $data)) {
			$this->id = $data['id'];
		}		
		return $this;
	}

	public function store(){
		$query = "INSERT INTO citys (title,created_at,modified_at,deleted_at) VALUES ('".$this->title."','".$this->time."','".$this->time."',NULL)";
		if(mysql_query($query)){
			$_SESSION['message'] = "Successfull";
		}else{
			$_SESSION['message'] = "Problems";
		}
		header('location:create.php');
	}
	public function index(){
		$array = array();
		$query = "SELECT * FROM citys WHERE deleted_at IS NULL";
		$result = mysql_query($query);
		while($row = mysql_fetch_assoc($result)){
			$array[] = $row;
		}
		return $array;
	}
	public function single(){
		$query = "SELECT * FROM citys WHERE id = $this->id";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
		return $row;
	}
	public function update(){
		$query = "UPDATE citys SET title = '".$this->title."', modified_at = '".$this->time."' WHERE id = $this->id";
		if(mysql_query($query)){
			$_SESSION['message'] = "Successfull";
		}else{
			$_SESSION['message'] = "Problems";
		}
		header('location:index.php');
	}
	public function trash(){
		$query = "UPDATE citys SET deleted_at = '".$this->time."' WHERE id = $this->id";
		if(mysql_query($query)){
			$_SESSION['message'] = "Successfull";
		}else{
			$_SESSION['message'] = "Problems";
		}
		header('location:index.php');
	}
	public function trashed(){
		$array = array();
		$query = "SELECT * FROM citys WHERE deleted_at IS NOT NULL";
		$result = mysql_query($query);
		while($row = mysql_fetch_assoc($result)){
			$array[] = $row;
		}
		return $array;
	}
	public function restored(){
		$query = "UPDATE citys SET deleted_at = NULL WHERE id = $this->id";
		if(mysql_query($query)){
			$_SESSION['message'] = "Successfull";
		}else{
			$_SESSION['message'] = "Problems";
		}
		header('location:restore.php');
	}
	public function delete(){
		$query = "DELETE FROM citys WHERE id = $this->id";
		if(mysql_query($query)){
			$_SESSION['message'] = "Successfull";
		}else{
			$_SESSION['message'] = "Problems";
		}
		header('location:restore.php');
	}


}