<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "nazarro_fp");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //Insert new instructor record
    if (isset($_POST['save_instructor'])) {
        $instructor_id = mysqli_real_escape_string($conn, $_POST['instructor_id']);
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone_num = mysqli_real_escape_string($conn, $_POST['phone_num']);

        $insert_query = "INSERT INTO Instructor(instructor_id, first_name, last_name, email, phone_num) 
                        VALUES ('$instructor_id','$first_name', '$last_name', '$email', '$phone_num')";
        $insert_query_run = mysqli_query($conn, $insert_query);

        if ($insert_query_run) {
            $_SESSION['status'] = 'Instructor Added Successfully';
            header('location: index.php');
        } else {
            $_SESSION['status'] = 'Failed to Add Instructor: ' . mysqli_error($conn);
            header('location: index.php');
        }

    //Update existing instructor record
    } elseif (isset($_POST['update_instructor'])) {
        $update_instructor_id = mysqli_real_escape_string($conn, $_POST['update_instructor_id']);
        $update_first_name = mysqli_real_escape_string($conn, $_POST['update_first_name']);
        $update_last_name = mysqli_real_escape_string($conn, $_POST['update_last_name']);
        $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
        $update_phone = mysqli_real_escape_string($conn, $_POST['update_phone']);

        $update_query = "UPDATE Instructor 
                        SET first_name='$update_first_name', last_name='$update_last_name', email='$update_email', phone_num='$update_phone' 
                        WHERE instructor_id='$update_instructor_id'";
        $update_query_run = mysqli_query($conn, $update_query);

        if ($update_query_run) {
            $_SESSION['status'] = 'Instructor Updated Successfully';
            header('location: index.php');
        } else {
            $_SESSION['status'] = 'Failed to Update Instructor: ' . mysqli_error($conn);
            header('location: index.php');
        }

    //Delete instructor record
    } elseif (isset($_GET['delete_instructor'])) {
        $delete_instructor_id = mysqli_real_escape_string($conn, $_GET['delete_instructor']);

        $delete_query = "DELETE FROM Instructor WHERE instructor_id='$delete_instructor_id'";
        $delete_query_run = mysqli_query($conn, $delete_query);

        if ($delete_query_run) {
            $_SESSION['status'] = 'Instructor Deleted Successfully';
            header('location: index.php');
        } else {
            $_SESSION['status'] = 'Failed to Delete Instructor: ' . mysqli_error($conn);
            header('location: index.php');
        }
    }

    mysqli_close($conn);
?>