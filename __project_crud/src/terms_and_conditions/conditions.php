<?php
namespace allproject\terms_and_conditions;
session_start();
// Turn off all deprecated warnings.
error_reporting(E_ALL ^ E_DEPRECATED);

Class conditions{
	public $title = '';
	public $agree = '';
	public $time;
	public function __construct(){
		$conn = mysql_connect('localhost','root','') or die("Connection aborted");
		mysql_select_db('bitm_112110') or die('Select database error!');
		return $this->time = date('Y-m-d h:i:s');
	}
	public function prepare($data = ''){
		if (array_key_exists('email',$data)) {
			$this->title = $data['email'];
		}
		if (array_key_exists('agree',$data)) {
			$this->agree = $data['agree'];
		}
		return $this;
	}
	public function store(){
		if( !empty($this->title) && !empty($this->agree) ){
			$query = "INSERT INTO termsconditions (title,is_check,created_at,update_at,deleted_at) VALUES ('".$this->title."',1,'".$this->time."','".$this->time."',NULL)";
			if(mysql_query($query)){
                $_SESSION['message'] = "Thank you for your aggrement.";
            }else{
                $_SESSION['message'] = "Opps! Here some problems.";
            }
            header('location:index.php');
         }else{
             $_SESSION['message'] = "Please first agree with us.";
             header('location:index.php');
         }
	}
	public function index(){
		$array = array();
		$query = "SELECT * FROM termsconditions";
		$result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	}
}