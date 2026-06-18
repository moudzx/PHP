<?php
function ConnectDB(){
    try{
        $con = new PDO("mysql:host=localhost;dbname=library","root","");
        return $con;
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
}

function addNewSpecialty($s_code,$s_name){
    $con=ConnectDB();
    $stmt=$con->prepare("INSERT INTO specialty(s_code,s_name) VALUES(:code,:name)");
    $stmt->bindParam(":code",$s_code);
    $stmt->bindParam(":name",$s_name);
    $con=null;
}

function addNewBook($ISBN,$title,$author,$s_code){
    $con=ConnectDB();
    $stmt=$con->prepare("INSERT INTO book(ISBN,title,author,s_code) VALUES(:isbn,:title,:author,:scode)");
    $stmt->bindParam(":isbn",$ISBN);
    $stmt->bindParam(":title",$title);
    $stmt->bindParam(":author",$author);
    $stmt->bindParam(":scode",$s_code);
    $stmt->execute();
    $con=null;
}

function getAllSpecialities(){
    $con=ConnectDB();
    $stmt=$con->query("SELECT * from speciality");
    $stmt->execute();
    $arr = [];
    while($row=$stmt->fetch()){
        $arr[]=new Specialty($row['s_code'],$row['s_name']);
    }
    $con=null;
    return $arr;
}

function getBooks($specialities){
$arr = [];
$con=ConnectDB();
foreach($specialities as $key=>$value){
$stmt=$con->prepare("SELECT * from book where s_code=:code");
$stmt->bindParam(":code",$value);
$stmt->execute();
while($row=$stmt->fetch()){
    $arr[]=new Book($row['ISBN'],$row['title'],$row['author'],$value);
}
$con=null;
return $arr;
}
}
?>