<?php
namespace Atomicproject\BITM\SEIP112110\Mobile;
// Turn off all deprecated warnings.
error_reporting(E_ALL ^ E_DEPRECATED);

Class Mobile{
    public $id = '';
    public $title = '';
    public $time = '';
    public function __construct(){
        $conn = mysql_connect("localhost","root","") or die("Connection failed");
        mysql_select_db("bitm_112110");
        return $this->time = date('Y-m-d h:i:s');
    }
    public function prepare($data = ''){        
        if( array_key_exists('id',$data) ){
            $this->id = $data['id'];
        }
        if( array_key_exists('title',$data) ){
            $this->title = $data['title'];
        }
        return $this;
    }
    public function store(){
        session_start();
        if( isset($this->title) && !empty($this->title) ){
            $query = "INSERT INTO mobile (title,create_at,update_at,delete_at) VALUES ('".$this->title."','".$this->time."','".$this->time."', NULL)";
            if(mysql_query($query)){
                $_SESSION['massage'] = "Well done! successfully added data.";
            }else{
                $_SESSION['massage'] = "Opps! Here some problems.";
            }
            header('location:create.php');
         }else{
             $_SESSION['massage'] = "Please insert data.";
             header('location:create.php');
         }
    }
    public function index(){
        $array = array();
        $query = "SELECT * FROM mobile WHERE delete_at IS NULL";
        $result = mysql_query($query);
        while($row = mysql_fetch_assoc($result)) {
            $array[] = $row;
        }
        return $array;
    }
    public function trash(){
        $array = array();
        $query = "SELECT * FROM mobile WHERE delete_at IS NOT NULL";
        $result = mysql_query($query);
        while ($row = mysql_fetch_assoc($result)) {
            $array[] = $row;
        }
        return $array;
    }
    public function show(){
        $query = "SELECT * FROM mobile WHERE id = $this->id";
        $result = mysql_query($query);
        $data = mysql_fetch_object($result);
        return $data;
    }
    public function trashed(){
        session_start();
        $query = "UPDATE mobile SET delete_at='".$this->time."' WHERE id = $this->id";
        if(mysql_query($query)){
            $_SESSION['massage'] = "Your data temporary deleted.";
        }else{
            $_SESSION['massage'] = "Opps! Here some problems.";
        }
        header('location:index.php');
    }
    public function restore(){
        session_start();
        $query = "UPDATE mobile SET delete_at= NULL WHERE id = $this->id";
        if(mysql_query($query)){
            $_SESSION['massage'] = "Well done! successfully restore your data.";
        }else{
            $_SESSION['massage'] = "Opps! Here some problems.";
        }
        header('location:index.php');
    }
    public function delete(){
        session_start();
        $query = "DELETE FROM mobile WHERE id = $this->id";
        if(mysql_query($query)){
            $_SESSION['massage'] = "Parmanently delete your data.";
        }else{
            $_SESSION['massage'] = "Opps! Here some problems.";
        }
        header('location:index.php');
    }
    public function update(){
        session_start();
        $query = "UPDATE mobile SET title='".$this->title."',update_at='".$this->time."' WHERE id='".$this->id."'";
        if(mysql_query($query)){
            $_SESSION['massage'] = "Well done! successfully updated your data.";
        }else{
            $_SESSION['massage'] = "Opps! Here some problems.";
        }
        header('location:index.php');
    }
}