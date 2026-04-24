<?php


# save data ??

print_r($_POST);

$id = $_POST['id'];
$name = $_POST['name'];
$password = $_POST['password'];


# prepare the data to be added ??
$user_data = "{$id}:{$name}:{$password}\n";

# save the data to the file ?
$file_object = fopen("users.txt", "a");
$saved = fwrite($file_object, $user_data);
if ($saved) {
    echo "User created";
}else{
    echo "Error creating user";
}

fclose($file_object);


# redirect to read_data
header('Location: data_table.php');