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
    <form
    class="form"
    action=""
    method=""
    >
        <input id="id" type="hidden">
        <label for="firstName">First Name:</label>
        <input id="firstName" type="text">
        <label for="lastName">Last Name:</label>
        <input id="lastName" type="text">
        <label for="email">Email:</label>
        <input id="email" type="email">

        <button class="btn" type="submit">Add a Student</button>

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
            <tr>
                <td>1</td>
                <td>exemple</td>
                <td>exemple</td>
                <td>exemple@gamil.com</td>
                <td>
                    <a class='action-button update-button' >update</a>
                </td>
                <td>
                    <a class='action-button' >delete</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>exemple</td>
                <td>exemple</td>
                <td>exemple@gamil.com</td>
                <td>
                    <a class='action-button update-button' >update</a>
                </td>
                <td>
                    <a class='action-button' >delete</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>exemple</td>
                <td>exemple</td>
                <td>exemple@gamil.com</td>
                <td>
                    <a class='action-button update-button' >update</a>
                </td>
                <td>
                    <a class='action-button' >delete</a>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>exemple</td>
                <td>exemple</td>
                <td>exemple@gamil.com</td>
                <td>
                    <a class='action-button update-button' >update</a>
                </td>
                <td>
                    <a class='action-button' >delete</a>
                </td>
            </tr>
        <tbody>
    </table>
</body>
</html>