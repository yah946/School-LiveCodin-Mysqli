# CRUD Exercise with MySQLi (Procedural)

This exercise guides you through building a complete **CRUD system**  
(Create, Read, Update, Delete) using:

- PHP  
- MySQL  
- MySQLi (procedural style)

---

## 1. Database Setup

1. Create a database named **school**.
2. Create a table **students** with the following columns:

   | Column | Type | Attributes |
   |--------|------|------------|
   | id     | INT  | PRIMARY KEY, AUTO_INCREMENT |
   | name   | VARCHAR(50) |  |
   | email  | VARCHAR(100) |  |

---

## 2. Connection File

Create a file **config.php** that:

- connects to the MySQL database using `mysqli_connect()`
- checks if the connection was successful
- displays an error message if the connection fails

---

## 3. CREATE — Add a Student

1. Create an HTML form to add a student (fields: **name**, **email**).
2. When the form is submitted:
   - Retrieve the submitted data
   - Insert it into the database using `INSERT INTO`
   - Display a success or error message

---

## 4. READ — List All Students

1. Create a file **index.php** that:
   - retrieves all students using `SELECT * FROM students`
   - displays the result in an HTML table

2. For each student, include:
   - an **Edit** button (links to update.php?id=...)
   - a **Delete** button (links to delete.php?id=...)

---

## 5. UPDATE — Edit a Student

1. Create **update.php**.
2. Load existing student data using the ID from the URL.
3. Display a form pre-filled with the student's current data.
4. When the form is submitted:
   - update the student using `UPDATE students SET ... WHERE id = ?`
   - redirect back to **index.php**

---

## 6. DELETE — Remove a Student

1. Create **delete.php**.
2. Delete the student using the ID from the URL (`DELETE FROM students WHERE id = ?`).
3. Redirect back to **index.php** after deleting.

---

## 7. Error Handling

For every database operation:

- Check if the query was successful.
- If not, show an error using `mysqli_error()`.
- Avoid exposing database details to end users in production.

---

## Goal

By completing this exercise, you will understand how to:

- Connect to MySQL using MySQLi  
- Insert records  
- Retrieve and display data  
- Update existing records  
- Delete records  
- Manage errors safely  
