<?php
$serverName = 'localhost';
$username = 'root';
$passwd = '';
$db = 'school';
$conn = mysqli_connect($serverName, $username, $passwd, $db,3306,
);
if(!$conn){
    die('Connection Failed' . mysqli_connect_error());
}
?>