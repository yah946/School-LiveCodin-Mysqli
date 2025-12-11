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
        <input id="id" type="hidden" name="id" disabled>
        <label for="firstName">First Name:</label>
        <input id="firstName" type="text" name="firstName">
        <label for="lastName">Last Name:</label>
        <input id="lastName" type="text" name="lastName">
        <label for="email">Email:</label>
        <input id="email" type="email" name="email">
        
        <input type="submit" name="submit" value="Add Student"/>
        <?php
             $sql = "select * from students";
                $selected = mysqli_query($conn,$sql);
                echo "<table>
                <thead>
                    <th>id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </thead>";
                while($tb = mysqli_fetch_assoc($selected)){
                    echo "<tr>
                    <td>$tb[id]</td>
                    <td>$tb[FirstName]</td>
                    <td>$tb[LastName]</td>
                    <td>$tb[email]</td>";
                } 
        ?>
    </form>
</body>
</html>