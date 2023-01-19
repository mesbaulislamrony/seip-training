<?php
namespace allproject\gender;
session_start();
// Turn off all deprecated warnings.
error_reporting(E_ALL ^ E_DEPRECATED);

Class gender{
	public $id;
	public $title = '';
	public $sex = '';
	public $time;

	public function __construct(){
		mysql_connect("localhost","root","") or die("connection_aborted");
		mysql_select_db('bitm_112110');
		return $this->time = date('Y-m-d h:i:s');
	}
	public function prepare($data){
		if (array_key_exists('title', $data)) {
			$this->title = $data['title'];
			$this->sex = $data['sex'];
		}
		if(array_key_exists('id', $data)){
			$this->id = $data['id'];
		}
		return $this;
	}
	public function store(){
		if (!empty($this->title) && !empty($this->sex)) {			
			$query = "INSERT INTO genders (title,sex,created_at,updated_at,deleted_at) VALUES ('".$this->title."','".$this->sex."','".$this->time."','".$this->time."',NULL)";
			if(mysql_query($query)){
				$_SESSION['message'] = "Add successfuly";
			}else{
				$_SESSION['message'] = "Problems here.";
			}
		}else{
			$_SESSION['message'] = "First put your name and sex.";
		}
		header('location:create.php');
	}
	public function index(){
		$array = array();
		$query = "SELECT * FROM genders";
		$reslut = mysql_query($query);
		while ($row = mysql_fetch_assoc($reslut)) {
			$array[] = $row;
		}
		return $array;
	}
	public function single(){
		$query = "SELECT * FROM genders WHERE id = $this->id";
		$reslut = mysql_query($query);
		$row = mysql_fetch_assoc($reslut);
		return $row;
	}
	public function update(){
		$query = "UPDATE genders SET title = '".$this->title."', sex = '".$this->sex."' WHERE id = $this->id";
		if(mysql_query($query)){
			$_SESSION['message'] = "Update successfuly";
		}else{
			$_SESSION['message'] = "Problems here.";
		}
		header('location:index.php');
	}
	public function delete(){
		$query = "DELETE FROM genders WHERE id = $this->id";
		if(mysql_query($query)){
			$_SESSION['message'] = "Delete successfuly";
		}else{
			$_SESSION['message'] = "Problems here.";
		}
		header('location:index.php');
	}
}