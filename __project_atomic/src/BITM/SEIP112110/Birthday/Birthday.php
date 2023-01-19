<?php
namespace Atomicproject\BITM\SEIP112110\Birthday;
// Turn off all deprecated warnings.
error_reporting(E_ALL ^ E_DEPRECATED);

Class Birthday{
    public $id = '';
    public $title = '';
    public $time;
    public function __construct() {
        $conn = mysql_connect("localhost","root","") or die("Not Connect");
        mysql_select_db("bitm_112110");
        return $this->time = date('Y-m-d h:i:s');
    }
    public function prepare($data = ''){
        if(array_key_exists('id', $data)){
            $this->id = $data['id'];
        }
        if(array_key_exists('title', $data)){
            $this->title = $data['title'];
        }
        return $this;
    }

    public function store(){
        session_start();
        if(isset($this->title) && !empty($this->title)){
            $query = "INSERT INTO birthdays (title,created_at,modified_at,deleted_at) VALUES ('".$this->title."','".$this->time."','".$this->time."',NULL)";
            if(mysql_query($query)){
                $_SESSION['message'] = "Succesfully added your birthday";
            }else{
                $_SESSION['message'] = "Here some problems";
            }
        }  else {
            $_SESSION['message'] = "Please add your birthday";
        }
        header('location:create.php');
    }
    public function index(){
        $alldata = array();
        $query = "SELECT * FROM birthdays WHERE deleted_at is NULL";
        $result = mysql_query($query);
        while($row = mysql_fetch_assoc($result)){
            $alldata[] = $row;
        }
        return $alldata;
    }
    public function trashed(){
        session_start();
        $query = " UPDATE birthdays SET deleted_at = '".$this->time."'  WHERE id = $this->id";
        if(mysql_query($query)){
            $_SESSION['message'] = "Data temporary deleted";
        }else{
            $_SESSION['message'] = "Here some problems";
        }
        header('location:index.php');
    }
    public function trash(){
        $alldata = array();
        $query = "SELECT * FROM birthdays WHERE deleted_at is NOT NULL";
        $result = mysql_query($query);
        while ($row = mysql_fetch_assoc($result)){            
            $alldata[] =$row;
        }
        return $alldata;
    }

    public function show(){
        $query = "SELECT * FROM birthdays WHERE id = $this->id";
        $result = mysql_query($query);
        $single = mysql_fetch_object($result);
        return $single;
    }
    public function update(){
        session_start();
        $query = "UPDATE birthdays SET title = '".$this->title."', modified_at = '".$this->time."' WHERE id = $this->id";
        if(mysql_query($query)){
            $_SESSION['message'] = "Data updated";
        }else{
            $_SESSION['message'] = "Here some problems";
        }
        header('location:index.php');
    }
    public function delete(){
        session_start();
        $query = "DELETE FROM birthdays WHERE id = $this->id";
        if(mysql_query($query)){
            $_SESSION['message'] = "Data parmanetly deleted";
        }else{
            $_SESSION['message'] = "Here some problems";
        }
        header('location:trash.php');
    }
    public function restore(){
        session_start();
        $query = "UPDATE birthdays SET deleted_at = NULL WHERE id = $this->id";
        if(mysql_query($query)){
            $_SESSION['message'] = "Data restore successfull";
        }else{
            $_SESSION['message'] = "Here some problems";
        }
        header('location:index.php');
    }
}