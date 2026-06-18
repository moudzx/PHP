<?php
class City{
public $name;
public function __construct($name){
    $this->name=$name;
}
}

class Manager{
    
public function DBConnection(){
    try{
        $db=new PDO("mysql:host=localhost;dbname=corona","root","root");
        return $db;}
    catch(PDOException $e){
        die($e->getMessage());}
}

public function addCity($name){
    $db=$this->DBConnection();
    $stmt=$db->prepare("INSERT INTO city values(:name)");
    $stmt->bindParam(":name",$name);
    $stmt->execute();
    $db=null;
}

public function addInfection($p){
    $db=$this->DBConnection();
    foreach($p as $cityName=>$weekData){
        foreach($weekData as $day=>$nb){
            if($this->checkInfectionExists($cityName,$day,$db)){
                $this->updateInfection($cityName,$day,$nb,$db);
            }
            else {
            $stmt=$db->prepare("INSERT INTO infections(name,weekday,nb) values(:cityName,:weekday,:nb)");
            $stmt->bindParam(":cityName",$cityName);
            $stmt->bindParam(":weekday",$day);
            $stmt->bindParam(":nb",$nb);
            $stmt->execute();
        }}
    }    
    $db=null;
}

public function checkInfectionExists($cityName,$day,$db){
    $stmt=$db->prepare("SELECT COUNT(*) FROM infections WHERE name=:cityName AND weekday=:day");
    $stmt->bindParam(":cityName",$cityName);
    $stmt->bindParam(":day",$day);
    $stmt->execute();
    return $stmt->fetch();
}

public function updateInfection($cityName,$day,$nb,$db){
    $stmt=$db->prepare("UPDATE infections SET nb=:nb WHERE name=:cityName AND weekday=:day");
    $stmt->bindParam(":nb",$nb);
    $stmt->bindParam(":cityName",$cityName);
    $stmt->bindParam(":day",$day);
    $stmt->execute();
}

public function getAllCities(){
    $db=$this->DBConnection();
    $stmt=$db->prepare("SELECT name FROM City");
    $stmt->execute();
    $cities=[];
    while($row=$stmt->fetch()){
        $cities[]=new City($row['name']);
    }
    $db=null;
    return $cities;
}

public function getInfections($cityName,$day){
    $db=$this->DBConnection();
    $stmt=$db->prepare("SELECT nb FROM infections WHERE name=:cityName AND weekday=:day");
    $stmt->bindParam(":cityName",$cityName);
    $stmt->bindParam(":day",$day);
    $stmt->execute();
    $row=$stmt->fetch();
    $db=null;
    if ($row==false) $nb=0;
    else $nb=$row['nb'];
    return $nb;
}

public function getTotalInfections($cityName){
    $db=$this->DBConnection();
    $stmt=$db->prepare("SELECT SUM(nb) as total FROM infections WHERE name=:cityName");
    $stmt->bindParam(":cityName",$cityName);
    $stmt->execute();
    $row=$stmt->fetch();
    $db=null;
    if ($row==false) $tot=0;
    else $tot=$row['total'];
    return $tot;
}
}
?>