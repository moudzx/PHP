<?php
require("model.php");

class stu {
    public $stuId;
    public $fname;

    public function __construct($stuId, $fname)
    {
        $this->stuId=$stuId;
        $this->fname=$fname;
    }
}

class course {
    public $code;
    public $name;

    public function __construct($code, $name)
    {
        $this->code=$code;
        $this->name=$name;
    }
}

class stutocourse  {
    public $courseCode;
    public $stuId;

    public function __construct($courseCode, $stuId)
    {
        $this->courseCode=$courseCode;
        $this->stuId=$stuId;
    }
}

class control{

 function addstudent($newstu){
    addstu($newstu);
 }

 function getcourses(){
    $courses=getCourses();
    return $courses;
 }

 function getstudents(){
   $students= getStus();
   return $students;
 }

 function assign($stutoassign){
    foreach ($stutoassign as $stu => $courses){
        foreach ($courses as $course)
        assign($stu, $course);
    }
 }

 function getstuofcourse($code){
     $result =getAssigned($code);
     return $result;
}
}

?>