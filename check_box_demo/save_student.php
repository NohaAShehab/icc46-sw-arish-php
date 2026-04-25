<?php
require_once '../utils.php';


$id = $_POST['id'];
$name = htmlspecialchars($_POST['name']);
$password = $_POST['password'];
$email = $_POST['email'];

print_r($_POST);
$skill_set ='';

$errors = [];
$valid_data = [];

if(!isset($id) or empty($id)) {
    $errors['id'] = 'ID is required';
}else{
    $valid_data['id'] = $id;
}
if(!isset($name) or empty($name)) {
    $errors['name'] = 'Name is required';
}else{
    $valid_data['name'] = $name;
}

if(!isset($password) or empty($password)) {
    $errors['password'] = 'Password is required';
}

if(!isset($email) or empty($email)) {
    $errors['email'] = 'Email is required';
}else{
    # check if email valid email
    $pattern="/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    $valid =  preg_match($pattern,$email);  # return with true,,,
    brk();
    echo "Preg match ";
    var_dump($valid);
    brk();
    if(!$valid) {
        $errors['email'] = 'Invalid email format';
    }
    $valid_data['email'] = $email;
}


if(isset($_POST["skills"])){
    $skills = $_POST["skills"];
    foreach($skills as $skill){
        $skill_set .= $skill.',';
    }
    echo "StudentsSkill is {$skill_set}";
}



if (count($errors) == 0) {
    generateTitle("Student data is correct ");

}else{

    # errors ---> Associative array ?? we need to send it in the url ??
    # convert the array to be string --->
    $errors_data = json_encode($errors);  # convert array to a string
    if(!empty($valid_data)){
        $valid_data = json_encode($valid_data);
//        header("Location: add_student.php?errors={$errors_data}&data={$valid_data}");

    }else{
//        header("Location: add_student.php?errors={$errors_data}");

    }
}