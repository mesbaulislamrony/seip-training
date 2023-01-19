<?php
namespace owncms;
if(!isset($_SESSION)){session_start();}

class owncms{
	public $basepath = '';
	public $id = '';
	public $uniqid = '';
	public $user_id = '';
	public $is_admin = '';
	public $conn = '';
	public $date = '';
	public $username = '';
	public $password = '';
	public $email = '';
	public $firstname = '';
	public $lastname = '';
	public $personalphone = '';
	public $homephone = '';
	public $officephone = '';
	public $currentaddress = '';
	public $permanentaddress = '';
	public $image = '';
	public $confirm = '';
	public $disable = '';
	public $active = '';
	public $trash = '';
	public $delete = '';
	public $restore = '';
	public $menu = '';
	public $category = '';
	public $parent_id = '';
	public $title = '';
	public $subtitle = '';
	public $html_summary = '';
	public $summary = '';
	public $html_details = '';
	public $details = '';
	public $cat_id = '';
	public $menu_id = '';

	public function __construct(){
		$this->conn = mysqli_connect("localhost","root","","owncms");
		$this->date = date('Y-m-d h:i:s');
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off'){
	        $dir = 'https://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
	        $array = explode('/', $dir);
	        $pop = array_pop($array);
	        $this->basepath = implode('/', $array);
	    }else{
	        $dir = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
	        $array = explode('/', $dir);
	        $pop = array_pop($array);
	        $this->basepath = implode('/', $array);
	    }
		return $this;
	}
	public function prepare($data){
		if (!empty($data['id'])) {
			$this->id = $data['id'];
		}
		if (!empty($data['user_id'])) {
			$this->user_id = $data['user_id'];
		}
		if (isset($data['is_admin'])) {
			$this->is_admin = $data['is_admin'];
		}
		if (!empty($data['uniqid'])) {
			$this->uniqid = $data['uniqid'];
		}
		if (!empty($data['username']) && !empty($data['password']) && !empty($data['email'])) {
			$this->username = $data['username'];
			$this->password = $data['password'];
			$this->email = $data['email'];
		}
		if (!empty($data['username']) && !empty($data['password'])) {
			$this->username = $data['username'];
			$this->password = $data['password'];
		}
		if (!empty($data['uniq_id'])) {
			$this->uniqid = $data['uniq_id'];
			$this->user_id = $data['user_id'];
			$this->firstname = $data['firstname'];
			$this->lastname = $data['lastname'];
			$this->email = $data['email'];
			$this->personalphone = $data['personalphone'];
			$this->homephone = $data['homephone'];
			$this->officephone = $data['officephone'];
			$this->currentaddress = $data['currentaddress'];
			$this->permanentaddress = $data['permanentaddress'];
			$this->password = $data['password'];
			$this->image = $data['image'];
		}
		if (isset($data['confirm'])) {
			$this->confirm = $data['confirm'];
		}elseif (isset($data['disable'])) {
			$this->disable = $data['disable'];
		}elseif (isset($data['active'])) {
			$this->active = $data['active'];
		}elseif (isset($data['trash'])) {
			$this->trash = $data['trash'];
		}elseif (isset($data['delete'])) {
			$this->delete = $data['delete'];
		}elseif (isset($data['restore'])) {
			$this->restore = $data['restore'];
		}
		if (!empty($data['menu'])) {
			$this->menu = $data['menu'];
		}
		if (!empty($data['category']) || !empty($data['parent_id'])) {
			$this->category = $data['category'];
			$this->parent_id = $data['parent_id'];
		}
		if (!empty($data['title'])) {
			$this->title = $data['title'];
			$this->subtitle = $data['subtitle'];
			$this->html_summary = $data['html_summary'];
			$this->summary = $data['summary'];			
			$this->html_details = $data['html_details'];
			$this->details = $data['details'];
			$this->user_id = $data['user_id'];
			$this->cat_id = $data['cat_id'];
			$this->menu_id = $data['menu_id'];
		}
		return $this;
	}
	public function signup(){
		if (!empty($this->username) && !empty($this->password) && !empty($this->email)) {
			$unique_id = uniqid();
			$query = "INSERT INTO users (unique_id,username,password,email,created_at) VALUES ('".$unique_id."','".$this->username."','".$this->password."','".$this->email."','".$this->date."')";
			if (mysqli_query($this->conn,$query)) {
				$last_id = $this->conn->insert_id;
				$query = "INSERT INTO profiles (user_id,created_at) VALUES ('".$last_id."','".$this->date."')";
				if (mysqli_query($this->conn,$query)) {
					$_SESSION['signup'] = "Sign up successful";
				}
				else{
					$_SESSION['signup'] = "Some error!";
				}
			}else{
				$_SESSION['signup'] = "This username password and email already use";
			}
		}else{
			$_SESSION['signup'] = "Please fillup form first";
		}
		header('location:../login.php');
	}
	public function login(){
		if (!empty($this->username) && !empty($this->password)) {
			$query = "SELECT * FROM users WHERE username = '".$this->username."' AND password = '".$this->password."' AND is_active = 1";
			$result = mysqli_query($this->conn,$query);
			$row = mysqli_fetch_assoc($result);
			if ($row) {
				$_SESSION['username'] = $row['username'];
				$_SESSION['uniqid'] = $row['unique_id'];
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['is_admin'] = $row['is_admin'];
				header('location:../dashboard.php');
			}else{
				$_SESSION['login'] = "Login failed";
				header('location:../login.php');
			}
		}else{
			$_SESSION['login'] = "Please fillup form first";
			header('location:../login.php');
		}
	}
	public function profiles(){
		$query = "SELECT * FROM users RIGHT JOIN profiles ON profiles.user_id = users.id WHERE is_admin = 0 AND is_active != 3 OR is_active IS NULL";
		$result = mysqli_query($this->conn,$query);
		while ($row = mysqli_fetch_assoc($result)){
			$array[] = $row;
		}
		if (!empty($array)) { return $array; }		
	}
	public function profile(){
		if(!empty($this->uniqid)){
			$query = "SELECT * FROM users RIGHT JOIN profiles ON profiles.user_id = users.id WHERE unique_id = '".$this->uniqid."'";
			$result = mysqli_query($this->conn,$query);
			$row = mysqli_fetch_assoc($result);
			return $array = $row;
		}
	}
	public function update_profile(){
		if(isset($this->image) && !empty($this->image)){
			$sql = "SELECT profile_pic FROM users RIGHT JOIN profiles ON profiles.user_id = users.id WHERE unique_id = '".$this->uniqid."'";
			$res = mysqli_query($this->conn,$sql);
			$unlink = mysqli_fetch_assoc($res);
			unlink("../images/".$unlink['profile_pic']);
			$query = "UPDATE users,profiles SET users.email = '".$this->email."',users.password = '".$this->password."',users.modified_at = '".$this->date."',profiles.first_name = '".$this->firstname."',profiles.last_name = '".$this->lastname."',profiles.personal_phone = '".$this->personalphone."',profiles.home_phone = '".$this->homephone."',profiles.office_phone = '".$this->officephone."',profiles.current_address = '".$this->currentaddress."',profiles.permanent_address = '".$this->permanentaddress."',profiles.profile_pic = '".$this->image."',profiles.modified_at = '".$this->date."',profiles.modified_by = '".$this->user_id."' WHERE users.id = profiles.user_id AND users.unique_id = '".$this->uniqid."'";
		}else{
			$query = "UPDATE users,profiles SET users.email = '".$this->email."',users.password = '".$this->password."',users.modified_at = '".$this->date."',profiles.first_name = '".$this->firstname."',profiles.last_name = '".$this->lastname."',profiles.personal_phone = '".$this->personalphone."',profiles.home_phone = '".$this->homephone."',profiles.office_phone = '".$this->officephone."',profiles.current_address = '".$this->currentaddress."',profiles.permanent_address = '".$this->permanentaddress."',profiles.modified_at = '".$this->date."',profiles.modified_by = '".$this->user_id."' WHERE users.id = profiles.user_id AND users.unique_id = '".$this->uniqid."'";
		}
		if (mysqli_query($this->conn,$query)) {
			$_SESSION['message'] = "Update successful";
		}else{
			$_SESSION['message'] = "Update failed";
		}
		header('location:../setting_profile.php');
	}
	public function is_action(){
		if (!empty($this->confirm)) {
			$query = "UPDATE users SET is_active = 1 WHERE unique_id = '".$this->confirm."'";
			mysqli_query($this->conn,$query);
			$_SESSION['message'] = "User disabled";
			header('location:../allusers.php');
		}elseif (!empty($this->disable)) {
			$query = "UPDATE users SET is_active = 2 WHERE unique_id = '".$this->disable."'";
			mysqli_query($this->conn,$query);
			$_SESSION['message'] = "User disabled";
			header('location:../allusers.php');
		}elseif (!empty($this->active)) {
			$query = "UPDATE users SET is_active = 1 WHERE unique_id = '".$this->active."'";
			mysqli_query($this->conn,$query);
			$_SESSION['message'] = "User actived";
			header('location:../allusers.php');
		}elseif (!empty($this->trash)) {
			$query = "UPDATE users SET is_active = 3 WHERE unique_id = '".$this->trash."'";
			mysqli_query($this->conn,$query);
			$_SESSION['message'] = "User trashed";
			header('location:../allusers.php');


		}elseif (!empty($this->delete)) {
			$query = "DELETE profiles,users FROM profiles INNER JOIN users WHERE profiles.user_id = users.id AND unique_id = '".$this->delete."'";
			mysqli_query($this->conn,$query);
			$_SESSION['message'] = "User Deleted";
			header('location:../allusers.php?users=trash');


		}elseif (!empty($this->restore)) {
			$query = "UPDATE users SET is_active = 1 WHERE unique_id = '".$this->restore."'";
			mysqli_query($this->conn,$query);
			$_SESSION['message'] = "User restore";
			header('location:../allusers.php?users=trash');
		}else{
			$_SESSION['message'] = "Update failed";
		}
	}
	public function trash_users(){
		$query = "SELECT * FROM users RIGHT JOIN profiles ON profiles.user_id = users.id WHERE is_active = 3";
		$result = mysqli_query($this->conn,$query);
		while ($row = mysqli_fetch_assoc($result)){
			$array[] = $row;
		}
		if (!empty($array)) { return $array; }	
	}
	public function newmenu(){
		if (!empty($this->menu)) {
			$query = "INSERT INTO menus (title,created_at) VALUES ('".$this->menu."','".$this->date."')";
			if (mysqli_query($this->conn,$query)) {
				$last_id = $this->conn->insert_id;
				$url = "UPDATE menus SET url = '".$last_id."' WHERE id = '".$last_id."'";
				mysqli_query($this->conn,$url);
				$_SESSION['message'] = "Add Menu successful";
			}else{
				$_SESSION['message'] = "Menu add failed";
			}
		}else{
			$_SESSION['message'] = "Add menu first";
		}
		header('location:../addmenu.php');
	}
	public function menus(){
		$query = "SELECT * FROM menus";
		$result = mysqli_query($this->conn,$query);
		while ($row = mysqli_fetch_assoc($result)){
			$array[] = $row;
		}
		if (!empty($array)) {
			return $array;
		}	
	}
	public function menuID(){
		if (!empty($this->id)) {
			$query = "SELECT * FROM menus WHERE id = $this->id";
			$result = mysqli_query($this->conn,$query);
			$row = mysqli_fetch_assoc($result);
			return $row;
		}
	}
	public function updatemenu(){
		if (!empty($this->menu)) {
			$query = "UPDATE menus SET title = '".$this->menu."',modified_at = '".$this->date."' WHERE id = $this->id";
			if (mysqli_query($this->conn,$query)) {
				$_SESSION['message'] = "Update successful";
			}else{
				$_SESSION['message'] = "Update failed";
			}
			header('location:../editmenu.php?id='.$this->id);
		}
	}
	public function deletemenu(){
		if (!empty($this->id)) {
			$query = "DELETE FROM menus WHERE id = $this->id";			
			if (mysqli_query($this->conn,$query)) {
				$_SESSION['message'] = "Delete successful";
			}else{
				$_SESSION['message'] = "Delete failed";
			}
			header('location:../addmenu.php');
		}
	}
	public function newcategory(){
		if (!empty($this->category)) {
			$query = "INSERT INTO categories (title,parent_id,created_at) VALUES ('".$this->category."','".$this->parent_id."','".$this->date."')";
			if (mysqli_query($this->conn,$query)) {
				$_SESSION['message'] = "Add Category successful";
			}else{
				$_SESSION['message'] = "Category add failed";
			}
		}else{
			$_SESSION['message'] = "Add category first";
		}
		header('location:../addcategory.php');
	}
	public function categories(){
		$query = "SELECT * FROM categories WHERE parent_id = 0";
		$result = mysqli_query($this->conn,$query);
		while ($row = mysqli_fetch_assoc($result)){
			$array[] = $row;
		}
		if (!empty($array)) {
			return $array;
		}	
	}
	public function parent_category($parent_id){
		$query = "SELECT * FROM categories WHERE parent_id = $parent_id";
		$result = mysqli_query($this->conn,$query);
		while ($row = mysqli_fetch_assoc($result)){
			$array[] = $row;
		}
		if (!empty($array)) {
			return $array;
		}
	}
	public function categoryID(){
		if (!empty($this->id)) {
			$query = "SELECT * FROM categories WHERE id = $this->id";
			$result = mysqli_query($this->conn,$query);
			$row = mysqli_fetch_assoc($result);
			if (!empty($row)) {
				return $row;
			}
		}
	}
	public function updatecategory(){
		if (!empty($this->category)) {
			$query = "UPDATE categories SET title = '".$this->category."',parent_id = '".$this->parent_id."',updated_at = '".$this->date."' WHERE id = $this->id";
			if (mysqli_query($this->conn,$query)) {
				$_SESSION['message'] = "Update successful";
			}else{
				$_SESSION['message'] = "Update failed";
			}
			header('location:../editcategory.php?id='.$this->id);
		}
	}
	public function deletecategory(){
		if (!empty($this->id)) {
			$query = "DELETE FROM categories WHERE id = $this->id";
			if (mysqli_query($this->conn,$query)) {
				$_SESSION['message'] = "Delete successful";
			}else{
				$_SESSION['message'] = "Delete failed";
			}
			header('location:../addcategory.php');
		}
	}
	public function newpost(){
		if (!empty($this->title)) {
			$queryone = "INSERT INTO articles (users_id,title,sub_title,html_summary,summary,details,html_details,created_at) VALUES ('".$this->user_id."','".$this->title."','".$this->subtitle."','".$this->html_summary."','".$this->summary."','".$this->details."','".$this->html_details."','".$this->date."')";
			if(mysqli_query($this->conn,$queryone)){
				$article_id = $this->conn->insert_id;
				$querytwo = "INSERT INTO articles_categories_mapping (article_id,category_id,created_at) VALUES ('".$article_id."','".$this->cat_id."','".$this->date."')";
				$querythree = "INSERT INTO articles_menu_mapping (article_id,menu_id,created_at) VALUES ('".$article_id."','".$this->menu_id."','".$this->date."')";
				mysqli_query($this->conn,$querytwo);
				mysqli_query($this->conn,$querythree);
				$_SESSION['message'] = "Added New article";
				$_SESSION['lastid'] = $article_id;
			}else{
				$_SESSION['message'] = "failed";
			}
		}else{
			$_SESSION['message'] = "Add title first";
		}
		header('location:../newpost.php');
	}
	public function update_post(){
		if (!empty($this->title)) {
			$queryone = "UPDATE articles SET users_id = '".$this->user_id."',title = '".$this->title."',sub_title = '".$this->subtitle."',html_summary = '".$this->html_summary."',summary = '".$this->summary."',details = '".$this->details."',html_details = '".$this->html_details."',modified_at = '".$this->date."' WHERE id = $this->id";
			if(mysqli_query($this->conn,$queryone)){
				if (!empty($this->cat_id) && !empty($this->menu_id)) {
					$querytwo = "UPDATE articles_categories_mapping SET article_id = '".$this->id."',category_id = '".$this->cat_id."',modified_at = '".$this->date."' WHERE article_id = $this->id";
					$querythree = "UPDATE articles_menu_mapping SET article_id = '".$this->id."',menu_id = '".$this->menu_id."',modified_at = '".$this->date."' WHERE article_id = $this->id";
					mysqli_query($this->conn,$querytwo);
					mysqli_query($this->conn,$querythree);
				}
				$_SESSION['message'] = "Update successful";
			}else{
				$_SESSION['message'] = "Update failed";
			}
		}else{
			$_SESSION['message'] = "Add title first";
		}
		header('location:../editpost.php?id='.$this->id);
	}
	public function deletepost(){
		if (!empty($this->id)) {
			$query1 = "DELETE FROM articles_categories_mapping WHERE article_id = $this->id";
			$query2 = "DELETE FROM articles_menu_mapping WHERE article_id = $this->id";
			$query3 = "DELETE FROM articles WHERE id = $this->id";
			if (mysqli_query($this->conn,$query1) && mysqli_query($this->conn,$query2) && mysqli_query($this->conn,$query3)) {
				$_SESSION['message'] = "Delete successful";
			}else{
				$_SESSION['message'] = "Delete failed";
			}
			header('location:../allposts.php');
		}
	}
	public function articles(){
		if ($this->is_admin == '1') {
			$query = "SELECT * FROM articles ORDER BY id DESC";
		}elseif ($this->is_admin == '0') {
			$query = "SELECT * FROM articles WHERE users_id = $this->user_id ORDER BY id DESC";
		}else{
			$query = "SELECT * FROM articles ORDER BY id DESC";
		}
		$result = mysqli_query($this->conn,$query);
		while ($row = mysqli_fetch_assoc($result)){
			$array[] = $row;
		}
		if (!empty($array)) { return $array; }
	}
	public function article_by_category(){
		$query = "SELECT * FROM articles LEFT JOIN articles_categories_mapping ON articles.id =  articles_categories_mapping.article_id WHERE category_id = $this->id";
		$result = mysqli_query($this->conn,$query);
		while ($row = mysqli_fetch_assoc($result)){
			$array[] = $row;
		}
		if (!empty($array)) { return $array; }
	}
	public function article_by_menus(){
		$query = "SELECT * FROM articles LEFT JOIN articles_menu_mapping ON articles.id =  articles_menu_mapping.article_id WHERE menu_id = $this->id";
		$result = mysqli_query($this->conn,$query);
		while ($row = mysqli_fetch_assoc($result)){
			$array[] = $row;
		}
		if (!empty($array)) { return $array; }
	}
	public function select_articles(){
		$query = "SELECT * FROM articles  WHERE id = $this->id";
		$result = mysqli_query($this->conn,$query);
		$row = mysqli_fetch_assoc($result);
		if (!empty($row)) { return $row; }	
	}
	public function select_for_edit(){
		$query = "SELECT category_id,menu_id FROM articles LEFT JOIN articles_categories_mapping ON articles.id = articles_categories_mapping.article_id LEFT JOIN articles_menu_mapping ON articles.id = articles_menu_mapping.article_id WHERE articles.id = $this->id";
		$result = mysqli_query($this->conn,$query);
		$row = mysqli_fetch_assoc($result);
		if (!empty($row)) { return $row; }	
	}

	public function recent_article(){
		$query = "SELECT * FROM articles ORDER BY id DESC LIMIT 10";
		$result = mysqli_query($this->conn,$query);
		while ($row = mysqli_fetch_assoc($result)){
			$array[] = $row;
		}
		if (!empty($array)) { return $array; }
	}
	
}
?>