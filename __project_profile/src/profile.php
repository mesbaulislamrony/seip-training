<?php
namespace profile;
use PDO;
session_start();

Class profile{
	public $id = '';
	public $conn = '';
	public $time;
	public $user_name = '';
	public $profile_photo = '';

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
		if (is_array($data) && array_key_exists('profile_name', $data)) {
			$this->user_name = $data['profile_name'];
		}
		if (is_array($data) && array_key_exists('image', $data)) {
			$this->profile_photo = $data['image'];
		}
		if (array_key_exists('id', $data) && !empty($data['id'])) {
			$this->id = $data['id'];
		}
		return $this;
	}
	public function store(){
		try{
			if (!empty($this->user_name) && !empty($this->profile_photo)) {
				$sqlone = "INSERT INTO profiles (user_name,profile_photo,is_active,created_at,updated_at,deleted_at) VALUES (:user_name,:profile_photo,:is_active,:created_at,:updated_at,:deleted_at)";
				$query1 = $this->conn->prepare($sqlone);
				$query1->execute(
					array(
						':user_name'=>$this->user_name,
						':profile_photo'=>$this->profile_photo,
						':is_active'=>NULL,
						':created_at'=>$this->time,
						':updated_at'=>$this->time,
						':deleted_at'=>NULL
						)
				);
				if ($query1) {
					$_SESSION['message'] = "Profile created";
				}else{
					$_SESSION['message'] = "Problems";
				}
			}else{
				$_SESSION['message'] = "Please insert profile name and photo.";
			}
			header('location:create.php');
		}
		catch(PDOException $e){
			echo 'ERROR:'. $e->getMessage();
		}
	}
	public function index(){
		try{
			$array = array();
			$sql = "SELECT * FROM profiles";
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
			$sql = "SELECT * FROM profiles WHERE is_active IS NOT NULL";
			$query = $this->conn->query($sql) or die("Failed");
			$row = $query->fetch(PDO::FETCH_ASSOC);
			return $row;
		}
		catch(PDOEXception $e){
			echo 'ERROR:'. $e->getMessage();
		}		
	}
	public function getsingle(){
		try{
			$sql = "SELECT * FROM profiles WHERE id = $this->id";
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
			$sql1 = "UPDATE profiles SET is_active = :set_as_null";
			$sql2 = "UPDATE profiles SET is_active = :set_as_one WHERE id = $this->id";
			$query1 = $this->conn->prepare($sql1);
			$query2 = $this->conn->prepare($sql2);
			$query1->execute(array(':set_as_null'=>NULL));
			$query2->execute(array(':set_as_one'=>1));
			header('location:listprofile.php');
		}
		catch(PDOEXception $e){
			echo 'ERROR:'. $e->getMessage();
		}
	}
	public function trash(){
		try{
			$sql = "SELECT * FROM profiles WHERE id = $this->id";
			$query = $this->conn->query($sql) or die("Failed");
			$row = $query->fetch(PDO::FETCH_ASSOC);
			if (array_key_exists('profile_photo', $row)) {
				$sql2 = "DELETE FROM profiles WHERE is_active IS NULL AND id = ".$row['id'];
				$query2 = $this->conn->prepare($sql2);
				$query2->execute();
				if($query2){
					unlink("images/".$row['profile_photo']);
				}
			}
			header('location:listprofile.php');
		}
		catch(PDOEXception $e){
			echo 'ERROR:'. $e->getMessage();
		}
	}
	public function update(){
		try{
			$sql = "SELECT * FROM profiles WHERE id = $this->id";
			$query = $this->conn->query($sql) or die("Failed");
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$unlink = unlink("images/".$row['profile_photo']);
			$sqlk = "UPDATE profiles SET profile_photo = '".$this->profile_photo."' WHERE id = $this->id";
			$queryk = $this->conn->prepare($sqlk);
			$queryk->execute();
			header('location:listprofile.php');

		}
		catch(PDOEXception $e){
			echo 'ERROR:'. $e->getMessage();
		}
	}
}