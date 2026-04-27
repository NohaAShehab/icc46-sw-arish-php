<?php


var_dump($_POST);

$email = $_POST["email"];
$password = $_POST["password"];

####################################
// check email and password  existing in the file

function get_data($file_name){
    $data = [];
    if(file_exists($file_name)){

        $file_data = file($file_name); # read file content into an array
        foreach($file_data as $line){
            $line = trim($line);
            if(!empty($line)){
                $line = explode(':', $line);
                array_push($data, $line);
            }
        }

    }
    return $data;
}


$users = get_data("users.txt");
// check if users exists in the file or not , email, password if yes --> login successfull or not redirect to login
$success = false ;
echo "{$email}, {$password} <br>";

foreach ($users as $user) {
    echo "in file :: {$user[2]}, {$user[3]} <br>";

    if($user[2]=== $email && $user[3]=== $password){
        $success = true;
        break;
    }
}

if($success===true){
    echo "<h1> Login successfull </h1>";
    # I need to save its information on the server ?

    # you need to create session of it ..... ---> start session ?
    # 1- start session ???
    var_dump($_SESSION);  # session is null by default before starting
    session_start(); # prepare $_SESSION
    echo "<br>";
    var_dump($_SESSION);
    # you can use this variable to save information inside the session file ??
    $_SESSION['email'] = $email;
    $_SESSION['login'] = true;
    echo "<br>";

    var_dump($_SESSION);

    ### after starting the session ?? # redirect to the profile

    header("Location: profile.php");




}else{
    echo "<h1 style='color: red'> Login un successfull </h1>";
    header("Location:login_form.php?message=username or password incorrect");
}









