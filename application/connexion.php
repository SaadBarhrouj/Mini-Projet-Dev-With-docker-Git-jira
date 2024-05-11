<?php

$servername = "db";
$username = "root";
$password = "root";
$dbname = "app_db";


$link = mysqli_connect($servername,$username,$password,$dbname);

if($link){
    //echo "connexion établie"
}else{
    die(mysqli_connect_error());
}
?>
