<?php

$server = "localhost";
$username = "root";
$passowrd = "";
$db_name = "uas";

$db = new mysqli($server, $username, $passowrd, $db_name);
if(!$db){
    die();
}

?>