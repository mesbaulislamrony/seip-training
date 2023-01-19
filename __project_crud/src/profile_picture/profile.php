<?php
namespace allproject\profile_picture;
use PDO;
session_start();

Class profile{
	public $id = '';
	public $conn = '';
	public $time;
	public $profile_image = '';

	public function __construct(){
		try{
			$this->conn = new PDO('mysql:host=localhost;dbname=bitm_112110','root','');
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->time = date('Y-m-d h:s:m');
		}
		catch(PDOException $e){
			echo 'ERROR:'. $e->getMessage();
		}
	}
	public function prepare($data){
		if (array_key_exists('image', $data) && !empty($data['image'])) {
			$this->profile_image = $data['image'];
		}
		if (array_key_exists('id', $data) && !empty($data['id'])) {
			$this->id = $data['id'];
		}
		return $this;
	}
	public function store(){
		try{
			if (!empty($this->profile_image)) {
				$active_sql = "UPDATE profilepictures SET set_as = :set_as_null";
				$active_query = $this->conn->prepare($active_sql);
				$active_query->execute(array(':set_as_null'=>NULL));
				if($active_query){
					$sql = "INSERT INTO profilepictures (profile_image,set_as,created_at,updated_at,deleted_at) VALUES (:profile_image,:set_as,:created_at,:updated_at,:deleted_at)";
					$query = $this->conn->prepare($sql);
					$query->execute(
						array(
							':profile_image'=>$this->profile_image,
							':set_as'=>1,
							':created_at'=>$this->time,
							':updated_at'=>$this->time,
							':deleted_at'=>NULL
							)
					);
					if ($query) {
						$_SESSION['message'] = "Profile photo added";
					}else{
						$_SESSION['message'] = "Problems";
					}
				}
			}else{
				$_SESSION['message'] = "Please insert profile photo.";
			}
			header('location:index.php');
		}
		catch(PDOException $e){
			echo 'ERROR:'. $e->getMessage();
		}
	}
	public function index(){
		try{
			$array = array();
			$sql = "SELECT * FROM profilepictures";
			$query = $this->conn->query($sql) or die("Failed");
			while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$array[] = $row;
			}
			return $array;
		}
		catch(PDOEXception $e){
			echo 'ERROR:'. $e->getMessage();
		}
	}
	public function single(){
		try{
			$sql = "SELECT * FROM profilepictures WHERE set_as IS NOT NULL";
			$query = $this->conn->query($sql) or die("Failed");
			$row = $query->fetch(PDO::FETCH_ASSOC);
			return $row;
		}
		catch(PDOEXception $e){
			echo 'ERROR:'. $e->getMessage();
		}		
	}	
	public function set_as(){
		try{
			$sql1 = "UPDATE profilepictures SET set_as = :set_as_null";
			$sql2 = "UPDATE profilepictures SET set_as = :set_as_one WHERE id = $this->id";
			$query1 = $this->conn->prepare($sql1);
			$query2 = $this->conn->prepare($sql2);
			$query1->execute(array(':set_as_null'=>NULL));
			$query2->execute(array(':set_as_one'=>1));
			header('location:thumbnail.php');
		}
		catch(PDOEXception $e){
			echo 'ERROR:'. $e->getMessage();
		}
	}
	public function delete(){
		try{
			$sql = "SELECT * FROM profilepictures WHERE id = $this->id";
			$query = $this->conn->query($sql) or die("Failed");
			$row = $query->fetch(PDO::FETCH_ASSOC);
			if (!isset($row['set_as'])) {
				$sql2 = "DELETE FROM profilepictures WHERE set_as IS NULL AND id = ".$row['id'];
				$query2 = $this->conn->prepare($sql2);
				$query2->execute();
				if($query2){
					unlink("images/".$row['profile_image']);
				}
			}
			header('location:thumbnail.php');
		}
		catch(PDOEXception $e){
			echo 'ERROR:'. $e->getMessage();
		}
	}
	public function getsingle(){
		try{
			$sql = "SELECT * FROM profilepictures WHERE id = $this->id";
			$query = $this->conn->query($sql) or die("Failed");
			$row = $query->fetch(PDO::FETCH_ASSOC);
			return $row;
		}
		catch(PDOEXception $e){
			echo 'ERROR:'. $e->getMessage();
		}		
	}
	public function update(){
		try{
			$sql = "SELECT * FROM profilepictures WHERE id = $this->id";
			$query = $this->conn->query($sql) or die("Failed");
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$unlink = unlink("images/".$row['profile_image']);
			$sqlk = "UPDATE profilepictures SET profile_image = '".$this->profile_image."' WHERE id = $this->id";
			$queryk = $this->conn->prepare($sqlk);
			$queryk->execute();
			header('location:thumbnail.php');

		}
		catch(PDOEXception $e){
			echo 'ERROR:'. $e->getMessage();
		}
	}
}