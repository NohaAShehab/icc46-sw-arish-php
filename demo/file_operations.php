<?php


# read data ---> then check if id exists ??

function get_all_users($file_name){
        $users_data = [];
        if(file_exists($file_name)){
            $data = file($file_name);

            foreach($data as $line){
                $line_data = trim($line);
                if($line_data != ""){
                    # 4:name:ewe --> explode => [4,"name", "ewe"]
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


function search_by_id($users, $id){
    foreach($users as $user){
        if($user[0] == $id){
            return $user;
        }
    }
    return null;
}