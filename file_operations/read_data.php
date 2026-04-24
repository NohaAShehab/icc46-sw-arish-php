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
            $line_data = explode(":", $line_data);
//            var_dump($line_data); brk();

            array_push($users_data, $line_data);

        }

//        var_dump($users_data);

    }
    else{
        echo "<h3 style='color: red'> File Not Found</h3>";
    }

    return $users_data;
}


$users_data = read_data_to_table("users.txt");



function table_styles(){
    echo "
    <style>
        .users-table {
            width: 100%;
            max-width: 720px;
            margin: 20px auto;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            font-family: Arial, sans-serif;
        }
        .users-table thead {
            background: linear-gradient(90deg, #2563eb, #1d4ed8);
            color: #ffffff;
        }
        .users-table th,
        .users-table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        .users-table tbody tr:nth-child(even) {
            background-color: #f8fafc;
        }
        .users-table tbody tr:hover {
            background-color: #eef2ff;
            transition: background-color 0.2s ease;
        }
    </style>
    ";
}

function draw_table($headers, $data){
    table_styles();
    echo "<table class='users-table'> ";
    echo "<thead> <tr>";
    foreach($headers as $header){
        echo "<th>$header</th>";
    }
    echo "</tr> </thead>";

    foreach($data as $row){
        echo "<tr>";
        foreach($row as $col){
            echo "<td>$col</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}


draw_table(["id", "name", "password"], $users_data);
















