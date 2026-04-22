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


function print_usrname(){
    global $username;  # use the global variable ---> username
    echo "from inside the function username = {$username}";
}


print_usrname();





















