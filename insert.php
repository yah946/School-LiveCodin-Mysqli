<?php
// echo '<pre>';
// var_dump($_SERVER,$_GET, $_POST);
// echo '</pre>';
// echo '<pre>';
// var_dump($_FILES);
// echo '</pre>';
include("config.php");
$f_name = filter_input(INPUT_POST,"firstName",FILTER_SANITIZE_SPECIAL_CHARS);
$l_name = filter_input(INPUT_POST,"lastName",FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);
// var_dump(($f_name),($email),($l_name));
if($f_name && $email && $l_name){
    if(isset($_POST['submit'])){
        $sql = "insert into students (FirstName,LastName,email) VALUES (\"$f_name\",\"$l_name\",\"$email\")";
        mysqli_query($conn,$sql);
        echo "data is saved".mysqli_affected_rows( $conn);
        mysqli_close($conn);
    }
}else{
    echo "Invalid input!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>
    <h1>Student's Massar</h1>
    <form
    action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"
    method="POST"
    >
        <label for="firstName">First Name:</label>
        <input id="firstName" type="text" name="firstName">
        <label for="lastName">Last Name:</label>
        <input id="lastName" type="text" name="lastName">
        <label for="email">Email:</label>
        <input id="email" type="email" name="email">
        
        <input type="submit" name="submit" value="Add Student"/>

        <a href="insert.php">Add Student</a>
        <a href="delete.php">Delete Student</a>
        <a href="select.php">Student's List</a>
        <a href="update.php">Update an Information</a>
    </form>
</body>
</html>