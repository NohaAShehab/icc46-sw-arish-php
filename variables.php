<?php


require_once "utils.php";

generateTitle("define variable", "blue", 1);

# variables and values in php

$name = "noha"; # define variable in memory --->
echo $name;

# print type of variable ?
brk();
echo gettype($name);
brk();
$age = 13;
echo $age; echo "<br>"; echo gettype($age);

##########################################################################
generateTitle("Values in string ");

$track = "php";

$track2 = 'php';


echo $track; echo "<br>";
echo $track2; echo "<br>";

$php = 'new';


echo $php; echo "<br>";

echo $$track; echo "<br>";

echo $$track2; echo "<br>";
####################################################################
generateTitle("Single quote vs double quote");

echo "Hello from track $track  <br>";  # value of $track

echo 'Hello from track $track  <br>'; # single quote  => print '$track' value as a literal



















