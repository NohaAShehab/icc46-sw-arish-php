<?php



function append_data($file_name, $data){
    try {
        $file = fopen($file_name, "a");
        fwrite($file, $data);
        fclose($file);
        return true;
    }
    catch(Exception $e) {
        return false;
    }
}


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


function search_by_id($file_name, $id){

    $users =  get_data($file_name);
    var_dump($users);
//    var_dump($id, "id hereeee");
    foreach($users as $user){
//        var_dump($user[0], "i am in foreach ");
        if($user[0] == $id){
            return $user;
        }

    }
    return false;
}

//$res = get_data("users.txt");
//echo "<pre>";
//var_dump($res);
//
//$found = search_by_id("users.txt", 10);
//var_dump($found);