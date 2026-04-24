<?php


    require_once  '../utils.php';


    generateTitle("Write data to a file ");

/***
 * when you open file with mode w --> if file exists  --> remove its content
 */
function basic_write_data()
{
    $file_obj = fopen("users.txt", "w");
    var_dump($file_obj);
    $res = fwrite($file_obj, "1:noha:iti");
    var_dump($res);

    fclose($file_obj);

}


function append_data(){

    $file_obj = fopen("users.txt", "a");
    var_dump($file_obj);
    $res = fwrite($file_obj, "1:noha:iti\n");
    var_dump($res);

    fclose($file_obj);
}


//append_data();














