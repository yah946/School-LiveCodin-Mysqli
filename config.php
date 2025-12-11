<?php
$host = 'localhost';
$username = 'root';
$pass = '';
$dbname = 'school';
$conn = mysqli_connect($host, $username,$pass,$dbname);
if(!$conn){
    die("Connection Failed". mysqli_connect_error());
}
?>