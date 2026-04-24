<?php

require_once "utils.php";


generateTitle("LocalScope", 'red');

# any variable defined inside a function --> its scope is local scope
# can be accessed only inside the function


function say_hello(){

    $name= 'Ahmed';

    echo "My name is {$name}";

}

# calling the function
say_hello();

echo $name;  # undefined variable

#####################################################################################

generateTitle("Global Scope", "green", 1);

# any variable defined inside a .php script

$username = "Ali"; # global

echo "Username is {$username} <br>";

$username = "Ali-updated";

echo "Username is {$username} <br>";


generateTitle("try to access global variable from a function", 'orange',2);

//
function print_usrname(){
    global $username;  # use the global variable ---> username
    echo "from inside the function username = {$username}";
}


print_usrname();


#########################################################3
generateTitle("Parameter scope", "pink");

/**
 * @param $num1
 * @param $num2
 * have local scope, can be accessed only inside the function...
 */
function sum_nums($num1, $num2){

    $res = $num1 + $num2;
    echo "result = {$res} <br>";
}

sum_nums(10,2);

echo "num1 = {$num1} <br>";




##################################################################################
generateTitle("Static Scope", "green", 1);

function count_calls(){

    static $counter = 0;
    $counter += 1;
    echo  "Function is called {$counter} times <br>";
}

count_calls();

count_calls();

count_calls();



##########################################
generateTitle("Super global scope", "blue", 1);

/**
 * super global variables can be accessed anywhere from global scope and the functiion
 */
print_r($_REQUEST);
brk();
print_r($_POST);
brk();
print_r($_GET);

function test_super_global(){
    echo "<br>From inside the function ";
    print_r($_GET);
    echo "<br>";
}
test_super_global();
/**
 *  http://localhost/itp46/php/day01/scoping.php # this url >>
 * parameter are sent the url ---> querystring ??  ?name=noha
 * http://localhost/itp46/php/day01/form.php?name=noha&password=213213123
 *
 *
 */

############################################################################################
generateTitle("Define a constant", "brown", 1);

const data  = "this is a constant";
//define("CONSTANT","Hello world from PHP");

echo data . "<br>";  #dot concat  strings

function test_const(){
    echo "<br>From inside the function ". data . "<br>";
}
test_const();




drawlines();

















































