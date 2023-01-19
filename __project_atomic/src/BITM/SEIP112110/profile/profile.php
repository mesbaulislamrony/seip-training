<?php
namespace Atomicproject\BITM\SEIP112110\profile;
session_start();
// Turn off all deprecated warnings.
error_reporting(E_ALL ^ E_DEPRECATED);

Class profile{
	public $id = '';
	public $user_name = '';
	public $profile_photo = '';
	public $is_active = '';

	public function __construct(){
		mysql_connect("localhost","root","") or die("Connection aborted");
		mysql_select_db("bitm_112110") or die("Select db failed");
		return $this->time = date('Y-m-d h:i:s');
	}

	public function prepare($data){
		if (array_key_exists('user_name',$data) && !empty($data)) {
			$this->user_name = $data['user_name'];
		}
		if (array_key_exists('image',$data) && !empty($data)) {
			$this->profile_photo = $data['image'];
		}
		if (array_key_exists('id', $data)) {
			$this->id = $data['id'];
		}
		if (array_key_exists('is_active',$data) && !empty($data)) {
			$this->is_active = $data['is_active'];
		}
		return $this;
	}
	public function store(){
		if(!empty($this->user_name) && !empty($this->profile_photo)){
			$is_active = "UPDATE profiles SET is_active = NULL";
			$query = "INSERT INTO profiles (user_name,profile_photo,is_active,created_at,updated_at,deleted_at) VALUES ('".$this->user_name."','".$this->profile_photo."',1,'".$this->time."','".$this->time."',NULL)";			
			if (mysql_query($is_active) && mysql_query($query)) {
				$_SESSION['message'] = "Profile create successful";
				header('location:index.php');
			}else{
				$_SESSION['message'] = "Have problems";
			}
		}else{
			$_SESSION['message'] = "Please fillup box first";
			header('loacation:create.php');
		}
	}
	public function thumbnail(){
		$array = array();
		$query = "SELECT * FROM profiles WHERE deleted_at IS NULL";
		$result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	}
	public function profile(){
		$query = "SELECT * FROM profiles WHERE is_active IS NOT NULL";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
		return $row;
	}
	public function single(){
		$query = "SELECT * FROM profiles WHERE id = $this->id";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
		return $row;
	}
	public function is_active(){
		$query = "UPDATE profiles SET is_active = NULL";
		$active = "UPDATE profiles SET is_active = 1 WHERE id = $this->id";
		if (mysql_query($query) && mysql_query($active)) {
			$_SESSION['message'] = "Profile set";
		}else{
			$_SESSION['message'] = "Have problems";
		}
		header('location:thumbnail.php');
	}
	public function delete(){
		if ($this->is_active == NULL) {
			$query = "DELETE FROM profiles WHERE id = $this->id";
			if (mysql_query($query)) {
				$_SESSION['message'] = "Profile delete";
			}else{
				$_SESSION['message'] = "Have problems";
			}
		}else{
			$_SESSION['message'] = "Can't Delete Profile";
		}
		header('location:thumbnail.php');
	}
	public function update(){
		if(isset($this->profile_photo) && !empty($this->profile_photo)){
			$query = "UPDATE profiles SET user_name = '".$this->user_name."', profile_photo = '".$this->profile_photo."' WHERE id = $this->id";
		}else{
			$query = "UPDATE profiles SET user_name = '".$this->user_name."' WHERE id = $this->id";
		}
		mysql_query($query);
		$_SESSION['message'] = "Update successful";
		header('location:index.php');
	}
}