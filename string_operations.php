<?php
require_once "utils.php";

/***
 *
 * string is immutable datatype , once created couldn't be changes
 * $name=  'Ahmed';
 * $name = strtoupper($name);   # re-assign
 */

$message= "We love php";

$message = explode(" ", $message);

var_dump($message);

generate_inner_title("Implode or join ");
# implode

$arr = ["Apple", 'orange', 'kiwi'];

$fruits = join("_", $arr);

var_dump($fruits);


$fullname = 'ahmed mohamed';
var_dump(ucwords($fullname));

var_dump(strtoupper($fullname));
var_dump(strtolower($fullname));

#####################################################
brk();
//echo  htmlspecialchars("We love PHP ");

echo "<h1>We love PHP </h1>";

brk();

echo htmlspecialchars("<h1>We love PHP </h1>");












