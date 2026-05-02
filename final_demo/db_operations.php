<?php


function connect_to_database(){

    $dsn = 'mysql:dbname=iti_arish;host=127.0.0.1;port=3306;'; #port number
    $user = 'arish';
    $password = 'Iti123456789_';
    try {
        $db = new PDO($dsn, $user, $password);
        return $db;
    }catch (PDOException $e) {

        echo 'Connection failed: ' . $e->getMessage();
        return null;
    }
}


# select all students from database
function select_all_students(){
    try {
        $conn = connect_to_database();
        $stmt = $conn->prepare("SELECT * FROM students");
        $stmt->execute();
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $conn = null; # close the connecion
        return $students;
    }
    catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();

    }
    return null;
}


function check_if_email_exists($email){
    try{
        $conn = connect_to_database();
        $stmt = $conn->prepare("SELECT count(email) FROM students WHERE email = :email;");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $conn = null; # close the connecion

        if($row[0] > 0){
            return true;
        }

        return false;

    }catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        return null;
    }
}



function insert_student($name, $email, $image){
    try{
        $conn = connect_to_database();
        $insert_stmt = "Insert into `students` (`name`, `email`, `image`) values (:name, :email, :image);)";
        $stmt = $conn->prepare($insert_stmt);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':image', $image);
        $stmt->execute();
        $id = $conn->lastInsertId();
        $conn = null; # close the connecion

        return $id;

    } catch (PDOException $e) {
        echo 'Insert failed: ' . $e->getMessage();
        return false;
    }
}

function delete_student($id){
    try{

        $conn = connect_to_database();
        $stmt = $conn->prepare("DELETE FROM `students` WHERE `id` = :id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $conn = null; # close the connecion
        return true;
    }catch (PDOException $e) {
        echo 'Delete failed: ' . $e->getMessage();
        return false;
    }
}