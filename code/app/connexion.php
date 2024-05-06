<?php

$servername = "mysql";
$username = "user";
$password = "password";
$dbname = "appdb";


$link=mysqli_connect($servername,$username,$password,$dbname);

if($link){
    //echo "connexion établie"
}else{
    die(mysqli_connect_error());
}
?>