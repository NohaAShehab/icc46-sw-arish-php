<?php


echo "<h1 style='color: red; text-align: center;'> Hello world , we have received the form </h1>" ;


# data sent to the form.php ===> using method get ? we need to display it

# to display these data ?? --->You can find it in variable $_REQUEST

# to print this variable

echo "<h2> Request data </h2>";
print_r($_REQUEST); # contain the info sent to this page



echo "<h2> You can find the data in $_GET  if you are using get method </h2>";

print_r($_GET);


echo "<h1>Thank you for submitting info. </h1>";

echo "Name :", $_GET["name"] , '<br>';

echo "Password :", $_GET["password"] , '<br>';

















