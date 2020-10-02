<?php
var_dump($_FILES["fileToUpload"]);
die();

foreach($_FILES["myFiles"]["tmp_name"] as  $key =>$value){
    $tagetPath = "uploads/" . basename($_FILES["myFiles"]["name"][$key]);
    move_uploaded_file($value, $targetPath);
}