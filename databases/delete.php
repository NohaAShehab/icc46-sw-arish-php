<?php

# in delete action --> You should make based on post action

var_dump($_POST );

# I have the id ??



if(isset($_POST['id'])){
    $id = $_POST['id'];

    # we need to connect to the database to delete the student with the given id ??

    try{
        # I need to delete the image of the object

        $dsn = "mysql:host=localhost;dbname=iti_arish;port=3306";
        $user = 'arish';
        $password = 'Iti123456789_';
        $db = new PDO($dsn, $user, $password);




        $delete = "DELETE FROM students WHERE id=:id";
        $stmt = $db->prepare($delete);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        # to delete image
        unlink("images/{$_POST['image']}");

        header("Location: connect.php");
    }catch (PDOException $e){
        echo $e->getMessage();

    }
}