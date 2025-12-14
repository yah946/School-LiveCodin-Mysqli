<?php
include("config.php");
$id = $_GET["id"];
$sql = "delete from students where id = '$id'";
mysqli_query($conn,$sql);
header("location:insert.php")
?>