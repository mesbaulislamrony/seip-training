<?php
namespace miniproject;
if(!isset($_SESSION)){session_start();}
Class mini{
	public $conn = '';
	public $date = '';
	public $id = '';
	public $email = '';
	public $username = '';
	public $password = '';

	public $user_id = '';
	public $first_name = '';
	public $last_name = '';
	public $personal_phone = '';
	public $home_phone = '';
	public $office_phone = '';
	public $current_address = '';
	public $permanent_address = '';
	public $profile_photo = '';
	public $confirm = '';
	public $deactive = '';
	public $active = '';

	public function __construct(){
		$this->conn = mysqli_connect("localhost","root","","usrreg");
		$this->date = date('Y-m-d h:i:s');
		return $this;
	}
	public function prepare($data){
		if (!empty($data['email']) && !empty($data['username']) && !empty($data['password'])) {
			$this->email = $data['email'];
			$this->username = $data['username'];
			$this->password = $data['password'];
		}
		if (!empty($data['username']) && !empty($data['password'])) {
			$this->username = $data['username'];
			$this->password = $data['password'];
		}
		if (!empty($data['user_id']) && !empty($data['first_name'])) {
			$this->user_id = $data['user_id'];
			$this->first_name = $data['first_name'];
			$this->last_name = $data['last_name'];
			$this->personal_phone = $data['personal_phone'];
			$this->home_phone = $data['home_phone'];
			$this->office_phone = $data['office_phone'];
			$this->current_address = $data['current_address'];
			$this->permanent_address = $data['permanent_address'];
			$this->profile_photo = $data['image'];
		}
		if (!empty($data['user_id'])) {
			$this->id = $data['user_id'];
		}
		if (isset($data['confirm'])) {
			$this->confirm = $data['confirm'];
		}elseif (isset($data['deactive'])) {
			$this->deactive = $data['deactive'];
		}elseif (isset($data['active'])) {
			$this->active = $data['active'];
		}
		return $this;
	}
	public function signup(){
		if (!empty($this->email) && !empty($this->username) && !empty($this->password)) {
			$unique_id = uniqid();
			$query = "INSERT INTO users (unique_id,username,password,email,created_at,is_active) VALUES ('".$unique_id."','".$this->username."','".$this->password."','".$this->email."','".$this->date."',NULL)";
			if (mysqli_query($this->conn,$query)) {
				$last_id = $this->conn->insert_id;
				$query = "INSERT INTO profiles (user_id,user_uniqid) VALUES ('".$last_id."','".$unique_id."')";
				if (mysqli_query($this->conn,$query)) {
					$_SESSION['message'] = "Sign up successful";
				}
				else{
					$_SESSION['message'] = "This username password and email already use";
				}
			}
		}else{
			$_SESSION['message'] = "Please fillup form first";
		}
		header('location:../signup.php');
	}
	public function login(){
		if (!empty($this->username) && !empty($this->password)) {
			$query = "SELECT * FROM users WHERE username = '".$this->username."' AND password = '".$this->password."' AND is_active = 1";
			$result = mysqli_query($this->conn,$query);
			$row = mysqli_fetch_assoc($result);
			if ($row) {
				$_SESSION['username'] = $row['username'];
				$_SESSION['user_id'] = $row['unique_id'];
				$_SESSION['user_roll'] = $row['user_group_id'];
				header('location:../index.php');
			}else{
				$_SESSION['message'] = "Login failed";
				header('location:../login.php');
			}
		}else{
			$_SESSION['message'] = "Please fillup form first";
			header('location:../login.php');
		}
	}
	public function profile_list(){
		$query = "SELECT * FROM users";
		$result = mysqli_query($this->conn,$query);
		while ($row = mysqli_fetch_assoc($result)){
			$array[] = $row;
		}
		if (!empty($array)) {
			return $array;
		}		
	}
	public function is_action(){
		if (!empty($this->confirm)) {
			$query = "UPDATE users SET is_active = 1 WHERE unique_id = '".$this->confirm."'";
		}elseif (!empty($this->deactive)) {
			$query = "UPDATE users SET is_active = 2 WHERE unique_id = '".$this->deactive."'";
		}elseif (!empty($this->active)) {
			$query = "UPDATE users SET is_active = 1 WHERE unique_id = '".$this->active."'";
		}
		if (mysqli_query($this->conn,$query)) {
			$_SESSION['message'] = "Update successful";
		}else{
			$_SESSION['message'] = "Update failed";
		}
		header('location:../index.php');
	}

	public function profile(){
		if(!empty($this->id)){
			$query = "SELECT * FROM profiles WHERE user_uniqid = '".$this->id."'";
			$result = mysqli_query($this->conn,$query);
			$row = mysqli_fetch_assoc($result);
			return $array = $row;
		}
	}
	public function update_profile(){
		if(isset($this->profile_photo) && !empty($this->profile_photo)){
			$sql = "SELECT * FROM profiles WHERE user_uniqid = '".$this->id."'";
			$res = mysqli_query($this->conn,$sql);
			$unlink = mysqli_fetch_assoc($res);
			unlink("../images/".$unlink['profile_pic']);
			$query = "UPDATE profiles SET first_name = '".$this->first_name."',last_name = '".$this->last_name."',personal_phone = '".$this->personal_phone."',home_phone = '".$this->home_phone."',office_phone = '".$this->office_phone."',current_address = '".$this->current_address."',permanent_address = '".$this->permanent_address."',profile_pic = '".$this->profile_photo."',modified_at = '".$this->date."',modified_by = '".$this->user_id."' WHERE user_uniqid = '".$this->id."'";
		}else{
			$query = "UPDATE profiles SET first_name = '".$this->first_name."',last_name = '".$this->last_name."',personal_phone = '".$this->personal_phone."',home_phone = '".$this->home_phone."',office_phone = '".$this->office_phone."',current_address = '".$this->current_address."',permanent_address = '".$this->permanent_address."',modified_at = '".$this->date."',modified_by = '".$this->user_id."' WHERE user_uniqid = '".$this->id."'";
		}
		if (mysqli_query($this->conn,$query)) {
			$_SESSION['message'] = "Update successful";
		}else{
			$_SESSION['message'] = "Update failed";
		}
		header('location:../profile.php?user_id='.$this->id);
	}
	public function delete(){
		if(!empty($this->id)){
			$sql = "SELECT * FROM profiles WHERE user_uniqid = '".$this->id."'";
			$res = mysqli_query($this->conn,$sql);
			$del = mysqli_fetch_assoc($res);
			unlink("../images/".$del['profile_pic']);
			$del_profile = "DELETE FROM profiles WHERE user_uniqid = '".$this->id."'";
			$del_users = "DELETE FROM users WHERE unique_id = '".$this->id."'";
			if (mysqli_query($this->conn,$del_profile) && mysqli_query($this->conn,$del_users)) {
				$_SESSION['message'] = "Delete successful";
			}else{
				$_SESSION['message'] = "Delete failed";
			}
		}
		header('location:../index.php');
	}
}
?>