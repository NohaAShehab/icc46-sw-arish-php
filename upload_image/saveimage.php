<?php


# form --> $_POST

var_dump($_POST);


# if you need to find the uploaded files , you fill find it $_FILES
echo '<br> <pre>';
var_dump($_FILES);

############ getting file info

if(! empty($_FILES["image"]["name"]) and !empty($_FILES["image"]["tmp_name"])){
    echo "<h1> file information received </h1>";

    #Now I need to get the information about the file ??

    $image = $_FILES["image"];  # array
    /**
     * $image=>  array(6) {
     * ["name"]=>
     * string(8) "pic1.jpg"
     * ["full_path"]=>
     * string(8) "pic1.jpg"
     * ["type"]=>
     * string(10) "image/jpeg"
     * ["tmp_name"]=>
     * string(27) "/tmp/php2b2025lq55m18OkwNkg"
     * ["error"]=>
     * int(0)
     * ["size"]=>
     * int(48230)
     * }
     */
    $image_name = $image["name"];
    $tmp_name = $image["tmp_name"];
    $extension = pathinfo($image_name, PATHINFO_EXTENSION); # return with extension

    # move the uploaded file the folder images ?
    $image_new_name = time().$image_name;
    $saved = move_uploaded_file($tmp_name, "images/{$image_new_name}");
    if($saved){
        echo "<h1>Image uploaded </h1>";
        echo "<img src=\"images/{$image_new_name}\" />";
    }else{
        echo "<h1 style='color: darkred'>Image could not be uploaded</h1>";
    }





}else{
    echo "<h1 style='color: red'> file  not received </h1>";
}