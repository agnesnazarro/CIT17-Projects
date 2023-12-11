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
    function createDB($conn) {
        $sqlDB = "CREATE DATABASE nazarro_fp";
        if ($conn->query($sqlDB)) {
            printf("Database nazarro created successfully.<br />");
        }
        if ($conn->errno) {
            printf("Could not create database: ", $conn->error);
        }
    }
    
    //Select Database
    $retval = mysqli_select_db( $conn, 'nazarro_fp');
    if(! $retval ) {
        die("Could not select database: " . mysqli_error($conn));
    }
    echo "Database nazarro_fp selected successfully\n";

    //Creating tables
    function createTables($conn) {
        //Creating Users table
        $sqlUser = "CREATE TABLE Users (
            user_id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(100) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if ($conn->query($sqlUser) === TRUE){
            echo "Table Users created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
        
        //Creating Student table
        $sqlStudent = "CREATE TABLE Student (
            student_id INT AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(100) NOT NULL,
            last_name VARCHAR(100) NOT NULL,
            date_of_birth DATE NOT NULL,
            email VARCHAR(100) NOT NULL,
            phone_num VARCHAR(20) NOT NULL,
            user_id INT,
            FOREIGN KEY (user_id) REFERENCES Users(user_id)
        )";

        if ($conn->query($sqlStudent) === TRUE) {
            echo "Table Student created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }

        //Creating Instructor table
        $sqlInstructor = "CREATE TABLE Instructor (
            instructor_id INT AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(100) NOT NULL,
            last_name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            phone_num VARCHAR(20) NOT NULL,
            user_id INT,
            FOREIGN KEY (user_id) REFERENCES Users(user_id)
        )";

        if ($conn->query($sqlInstructor) === TRUE) {
            echo "Table Instructor created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }

        //Creating Course table
        $sqlCourse = "CREATE TABLE Course (
            course_id INT AUTO_INCREMENT PRIMARY KEY,
            course_name VARCHAR(100) NOT NULL,
            course_units INT(1) NOT NULL,
            instructor_id INT,
            FOREIGN KEY (instructor_id) REFERENCES Instructor(instructor_id)
        )";

        if ($conn->query($sqlCourse) === TRUE) {
            echo "Table Course created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }

        //Creating Enrollment table
        $sqlEnrollment = "CREATE TABLE Enrollment (
            enrollment_id INT AUTO_INCREMENT PRIMARY KEY,
            enrollment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            student_id INT,
            course_id INT,
            FOREIGN KEY (student_id) REFERENCES Student(student_id),
            CONSTRAINT fk_course FOREIGN KEY (course_id) REFERENCES Course(course_id) ON DELETE NO ACTION
        )ENGINE=InnoDB";

        if ($conn->query($sqlEnrollment) === TRUE) {
            echo "Table Enrollment created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }

    }
    
    // Checking database
    if (createDB($conn)) {
        echo "Database created successfully<br>";
        
        //Select the created database
        $conn->select_db("nazarro_fp");

        //Check for table creation
        if (createTables($conn)) {
            echo "All tables created successfully";
        } else {
            echo "Tables creation failed";
        }
    } else {
        echo "Database creation failed";
    }

    //Close connection
    $conn->close();
?>