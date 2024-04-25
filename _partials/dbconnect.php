<?php
$servername="localhost";
$username= "root";
$password= "Paras@10";
$database="user";
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    die("Failed to connect to database");
}
?>