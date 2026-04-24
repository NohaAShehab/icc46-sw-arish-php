<?php


require_once "utils.php";


generateTitle("Echo vs Print", 'red');


echo $_GET;  # Array

$username  = 'Test';
$age = 22;

echo "<br> {$username} ", "new val ", $age, "<br>";

print($username);

######################################################################

generateTitle("Data Types", "green");


$age = 22;
$username  = 'Test';
$salary = 3234.24234;

### 1- print types
echo gettype($salary)."<br>";
echo gettype($username)."<br>";
echo gettype($age)."<br>";

### 2- type casting --> change the datatype ?

$age = (string)$age;
var_dump($age);  # var_dump ==> takes any variable --> list info about this variable
echo gettype($age)."<br>";


## 3- cast string to integer
var_dump($username); brk();
$username = (int) $username;
var_dump($username);

brk();
$username  = '10test';
var_dump($username); brk();
$username = (int) $username;
var_dump($username);


brk();
$username  = 'test10';
var_dump($username); brk();
$username = (int) $username;
var_dump($username);





generateTitle(" Operations ");

generate_inner_title("Addition", 'green', 3);
$num1 = 10;
$num2 = 20;
$res = $num1 + $num2;
echo "result = {$res}";

generate_inner_title("Concat 2 string", "blue", 3);
$a = "Hello, ";
$b = "World!";
$result = $a.$b;
echo "result = {$result}";


###########################
generate_inner_title("Comparison operators", "blue", 3);

$sal1 = 1000;
$sal2 = '1000';

var_dump($sal1== $sal2); # true compare values only

var_dump($sal1 === $sal2); # false compare value and datatype

########################
generate_inner_title("Combined operators", "blue", 3);

$salary = 1000;
$commission = 100;

$salary += $commission;   # $salary = $salary + commission

var_dump($salary);

#############################
generate_inner_title("pre/post increment", "blue", 3);

$num = 10;

echo $num++. "<br>";
echo "num = {$num} <br>";


###################

echo  ++$num; echo "<br>";

#########################################

generate_inner_title("Reference operator", "blue", 3);

$a = 10;
$b = $a ; # copy value of $a in new address = $b

echo "a = {$a}, b = {$b} <br>";

$a++;
echo "a = {$a}, b = {$b} <br>";


#######################################################

$c = 15;
$d = & $c;

echo "c = {$c}, d = {$d} <br>";

$c ++;
echo "c = {$c}, d = {$d} <br>";


#######################################
generate_inner_title("Logical operator", "red", 3);

$var1 = false;
$var2 = true;

var_dump($var1 && $var2);  # false
var_dump($var1 || $var2); # true
var_dump($var1 xor $var2); # true  ### xor make sure if the 2 parts are not the same


################## instance of
generate_inner_title("Instance of ");
class SampleClass{};
$myObject= new SampleClass();
if ($myObject instanceof SampleClass) {echo "<br> the object is an instance of sampleClass"; }


#####################################
generate_inner_title("execution ");

$out = `ls -la`; # call execution operator
echo "<pre>".$out."</pre>";

###########################################################################

/**
 *
 *  set means that the variable is defined and contains a value
 *  empty  ===> variable is not defined , if it is defined , it hasn't any value yet or have falsy values
 * falsy values null, 0,''
 */
generateTitle("isset vs empty");
generate_inner_title("the variable is not defined", 'red');
var_dump(isset($iti)); # false
brk();
var_dump(empty($iti)); # true

# case 2

generate_inner_title("the variable is defined without value ", 'red');

$myname;

var_dump(isset($myname)); # false
brk();
var_dump(empty($myname)); # true

generate_inner_title("the variable is defined with falsy value ", 'green');

$myval = false;

var_dump(isset($myval)); # true  ---> the variable is setted with a value
brk();
var_dump(empty($myval)); # false ?? ---> the value is falae ---> empty


generate_inner_title("the variable is defined with value ", 'blue');
$anyval = 400;
var_dump(isset($anyval));
var_dump(empty($anyval));

































































































































drawlines();