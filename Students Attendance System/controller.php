<?php
include "model.php";
class Student{
    public $student_id, $first_name, $last_name;
    public function __construct($id, $firstname, $lastname){
        $this->student_id = $id;
        $this->first_name = $firstname;
        $this->last_name = $lastname;
    }
}
class Manager{


    public function addStudent($p){
        addStudent($p);
    }

    public function getAllStudents(){
       return getAllStudents();
    }

    public function addSheet($date,$students){
       addSheet($date,$students);
    }

    public function getAllDates(){
        return getAllDates();
    }

    public function isAttending($date, $student_id){
        return isAttending($date, $student_id);
    }

    public function deleteSheet($date){
        deleteSheet($date);
    }

}
?>