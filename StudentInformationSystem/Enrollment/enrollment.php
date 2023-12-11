<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "nazarro_fp");

    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    //Insert new enrollment record
    if (isset($_POST['save_enrollment'])) {
        $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
        $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);

        $check_duplicate_query = "SELECT * FROM Enrollment WHERE student_id='$student_id' AND course_id='$course_id'";
        $check_duplicate_result = mysqli_query($conn, $check_duplicate_query);

        if (mysqli_num_rows($check_duplicate_result) > 0) {
            $_SESSION['status'] = 'Enrollment with the same Student ID and Course ID already exists.';
            header('location: index.php');
        } else {
            $enrollment_date = mysqli_real_escape_string($conn, $_POST['enrollment_date']);

            $insert_enrollment_query = "INSERT INTO Enrollment(student_id, course_id, enrollment_date) 
                                        VALUES ('$student_id', '$course_id', '$enrollment_date')";
            $insert_enrollment_query_run = mysqli_query($conn, $insert_enrollment_query);

            handleQueryResult($conn, $insert_enrollment_query_run, 'Enrollment Added Successfully');
            header('location: index.php');
        }

    //Update existing enrollment record
    } elseif (isset($_POST['update_enrollment'])) {
        $update_enrollment_id = mysqli_real_escape_string($conn, $_POST['update_enrollment_id']);
        $update_student_id = mysqli_real_escape_string($conn, $_POST['update_student_id']);
        $update_course_id = mysqli_real_escape_string($conn, $_POST['update_course_id']);

        $check_duplicate_query = "SELECT * FROM Enrollment WHERE student_id='$update_student_id' AND course_id='$update_course_id' AND enrollment_id <> '$update_enrollment_id'";
        $check_duplicate_result = mysqli_query($conn, $check_duplicate_query);

        if (mysqli_num_rows($check_duplicate_result) > 0) {
            $_SESSION['status'] = 'Enrollment with the same Student ID and Course ID already exists.';
            header('location: index.php');
        } else {
            $update_enrollment_date = mysqli_real_escape_string($conn, $_POST['update_enrollment_date']);

            $update_enrollment_query = "UPDATE Enrollment 
                                        SET enrollment_date='$update_enrollment_date' 
                                        WHERE enrollment_id='$update_enrollment_id'";
            $update_enrollment_query_run = mysqli_query($conn, $update_enrollment_query);

            handleQueryResult($conn, $update_enrollment_query_run, 'Enrollment Updated Successfully');
            header('location: index.php');
        }

    //Delete enrollment record
    } elseif (isset($_GET['delete_enrollment'])) {
        $delete_enrollment_id = mysqli_real_escape_string($conn, $_GET['delete_enrollment']);

        $delete_enrollment_query = "DELETE FROM Enrollment WHERE enrollment_id=?";
        $stmt = mysqli_prepare($conn, $delete_enrollment_query);
        mysqli_stmt_bind_param($stmt, "i", $delete_enrollment_id);
        mysqli_stmt_execute($stmt);

        handleQueryResult($conn, $stmt, 'Enrollment Deleted Successfully');
    }

    mysqli_close($conn);

    function handleQueryResult($conn, $result, $successMessage)
    {
        if ($result) {
            $_SESSION['status'] = $successMessage;
        } else {
            $_SESSION['status'] = 'Operation Failed: ' . mysqli_error($conn);
        }
        header('location: index.php');
    }
?>