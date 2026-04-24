<?php

require_once('../utils.php');

generateTitle("Read Data", "Blue");


function basic_read(){
    if (file_exists("users.txt")) {
        $file_obj = fopen("users.txt", "r");
//    var_dump($file_obj);
//    brk();
        $file_size=filesize("users.txt");
//    var_dump($file_size);
//    brk();
        # read data ??
        $data = fread($file_obj, $file_size); # read data into one string ??
//        var_dump($data);
        ### I need to display it in table
        generate_inner_title("read line by line ");
        # reset the pointer ??
        fseek($file_obj, 0); # return the pointer to position 0
        while(!feof($file_obj)){  # foef  --> return true if file reached its end ..
            $line = fgets($file_obj);
            echo "Line: {$line} <br>";
        }

        # you must close the file
        fclose($file_obj);

    }else{
        echo generate_inner_title("No such file or directory", "red");
    }
}

//basic_read();

function read_data_to_table($file_name){
    $users_data = [];
    if(file_exists($file_name)){
        $data = file($file_name); # array of string each string --> has contains a line ?
//        var_dump($data);


        foreach($data as $line){

           # 1:ahmed:abc  ==> [1, ahmed, password ]
            # 1- split line to an array
            $line_data = trim($line);  # remove \n from the end the line
            # explode by : ??
            if($line_data != ""){
                $line_data = explode(":", $line_data);
    //            var_dump($line_data); brk();

                array_push($users_data, $line_data);
            }

        }

//        var_dump($users_data);

    }
    else{
        echo "<h3 style='color: red'> File Not Found</h3>";
    }

    return $users_data;
}


$users_data = read_data_to_table("users.txt");
draw_table(["id", "name", "password"], $users_data);


















