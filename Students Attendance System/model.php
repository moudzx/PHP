<?php
 function DBConnect(){
       try{ $db = new PDO('mysql:host=localhost;dbname=student', 'root', 'root');
            return $db;

         }catch (PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();}}


 function addStudent($p){
        $db = DBConnect();
        $stmt = $db->prepare("INSERT INTO student (student_id, first_name, last_name) VALUES (:student_id, :first_name, :last_name)");
        $stmt->bindParam(':student_id', $p['student_id']);
        $stmt->bindParam(':first_name', $p['first_name']);
        $stmt->bindParam(':last_name', $p['last_name']);
        $stmt->execute();
    }

     function getAllStudents(){
        $db = DBConnect();
        $stmt = $db->query("SELECT * FROM student");
        $students = [];
        while($row = $stmt->fetch()){
            $students[] = new Student($row['student_id'], $row['first_name'], $row['last_name']);
        }
        return $students;
    }

     function addSheet($date,$students){
        $db = DBConnect();
        $stmt = $db->prepare("INSERT INTO sheets (date, student_id) VALUES (:date, :student_id)");
        foreach($students as $s){
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':student_id', $s);
        $stmt->execute();}
        $db = null;
    }

     function getAllDates(){
        $db = DBConnect();
        $stmt = $db->query("SELECT DISTINCT date FROM sheets");
        $dates = [];
        while($row = $stmt->fetch()){
            $dates[] = $row['date'];
        }
        return $dates;
    }

     function isAttending($date, $student_id){
        $db = DBConnect();
        $stmt = $db->prepare("SELECT * FROM sheets WHERE date = :date AND student_id = :student_id");
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result ? true : false;
    }

     function deleteSheet($date){
        $db = DBConnect();
        $stmt = $db->prepare("DELETE FROM sheets WHERE date = :date");
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        $db = null;
    }

?>