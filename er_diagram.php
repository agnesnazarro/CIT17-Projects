<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity - 11/21/2023</title>
</head>
<body>
    <?php
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';

        $mysqli = new mysqli($dbhost, $dbuser, $dbpass);
        
        //Connection
        if($mysqli->connect_errno ) {
            die("Connection failed: " . $mysqli->connect_error);
        }
        echo "Connected successfully <br />";

        //Creating Database
        // if ($mysqli->query("CREATE DATABASE student_record")) {
        //     printf("Database student_record created successfully.<br />");
        // }
        // if ($mysqli->errno) {
        //     printf("Could not create database: %s<br />", $mysqli->error);
        // }

        //Select Database
        // $retval = mysqli_select_db( $mysqli, 'student_record');
        // if(! $retval ) {
        //     die('Could not select database: ' . mysqli_error($mysqli));
        // }
        // echo "Database student_record selected successfully\n";

        //Creating Table
        $sql = "CREATE TABLE student( ".
            "StudentID INT NOT NULL, ".
            "FirstName VARCHAR(255) NOT NULL, ".
            "LastName VARCHAR(255) NOT NULL, ".
            "DateOfBirth DATE, ".
            "Email VARCHAR(100), ".
            "Phone VARCHAR(50), ".
            "PRIMARY KEY ( StudentID )); ";
        if ($mysqli->query($sql)) {
        printf("Table student created successfully.<br />");
        }
        if ($mysqli->errno) {
        printf("Could not create table: %s<br />", $mysqli->error);
        }
    ?>
</body>
</html>