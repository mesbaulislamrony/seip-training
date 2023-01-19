<?php
namespace Assign;

Class Myclass{
	public $propone = "This value for proctected method";
	public $proptwo = "This value for public method";


	protected function portectfun(){
		return $this->propone;
	}

	public function newmethod(){
		return $this->portectfun();
	}
}
?>