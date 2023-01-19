<?php
namespace Atomicproject\BITM\SEIP112110\Hobby;
session_start();
// Turn off all deprecated warnings.
error_reporting(E_ALL ^ E_DEPRECATED);

Class Hobby{
	public $id = '';
	public $title = '';
	public $time;

	public function __construct(){
		$conn = mysql_connect('localhost','root','') or die('Error! connection.');
		mysql_select_db('bitm_112110') or die('Error! select database.');
		return $this->time = date('Y-m-d h:i:s');
	}
	public function getId($getId = ''){
		if(array_key_exists('id',$getId)){
			return $this->id = $getId['id'];
		}
	}
	public function prepare($data = ''){
		if(array_key_exists('hobby',$data)){
			return $this->title = $data['hobby'];
		}
	}
	public function store(){
		if(isset($this->title) && !empty($this->title)){
			$query = "INSERT INTO hobbys (title,created_at,modified_at,deleted_at) VALUES ('".$this->title."','".$this->time."','".$this->time."',NULL)";
			if(mysql_query($query)){
				$_SESSION['message'] = "Hobbys added successfully.";
			}else{
				$_SESSION['message'] = "Here some problems.";
			}
		}else{
			$_SESSION['message'] = "Please check at last one choise.";
		}
		header('location:create.php');
	}
	public function index(){
		$array = array();
		$query = "SELECT * FROM hobbys WHERE deleted_at IS NULL";
		$result = mysql_query($query);
		while($row = mysql_fetch_assoc($result)){
			$array[] = $row;
		}
		return $array;
	}
	public function trashed(){
		$array = array();
		$query = "SELECT * FROM hobbys WHERE deleted_at IS NOT NULL";
		$result = mysql_query($query);
		while($row = mysql_fetch_assoc($result)){
			$array[] = $row;
		}
		return $array;
	}
	public function show(){
		$query = "SELECT * FROM hobbys WHERE id = $this->id";
		$result = mysql_query($query);
		if(!empty($result)){
			$row = mysql_fetch_assoc($result);
		return $row;
		}
	}
	public function update(){
		if(isset($this->title) && !empty($this->title)){
			$query = "UPDATE hobbys SET title = '".$this->title."' WHERE id = $this->id;";
			if(mysql_query($query)){
				$_SESSION['message'] = "Hobbys updated successfully.";
			}else{
				$_SESSION['message'] = "Here some problems.";
			}
			header('location:index.php');
		}else{
			$_SESSION['message'] = "Please check at last one choise.";
			header('location:edit.php');
		}
	}
	public function trash(){
		$query = "UPDATE hobbys SET deleted_at = '".$this->time."' WHERE id = $this->id";
		if(mysql_query($query)){
			$_SESSION['message'] = "Temporary deleted.";
		}else{
			$_SESSION['message'] = "Here some problems.";
		}
		header('location:index.php');
	}
	public function restored(){
		$query = "UPDATE hobbys SET deleted_at = NULL WHERE id = $this->id";
		if(mysql_query($query)){
			$_SESSION['message'] = "Restore successfully.";
		}else{
			$_SESSION['message'] = "Here some problems.";
		}
		header('location:restore.php');
	}
	public function delete(){
		$query = "DELETE FROM hobbys WHERE id = $this->id";
		if(mysql_query($query)){
			$_SESSION['message'] = "Parmanetly deleted.";
		}else{
			$_SESSION['message'] = "Here some problems.";
		}
		header('location:restore.php');
	}
}