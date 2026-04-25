<?php


# save data ??

//print_r($_POST);

$id = $_POST['id'];
$name = $_POST['name'];
$password = $_POST['password'];

/***
 * before starting to add the info, we need to validate the data
 */


$errors = [];

if(!isset($id) or empty($id)) {
    $errors['id'] = 'ID is required';
}
if(!isset($name) or empty($name)) {
    $errors['name'] = 'Name is required';
}

if(!isset($password) or empty($password)) {
    $errors['password'] = 'Password is required';
}


if (count($errors) == 0) {
        # prepare the data to be added ??
            $user_data = "{$id}:{$name}:{$password}\n";

        # save the data to the file ?
            $file_object = fopen("users.txt", "a");
            $saved = fwrite($file_object, $user_data);
            if ($saved) {
                echo "User created";
            } else {
                echo "Error creating user";
            }

            fclose($file_object);


        # redirect to read_data
        header('Location: data_table.php');

}else{

    # errors ---> Associative array ?? we need to send it in the url ??
    # convert the array to be string --->
    $errors_data = json_encode($errors);  # convert array to a string
    header("Location: add_user.php?errors={$errors_data}");
}