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


/*********************** Upload image
 *  when you upload image to the sever ,, you can find the image information ?
 * in $_FILES
 */

echo "<pre>";
var_dump($_FILES);

# if the size of the image is suitable for the server configuration, the image will be uploaded
# ---> the image will be moved to the tmp_name

$image = $_FILES['image'];
$image_name = time().$image['name'];
$image_tmp = $image['tmp_name'];
# you must move the image from tempname to the path
$saved = move_uploaded_file($image_tmp, "images/{$image_name}" );

var_dump($saved);

echo "</pre>";











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
    echo "<img src='images/{$image_name}'>";

}else{

    # errors ---> Associative array ?? we need to send it in the url ??
    # convert the array to be string --->
    $errors_data = json_encode($errors);  # convert array to a string
    if(!empty($valid_data)){
        $valid_data = json_encode($valid_data);
        header("Location: add_student.php?errors={$errors_data}&data={$valid_data}");

    }else{
        header("Location: add_student.php?errors={$errors_data}");

    }
}