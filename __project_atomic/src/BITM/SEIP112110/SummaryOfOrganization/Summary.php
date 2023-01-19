<?php
namespace Atomicproject\BITM\SEIP112110\SummaryOfOrganization;
session_start();
// Turn off all deprecated warnings.
error_reporting(E_ALL ^ E_DEPRECATED);

Class Summary{
	public $id = '';
	public $title = '';
	public $summary = '';
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
		if (isset($data['title'])) {
			$this->title = $data['title'];
			$this->summary = $data['summary'];
			return $this;
		}
	}
	public function store(){
		if( isset($this->title) && !empty($this->title) ){
			$query = "INSERT INTO summary (title,summary,created_at,updated_at,deleted_at) VALUES ('".$this->title."','".$this->summary."','".$this->time."','".$this->time."',NULL)";
			if(mysql_query($query)){
                $_SESSION['massage'] = "Well done! successfully added data.";
            }else{
                $_SESSION['massage'] = "Opps! Here some problems.";
            }
            header('location:index.php');
         }else{
             $_SESSION['massage'] = "Please insert data.";
             header('location:index.php');
         }
	}
	public function index(){
		$array = array();
		$query = "SELECT * FROM summary WHERE deleted_at IS NULL";
		$result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	}
	public function show(){
		$query = "SELECT * FROM summary WHERE id = $this->id";
		$result = mysql_query($query);
		if (!empty($result)) {
			$row = mysql_fetch_assoc($result);
			return $row;
		}
	}
	public function update(){
		if (isset($this->title) && !empty($this->title)) {
			$query = "UPDATE summary SET title = '".$this->title."',summary = '".$this->summary."' WHERE id = $this->id";
			if(mysql_query($query)){
	            $_SESSION['massage'] = "Well done! successfully update data.";
        		header('location:index.php');
	        }else{
	            $_SESSION['massage'] = "Opps! Here some problems.";
	        }
	    }else{
	    	$_SESSION['massage'] = "Please insert summary";
	    	header('location:edit.php'."?id=".$this->id);
	    }
	}
	public function trash(){
		$query =  "UPDATE summary SET deleted_at = '".$this->time."' WHERE id = $this->id";
		if (mysql_query($query)) {
			$_SESSION['massage'] = "Temporary delete";
		}else{
			$_SESSION['massage'] = "Opps! Here some problems.";
		}
		header('location:index.php');
	}
	public function trashed(){
		$array = array();
		$query = "SELECT * FROM summary WHERE deleted_at IS NOT NULL";
		$result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	} 
	public function delete(){
		$query = "DELETE FROM summary WHERE id = $this->id";
		if (mysql_query($query)) {
			$_SESSION['massage'] = "Delete Parmanently";
		}else{
			$_SESSION['massage'] = "Opps! Here some problems.";
		}
		header('location:restore.php');
	}
	public function restored(){
		$query =  "UPDATE summary SET deleted_at = NULL WHERE id = $this->id";
		if (mysql_query($query)) {
			$_SESSION['massage'] = "Restore successfully";
		}else{
			$_SESSION['massage'] = "Opps! Here some problems.";
		}
		header('location:restore.php');
	}
}