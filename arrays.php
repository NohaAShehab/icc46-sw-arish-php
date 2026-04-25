<?php

require_once 'utils.php';


generateTitle("Arrays", "red");

# 1- define array

$arr =[23,2323, "iti","SW", ["PHP", "Mysql", "JS"]];

var_dump($arr);

generate_inner_title("get item from array");
echo $arr[3]."<br>";

echo $arr[4][1]."<br>";


$arr[3] = "Software Engineering ";

//var_dump($arr);
################################################################

generateTitle("Associative arrays ");

$info = [
    "name"=>"Noha",
    "track" =>"SW Fund",
    "branch" =>"Arish"
];

var_dump($info);

echo $info["name"];

$info['city'] = 'cairo';

print_r($info);

#################################
generateTitle("adding 2 arrays ");
$num=[2,4,6,8,10];
print_r($num);
$alphas=["a","b","c","d", "e", 'f', "g"];
print_r($alphas);
$arr3= $num+$alphas;
var_dump($arr3);

########################

generateTitle("Sorting arrays ");
$names = array( 'noha', "Fatma", "Dina", "Andrew","Shimaa","suliman" );
var_dump($names);
sort($names); // returns with the are sorted ascending.
var_dump($names);


generate_inner_title("sort associative arrays ", "blue");

$prices = array( "meat"=>100, "sugar"=>10, "tea"=>8 );
asort($prices);
var_dump($prices);


ksort($prices);
var_dump($prices);








###############################
generate_inner_title("Arrays  and foreach", "blue");

$courses = ["Python", "PHP", "WordPress"];


# access elements of array
//
//for($i=0; $i<count($courses); $i++) {
//    echo $courses[$i]."<br>";
//}
//


foreach ($courses as $course) {
        echo "$course<br>";
}


foreach ($courses as $index=> $item) {
    echo "{$index} - {$item}<br>";
}



generate_inner_title("Associative arrays ", "blue");

$info = [
    "name"=>"Noha",
    "track" =>"SW Fund",
    "branch" =>"Arish",
    "city" => "cairo"
];


foreach ($info as $item) {
    echo "$item<br>";
}


foreach ($info as $key => $value) {
    echo "{$key}=>$value<br>";
}














drawlines();































