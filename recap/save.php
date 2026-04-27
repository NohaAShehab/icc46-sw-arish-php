<?php

require_once 'file_operations.php';
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
var_dump($_POST);


var_dump($_FILES);

##### get information from form
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$id = htmlspecialchars($_POST['id']);
$password = htmlspecialchars($_POST['password']);
$image = $_FILES['image'];

echo "<h1> Hello </h1>";

$errors = [];

$form_data = [];
### validation
if(! isset($name) or empty($name)) {
    $errors['name'] = 'Name is required';
}else{
    $form_data['name'] = trim($name);
}

if(! isset($email) or empty($email)) {
    $errors['email'] = 'Email is required';
}else{
    $pattern="/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    if(!preg_match($pattern, $email)) {
        $errors['email'] = 'Invalid email format';
    }

    $form_data['email'] = trim($email);
}

// validate id
if(! isset($id) or empty($id)) {
    $errors['id'] = 'ID is required';
}else{

    if(!is_numeric($id)){
        $errors['id'] = 'ID must be numeric';
    }

    // check if id exists before
    $found = search_by_id("users.txt", $id);

    if($found){
        $errors['id'] = 'ID already exists';
    }
    $form_data['id'] = trim($id);
}

if(! isset($password) or empty($password)) {
    $errors['password'] = 'Password is required';
}

var_dump($image);

// validate Image
if(empty($image['name']) or  empty ($image['tmp_name']) or $image['size'] == 0 ) {
    // validate the image , type , size
    $errors['image'] = 'Image is required';
}else{

    // add validation

    // validate $extension , if valid extension ---> upload
    $extension  = pathinfo($image['name'], PATHINFO_EXTENSION);
    var_dump($extension);

    $size = $image['size'];
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
    if(in_array($extension, $allowed_extensions)) {
        // save the  image
        if($size> 1000000){
            $errors['image'] = "Image is too big {$size}mb";
        }
    }else{
        $errors['image'] = "Invalid extension {$extension}";
    }
}


if(count($errors)> 0) {

    $errors = json_encode($errors);

    if(count($form_data)>0) {
        $form_data = json_encode($form_data);
        header("Location: register.php?errors={$errors}&data={$form_data}");
    }else{
        header("Location: register.php?errors={$errors}");
    }
}else{
   # prepare the form data to be saved to a file .
    $image_name = time().'.'.$image['name'];

    # 1-move uploaded files
    $image_uploaded = move_uploaded_file($image['tmp_name'], "images/{$image_name}");

    #2- prepare data to save

    $user = "{$id}:{$name}:{$email}:{$password}:{$image_name}\n";


    $saved = append_data("users.txt", $user);

    if($saved){
//        echo "<h1> User saved successfully </h1>";

        // display data in a table
        header("Location: all_users.php");
    }
    else{
        echo "<h1> User not saved</h1>";
    }


}




























## if valid save data a file