<?php
include 'model.php';
class Book{
    public $ISBN,$title,$author,$s_code;
    public function __construct($ISBN,$title,$author,$s_code){
        $this->ISBN=$ISBN;
        $this->title=$title;
        $this->author=$author;
        $this->s_code=$s_code;
    }
}

class Specialty{
    public $s_code,$s_name;
    public function __construct($s_code,$s_name){
        $this->s_code=$s_code;
        $this->s_name=$s_name;
    }
}


class Controller {
    public function addNewSpecialty($s_code,$s_name){
        addNewSpecialty($s_code,$s_name);
    }
    public function addNewBook($ISBN,$title,$author,$s_code){
        addNewBook($ISBN,$title,$author,$s_code);
    }
    public function getAllSpecialities(){
        return getAllSpecialities();
    }
    public function getBooks($s){
        return getBooks($s);
    }
}
?>