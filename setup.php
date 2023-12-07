<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <<?php 
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        
        //Create connection
        $conn = new mysqli($dbhost, $dbuser, $dbpass);
        
        //Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        //Creating database
        // if ($conn->query("CREATE DATABASE nazarro")) {
        //     printf("Database nazarro created successfully.<br />");
        // }
        // if ($conn->errno) {
        //     printf("Could not create database: %s<br />", $conn->error);
        // }
        
        //Select Database
        $retval = mysqli_select_db( $conn, 'nazarro');
        if(! $retval ) {
            die('Could not select database: ' . mysqli_error($conn));
        }
        echo "Database nazarro selected successfully\n";

        // //Creating Users table
        // $sql = "CREATE TABLE Users (
        //     user_id INT AUTO_INCREMENT PRIMARY KEY,
        //     username VARCHAR(50) NOT NULL,
        //     password VARCHAR(255) NOT NULL,
        //     email VARCHAR(100) NOT NULL,
        //     role ENUM('admin', 'student', 'instructor') NOT NULL
        // )";

        // if ($conn->query($sql) === TRUE){
        //     echo "Table Users created successfully";
        // } else {
        //     echo "Error creating table: " . $conn->error;
        // }
        
        // //Creating Student table
        // $sql = "CREATE TABLE Student (
        //     student_id INT AUTO_INCREMENT PRIMARY KEY,
        //     user_id INT NOT NULL,
        //     full_name VARCHAR(100) NOT NULL,
        //     date_of_birth DATE NOT NULL,
        //     FOREIGN KEY (user_id) REFERENCES Users(user_id)
        // )";

        // if ($conn->query($sql) === TRUE) {
        //     echo "Table Student created successfully";
        // } else {
        //     echo "Error creating table: " . $conn->error;
        // }

        // //Creating Course table
        // $sql = "CREATE TABLE Course (
        //     course_id INT AUTO_INCREMENT PRIMARY KEY,
        //     course_name VARCHAR(100) NOT NULL
        // )";

        // if ($conn->query($sql) === TRUE) {
        //     echo "Table Course created successfully";
        // } else {
        //     echo "Error creating table: " . $conn->error;
        // }

        // //Creating Instructor table
        // $sql = "CREATE TABLE Instructor (
        //     instructor_id INT AUTO_INCREMENT PRIMARY KEY,
        //     user_id INT NOT NULL,
        //     full_name VARCHAR(100) NOT NULL,
        //     FOREIGN KEY (user_id) REFERENCES Users(user_id)
        // )";

        // if ($conn->query($sql) === TRUE) {
        //     echo "Table Instructor created successfully";
        // } else {
        //     echo "Error creating table: " . $conn->error;
        // }

        // //Creating Enrollment table
        // $sql = "CREATE TABLE Enrollment (
        //     enrollment_id INT AUTO_INCREMENT PRIMARY KEY,
        //     student_id INT NOT NULL,
        //     course_id INT NOT NULL,
        //     FOREIGN KEY (student_id) REFERENCES Student(student_id),
        //     FOREIGN KEY (course_id) REFERENCES Course(course_id)
        // )";

        // if ($conn->query($sql) === TRUE) {
        //     echo "Table Enrollment created successfully";
        // } else {
        //     echo "Error creating table: " . $conn->error;
        // }

        //Close connection
        $conn->close();
    ?>

    <div class="background"></div>
    <div class="container">
        <h2>Create User</h2>
        <form action="setup.php" method="POST">
            <div class="form-group">
                <label for="username">Name:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="student">Student</option>
                    <option value="instructor">Instructor</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

</body>
</html>