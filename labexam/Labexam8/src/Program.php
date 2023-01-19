<?php
namespace Programs;
session_start();

Class Program{
	public $id = '';
	public $program = '';
	public $time;

	public function __construct(){
		$conn = mysql_connect("localhost","root","") or die("Not connection");
		mysql_select_db("bitm_112110") or die("Can not select db");
		return $this->time = date('Y-m-d h:m:s');
	}

	public function prepare($data = ''){
		if(array_key_exists('puss', $data)){
			$this->program = $data['puss'];
		}
		if(array_key_exists('id', $data)){
			$this->id = $data['id'];
		}
		return $this;
	}

	public function store(){
		$query = "INSERT INTO programs (language,created_at,updated_at,deleted_at) VALUES ('".$this->program."','".$this->time."','".$this->time."',NULL)";
		if(mysql_query($query)){
			$_SESSION['message'] = "Successful";
		}else{
			$_SESSION['message'] = "Problems";
		}
		header('location:create.php');
	}

	public function index(){
		$array = array();
		$query = "SELECT * FROM programs WHERE deleted_at IS NULL";
		$result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	}
	public function show(){
		$query = "SELECT * FROM programs WHERE id = $this->id";
		$result = mysql_query($query);
		return $row = mysql_fetch_assoc($result);
	}
	
	public function update(){
		$query = "UPDATE programs SET language = '".$this->program."',updated_at = '".$this->time."' WHERE id = $this->id";
		if(mysql_query($query)){
			$_SESSION['message'] = "Successful";
		}else{
			$_SESSION['message'] = "Problems";
		}
		header('location:index.php');
	}
	public function trashed(){
		$query = "UPDATE programs SET deleted_at = '".$this->time."' WHERE id = $this->id";
		if(mysql_query($query)){
			$_SESSION['message'] = "Successful";
		}else{
			$_SESSION['message'] = "Problems";
		}
		header('location:index.php');
	}
}