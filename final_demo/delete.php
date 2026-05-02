<?php
require_once 'db_operations.php';
# in delete action --> You should make based on post action

var_dump($_POST );


# I have the id ??



if(isset($_POST['id'])){
    $id = $_POST['id'];

    $deleted = delete_student($id);
    if($deleted){
        unlink("images/{$_POST['image']}");
        header('location: students_index.php');
    }

    # we need to connect to the database to delete the student with the given id ??

}