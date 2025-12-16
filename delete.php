<?php
require_once 'config.php';
$query = 'delete from students where id=?';
$stm = mysqli_prepare($conn,$query);
mysqli_stmt_bind_param($stm,'i',$_GET['id']);
mysqli_stmt_execute($stm);
mysqli_stmt_close($stm);
header('location:index.php');