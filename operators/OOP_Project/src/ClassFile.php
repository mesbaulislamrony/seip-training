<?php
namespace application;

class ClassFile{
	public $title = "I'm public class property";
	function setProperty($setp){
		$this->title = $setp;
	}
	function getProperty(){
		return $this->title;
	}
}

?>