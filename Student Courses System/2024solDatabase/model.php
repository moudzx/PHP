<?php
function connection(){
 $username="root";
    $password="";

    try {
        $con = new PDO("mysql:host=localhost;dbname=phpdb", $username, $password);
    } catch(PDOException $e) {
        die();
    }  

    return $con;
}

function addstu($newstu){

    $con = connection();

    try {
    
    $query="INSERT INTO stu (stuId, fname) VALUES (:stuId, :fname)";
    $stm = $con->prepare($query);
    $stm->bindParam(":stuId", $newstu['stuId']);
    $stm->bindParam(":fname", $newstu['fname']);
    $stm->execute();
   }  catch (PDOException $e){ die();}

   $con = null;
}
function getStus(){
    $con = connection();
    try {
        $query="SELECT * FROM stu";
        $stm = $con->query($query);

        $result =[];
        while($row=$stm->fetch()){
            $result[]= new stu($row['stuId'], $row['fname']);
        }
    }catch(PDOException $e) {die();}
$con = null;
return $result;

}

function getCourses(){
    $con = connection();
    try {
        $query="SELECT * FROM course";
        $stm = $con->query($query);

        $result=[];
        while($row= $stm->fetch()){
            $result[]= new course($row['code'], $row['name']);
        }
    } catch(PDOException $e){die();}
    $con = null;
    return $result; 
}

function assign($stuId, $courseCode){
    $con = connection();
    try{
        $query=("INSERT INTO stutocourse (courseCode, stuId) values (:courseCode, :stuId)");
        $stm = $con->prepare($query);
        $stm->bindParam(":courseCode", $courseCode);
        $stm->bindParam(":stuId", $stuId);
        $stm->execute();
    } catch(PDOException $e){ die();}
    $con = null;
}

function getAssigned($code){
    $con = connection();
    try{
        $query="SELECT * FROM stu WHERE stuId IN (SELECT stuId FROM stutocourse WHERE courseCode = :code)";
        $stm=$con->prepare($query);
        $stm->bindParam(':code', $code);
        $stm->execute();
        $result=[];
        while($row=$stm->fetch()){
            $result[]= new stu($row['stuId'], $row['fname']);
        }
    }catch(PDOException $e) {die();}
    $con = null;
    return $result;
}
?>