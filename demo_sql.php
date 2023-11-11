<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Demo</title>
</head>
<body>
    <?php
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';

        $mysqli = new mysqli($dbhost, $dbuser, $dbpass);
        
        //Connecting to Database
        if($mysqli->connect_errno ) {
            printf("Connect failed: %s<br />", $mysqli->connect_error);
            exit();
         }
         printf('Connected successfully.<br />');

        //Creating Database
        // if ($mysqli->query("CREATE DATABASE STUDENTS")) {
        //     printf("Database STU DENTS created successfully.<br />");
        //  }
        //  if ($mysqli->errno) {
        //     printf("Could not create database: %s<br />", $mysqli->error);
        //  }

        //Drop a Database
        // if ($mysqli->query("Drop DATABASE STUDENTS")) {
        //     printf("Database STUDENTS dropped successfully.<br />");
        //  }
        //  if ($mysqli->errno) {
        //     printf("Could not drop database: %s<br />", $mysqli->error);
        //  }

        //Select Database
        $retval = mysqli_select_db( $mysqli, 'demo' );
        if(! $retval ) {
            die('Could not select database: ' . mysqli_error($mysqli));
        }
        echo "Database demo selected successfully\n";

        //Creating Table
        // $sql = "CREATE TABLE tutorials_tbl( ".
        //     "tutorial_id INT NOT NULL AUTO_INCREMENT, ".
        //     "tutorial_title VARCHAR(100) NOT NULL, ".
        //     "tutorial_author VARCHAR(40) NOT NULL, ".
        //     "submission_date DATE, ".
        //     "PRIMARY KEY ( tutorial_id )); ";
        // if ($mysqli->query($sql)) {
        // printf("Table tutorials_tbl created successfully.<br />");
        // }
        // if ($mysqli->errno) {
        // printf("Could not create table: %s<br />", $mysqli->error);
        // }

        //Drop MySQL Table
        // if ($mysqli->query("Drop Table tutorials_tbl")) {
        //     printf("Table tutorials_tbl dropped successfully.<br />");
        // }
        // if ($mysqli->errno) {
        // printf("Could not drop table: %s<br />", $mysqli->error);
        // }

        //Insert Query
        

        $mysqli->close();
    ?>
</body>
</html>