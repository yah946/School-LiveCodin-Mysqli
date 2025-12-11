<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>
    <h1>Title</h1>
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
        
        <input type="submit" value="Add Student"/>

        <a href="insert.php">Add Student</a>
        <a href="delete.php">Delete Student</a>
        <a href="select.php">Student's List</a>
        <a href="update.php">Update an Information</a>
    </form>
</body>
</html>