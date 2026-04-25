<?php

require_once("../utils.php");

function read_data_to_table($file_name){
    $users_data = [];
    if(file_exists($file_name)){
        $data = file($file_name);

        foreach($data as $line){
            $line_data = trim($line);
            if($line_data != ""){
                $line_data = explode(":", $line_data);
                array_push($users_data, $line_data);
            }
        }
    }
    else{
        echo "<h3 style='color: red'> File Not Found</h3>";
    }

    return $users_data;
}


$users_data = read_data_to_table("users.txt");
generateTitle("All users");
table_styles();
echo "<a class='add-user-btn' href='add_user.php'>Add User</a>";

draw_table(["id", "name", "password"], $users_data);