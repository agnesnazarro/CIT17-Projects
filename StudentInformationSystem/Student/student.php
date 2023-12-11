<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "nazarro_fp");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //Insert new student record
    if (isset($_POST['save_student'])) {
        $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone_num = mysqli_real_escape_string($conn, $_POST['phone_num']);

        $insert_query = "INSERT INTO Student(student_id, first_name, last_name, date_of_birth, email, phone_num) 
                        VALUES ('$student_id','$first_name', '$last_name', '$date_of_birth', '$email', '$phone_num')";
        $insert_query_run = mysqli_query($conn, $insert_query);

        if ($insert_query_run) {
            $_SESSION['status'] = 'Student Added Successfully';
            header('location: index.php');
        } else {
            $_SESSION['status'] = 'Failed to Add Student: ' . mysqli_error($conn);
            header('location: index.php');
        }
        
    //Update existing student record
    } elseif (isset($_POST['update_student'])) {
        $update_student_id = mysqli_real_escape_string($conn, $_POST['update_student_id']);

        $update_first_name = mysqli_real_escape_string($conn, $_POST['update_first_name']);
        $update_last_name = mysqli_real_escape_string($conn, $_POST['update_last_name']);
        $update_date_of_birth = mysqli_real_escape_string($conn, $_POST['update_date_of_birth']);
        $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
        $update_phone = mysqli_real_escape_string($conn, $_POST['update_phone']);

        $update_query = "UPDATE Student 
                        SET first_name='$update_first_name', last_name='$update_last_name', 
                        date_of_birth='$update_date_of_birth', email='$update_email', phone_num='$update_phone' 
                        WHERE student_id='$update_student_id'";
        $update_query_run = mysqli_query($conn, $update_query);

        if ($update_query_run) {
            $_SESSION['status'] = 'Student Updated Successfully';
            header('location: index.php');
        } else {
            $_SESSION['status'] = 'Failed to Update Student: ' . mysqli_error($conn);
            header('location: index.php');
        }

    //Delete student record
    } elseif (isset($_GET['delete_student'])) {
        $delete_student_id = mysqli_real_escape_string($conn, $_GET['delete_student']);

        $delete_query = "DELETE FROM Student WHERE student_id='$delete_student_id'";
        $delete_query_run = mysqli_query($conn, $delete_query);

        if ($delete_query_run) {
            $_SESSION['status'] = 'Student Deleted Successfully';
            header('location: index.php');
        } else {
            $_SESSION['status'] = 'Failed to Delete Student: ' . mysqli_error($conn);
            header('location: index.php');
        }
    }

    mysqli_close($conn);
?>