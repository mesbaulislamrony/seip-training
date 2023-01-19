<?php
namespace BookName;
class Book{
    public $property_a = "This is first property";
    public $property_b = "This is second property";
    public function methoda(){
        echo "This is common Method";
    }
    public function index(){
        $array = array("Apple","Banana","Orange");
        print_r($array);
    }
}
