<?php

require_once "db_operations.php";
// validation


$post_data  = $_POST;
$files_data = $_FILES;

$has_file   = !empty($_FILES["image"]["name"]) && !empty($_FILES["image"]["tmp_name"]);
$saved      = false;
$image_new_name = '';

$name = $post_data['name'];
$email = $post_data['email'];

///// validation ....
$errors = [];
$old_data = [];

if(isset($name) and !empty($name)){
    $old_data['name'] = $name;
}else{
    $errors['name'] = "Name is required";
}


if(isset($email) and !empty($email)){
    # check if email exists in the db ??
    $old_data['email'] = $email;

    $email_exists = check_if_email_exists($email);
    if($email_exists){
        $errors['email'] = "Email already exists";
    }


}else{
    $errors['email'] = "Email is required";
}


if(count($errors) === 0){
    # upload the image, then create new student ?
    if ($has_file) {
        $image          = $_FILES["image"];
        $image_name     = $image["name"];
        $tmp_name       = $image["tmp_name"];
        $extension      = pathinfo($image_name, PATHINFO_EXTENSION);
        $image_new_name = time() . $image_name;
        $saved          = move_uploaded_file($tmp_name, "images/{$image_new_name}");
    }else{
        $image_new_name = null;
    }

    // then save the user to the database ??
    $saved = insert_student($name, $email, $image_new_name);
    if($saved){
        echo '<h1>user saved successfully </h1>';
        header('location: students_index.php');
    }else{
        echo '<h1 style="color: red">something went wrong </h1>';
    }
}else{

    $errors_data = json_encode($errors);
    if(count($old_data)> 0) {
        $form_data = json_encode($old_data);
        header("Location:form.php?errors=$errors_data&form_data=$form_data");
    }else{
        header("Location:form.php?errors=$errors_data");
    }

}