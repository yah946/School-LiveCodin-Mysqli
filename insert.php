<?php
include("config.php");
$success = '';
$error = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_GET["id"])) {
        $id = $_POST["id"];
        $f_name = $_POST['firstName'];
        $l_name = $_POST['lastName'];
        $email = $_POST['email'];
        if($f_name && $l_name && $email) {
            $sql = "update students set FirstName = ?,LastName = ?,email = ? where id=?";
            $stm = mysqli_prepare( $conn,$sql);
            mysqli_stmt_bind_param($stm,'sssi',$f_name,$l_name,$email,$id);
            mysqli_stmt_execute($stm);
            $success = "Data is been saved";
        }
    }else{
        $f_name = $_POST['firstName'];
        $l_name = $_POST['lastName'];
        $email = $_POST['email'];
        if($f_name && $l_name && $email) {
        $sql = "insert into students (FirstName,LastName,email) values (?,?,?)";
        $stm = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stm,'sss',$f_name,$l_name,$email);
        mysqli_stmt_execute($stm);
        $success = "Data is been saved";
        }else{
            $error = "Invalid Input!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cdnjs.cloudflare.com" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Insert</title>
</head>
<body>
    <h1 class="title">Student's Massar</h1>
    <?php
    include("config.php");
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id=(int) $_GET["id"];
            $sql = "select * from students where id = $id";
            $selected = mysqli_query($conn,$sql);
            $tb = mysqli_fetch_assoc($selected);
            $fname = $tb['FirstName'];
            $lname = $tb['LastName'];
            $email = $tb['email'];
        }
        if(isset($_POST['submit'])){
            $fname = '';
            $lname ='';
            $email = '';
        }
    ?>
    <form
    class="form"
    action="insert.php?<?php if(isset($_GET['id'])){echo 'id=update';} ?>"
    method="POST"
    >
        <input id="id" type="hidden" name="id" value="<?php if(isset($_GET['id'])){echo $_GET['id'];} ?>">
        <label for="firstName">First Name:</label>
        <input id="firstName" type="text" name="firstName" value="<?php if(isset($_GET['id'])){echo $fname;}?>">
        <label for="lastName">Last Name:</label>
        <input id="lastName" type="text" name="lastName" value="<?php if(isset($_GET['id'])){echo $lname;}?>">
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" value="<?php if(isset($_GET['id'])){echo $email;}?>">

        <button class="btn" type="submit" name="submit">
            <?php
            if(isset($_GET['id'])){
                echo "Update";
            }else{
                echo "Add a Student";
            }
            ?>
        </button>

        <?php
        if(!empty(($success))){
            echo "<span calss='success'>$success</span>";
        }else{
            echo "<span1 calss='success'>$error</span1>";
        }
        ?>

    </form>
    <table border="1" width="90%" cellpadding="5">
        <thead>
            <th>id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Update</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php
                include('config.php');
                $sql = 'select * from students';
                $select_all = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($select_all)){
                    echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[FirstName]</td>
                        <td>$row[LastName]</td>
                        <td>$row[email]</td>
                        <td>
                            <a class='action-button update-button' href='insert.php?id=$row[id]'>update</a>
                        </td>
                        <td>
                            <a class='action-button' href='delete.php?id=$row[id]'>delete</a>
                        </td>
                    </tr>
                    ";
                }
            ?>
        <tbody>
    </table>
</body>
</html>