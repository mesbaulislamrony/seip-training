<?php
namespace Atomicproject\BITM\SEIP112110\Book;
// Turn off all deprecated warnings.
error_reporting(E_ALL ^ E_DEPRECATED);

Class Book{
	public $id = '';
	public $title = '';
	public $time;
	public function __construct(){
		mysql_connect('localhost','root','') or die('Not connection');
		mysql_select_db('bitm_112110') or die('Can not select db');
		return $this->time = date('Y-m-d h:i:s');
	}
	public function getId($id){
		if(isset($id['id'])){
			return $this->id = $id['id'];
		}
	}
	public function getForm($data = ''){
		if(isset($data['title'])){
			return $this->title = $data['title'];
		}
	}
	public function store(){
		session_start();
		if(isset($_POST['title']) && !empty($_POST['title'])){
			$query = "INSERT INTO booktitles (title,created_at,	modified_at,deleted_at) VALUES ('".$this->title."','".$this->time."','".$this->time."',NULL)";
			if(mysql_query($query)){
				$_SESSION['message'] = "Data insert successfully";
			}else{
				$_SESSION['message'] = "Data insert failed";
			}
		}else{
			$_SESSION['message'] = "Please Insert data";
		}
		header('location:create.php');
	}
	public function index(){
		$alldata = array();
		$query = "SELECT * FROM booktitles WHERE deleted_at IS NULL";
		$result = mysql_query($query);
		while($row = mysql_fetch_assoc($result)){
			$alldata[] = $row;
		}
		return $alldata;
	}
	public function show(){
		$query = "SELECT * FROM booktitles WHERE id = '".$this->id."'";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
		return $onedata[] = $row;
	}
	public function update(){
		session_start();
		if(isset($this->title) && !empty($this->title)){
			$query = "UPDATE booktitles SET title = '".$this->title."', modified_at = '".$this->time."' WHERE id = $this->id";
			if(mysql_query($query)){
				$_SESSION['message'] = "Data update successfully";
			}else{
				$_SESSION['message'] = "Data update failed";
			}
		}else{
			$_SESSION['message'] = "Fill up from first";
		}
		header('location:index.php');
	}
	public function trash(){
		session_start();
		$query = "UPDATE booktitles SET deleted_at = '".$this->time."' WHERE id = $this->id";
		if(mysql_query($query)){
			$_SESSION['message'] = "Delete temporary";
		}else{
			$_SESSION['message'] = "Delete failed";
		}
		header('location:index.php');
	}
	public function trashed(){
		$alldata = array();
		$query = "SELECT * FROM booktitles WHERE deleted_at IS NOT NULL";
		$result = mysql_query($query);
		while($row = mysql_fetch_assoc($result)){
			$alldata[] = $row;
		}
		return $alldata;
	}
	public function restored(){
		session_start();
		$query = "UPDATE booktitles SET deleted_at = NULL WHERE id = $this->id";
		if(mysql_query($query)){
			$_SESSION['message'] = "Restore data";
		}else{
			$_SESSION['message'] = "Restore failed";
		}
		header('location:restore.php');
	}
	public function delete(){
		session_start();
		$query = "DELETE FROM booktitles WHERE id = $this->id";
		if(mysql_query($query)){
			$_SESSION['message'] = "Delete parmanatly successfully";
		}else{
			$_SESSION['message'] = "Delete failed";
		}
		header('location:restore.php');
	}
}

