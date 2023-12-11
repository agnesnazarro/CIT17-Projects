<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "nazarro_fp");

    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }


    //Insert new course
    if (isset($_POST['add_course'])) {
        $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
        $course_name = mysqli_real_escape_string($conn, $_POST['course_name']);
        $instructor_id = mysqli_real_escape_string($conn, $_POST['instructor_id']);
        $course_units = mysqli_real_escape_string($conn, $_POST['course_units']);

        $insert_course_query = "INSERT INTO Course(course_id, course_name, instructor_id, course_units) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert_course_query);
        mysqli_stmt_bind_param($stmt, "issi", $course_id, $course_name, $instructor_id, $course_units);
        $insert_course_query_run = mysqli_stmt_execute($stmt);

        handleQueryResult($conn, $insert_course_query_run, 'Course Added Successfully');

    //Update existing course
    } elseif (isset($_POST['update_course'])) {
        $update_course_id = mysqli_real_escape_string($conn, $_POST['update_course_id']);
        $update_course_name = mysqli_real_escape_string($conn, $_POST['update_course_name']);
        $update_instructor_id = mysqli_real_escape_string($conn, $_POST['update_instructor_id']);
        $update_course_units = mysqli_real_escape_string($conn, $_POST['update_course_units']);

        $update_course_query = "UPDATE Course SET course_name=?, course_units=?, instructor_id=? WHERE course_id=?";
        $stmt = mysqli_prepare($conn, $update_course_query);
        mysqli_stmt_bind_param($stmt, "ssii", $update_course_name, $update_course_units, $update_instructor_id, $update_course_id);
        $update_course_query_run = mysqli_stmt_execute($stmt);

        handleQueryResult($conn, $update_course_query_run, 'Course Updated Successfully');
    
    //Delete course
    } elseif (isset($_GET['delete_course'])) {
        $delete_course_id = mysqli_real_escape_string($conn, $_GET['delete_course']);

        $delete_course_query = "DELETE FROM Course WHERE course_id=?";
        $stmt = mysqli_prepare($conn, $delete_course_query);
        mysqli_stmt_bind_param($stmt, "i", $delete_course_id);
        $delete_course_query_run = mysqli_stmt_execute($stmt);

        handleQueryResult($conn, $delete_course_query_run, 'Course Deleted Successfully');
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