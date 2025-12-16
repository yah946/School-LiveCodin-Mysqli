<?php
include "config.php";
$error = '';
$suc = '';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $f_name = filter_input(INPUT_POST,'firstName',FILTER_SANITIZE_SPECIAL_CHARS);
    $l_name = filter_input(INPUT_POST,'lastName',FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
    if(isset($_GET['id'])){
        if($f_name && $l_name && $email){
            $id = $_GET['id'];
            $query = "update students set FirstName=?, LastName=?, email=? where id = ?";
            $stm = mysqli_prepare($conn,$query);
            mysqli_stmt_bind_param($stm,'sssi',$f_name,$l_name,$email,$id);
            mysqli_stmt_execute($stm);
            $suc = "Data has been changed";
        }else{
            $error = "Invalid Input";
        }
        header('location:index.php');
    }else{
        if($f_name && $l_name && $email){
            $query = "insert into students (FirstName, LastName, email) values(?,?,?)";
            $stm = mysqli_prepare($conn,$query);
            mysqli_stmt_bind_param($stm,'sss',$f_name,$l_name,$email);
            mysqli_stmt_execute($stm);
            $suc = "Data has been saved";
        }else{
            $error = "Invalid Input";
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
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $id = (int) $_GET['id'];
            $query = "select * from students where id=$id";
            $select_where = mysqli_query($conn,$query);
            $tb = mysqli_fetch_assoc($select_where);
            $fname = $tb['FirstName'];
            $lname = $tb['LastName'];
            $Email = $tb['email'];
        }
    ?>
    <form
    class="form"
    action=""
    method="POST"
    >
        <input id="id" type="hidden" value="<?= $id ?? '' ?>">
        <label for="firstName">First Name:</label>
        <input id="firstName" type="text" name="firstName" value="<?= $fname ?? '' ?>">
        <label for="lastName">Last Name:</label>
        <input id="lastName" type="text" name="lastName" value="<?= $lname ?? '' ?>">
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" value="<?= $Email ?? '' ?>">

        <button class="btn" type="submit">
            <?php
            if(isset($_GET['id'])){
                echo "Update";
            }else{
                echo "Add a Student";
            }
            ?>
        </button>
        <?php
        if(!empty($suc)){
            echo "<span>$suc</span>";
        }else if(!empty($error)){
            echo "<span1>$error</span1>";
        }else{

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
            $query = 'select * from students';
            $select_all = mysqli_query($conn,$query);
            while($row=mysqli_fetch_assoc($select_all)){
                echo "
                <tr>
                    <td>$row[id]</td>
                    <td>$row[FirstName]</td>
                    <td>$row[LastName]</td>
                    <td>$row[email]</td>
                    <td>
                        <a class='action-button update-button' href='index.php?id=$row[id]'>update</a>
                    </td>
                    <td>
                        <a class='action-button' href='delete.php?id=$row[id]'>delete</a>
                    </td>
                 </tr>
                ";
            }
            ?>
        </tbody>
    </table>
</body>
</html>