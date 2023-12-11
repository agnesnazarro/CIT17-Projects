<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .alert-warning {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        body {
            background-image: url('/CIT17 Projects/StudentInformationSystem/img/uc.png');
            background-size: cover;
            background-color: rgba(30, 70, 32, 0.4);
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css"/>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand order-2 ml-auto" href="#">Student Information System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/CIT17%20Projects/StudentInformationSystem/Student/index.php">Student
                        Record</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/CIT17%20Projects/StudentInformationSystem//Course/index.php">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="/CIT17%20Projects/StudentInformationSystem/Instructor/index.php">Instructors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="/CIT17%20Projects/StudentInformationSystem/Enrollment/index.php">Enrollment</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="student.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="student_id">Student ID</label>
                            <input type="text" class="form-control" name="student_id" placeholder="Enter student ID"
                                autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="Enter first name"
                                autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Enter last name"
                                autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email"
                                autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" name="phone_num" placeholder="Enter phone number"
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="save_student" class="btn btn-primary">Save Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php
                if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Result: </strong>
                        <?php echo $_SESSION['status']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center font-weight-bold">Student Record</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Student ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Date of Birth</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $conn = mysqli_connect("localhost", "root", "", "nazarro_fp");

                                $fetch_query = "SELECT * FROM Student";
                                $fetch_query_run = mysqli_query($conn, $fetch_query);

                                if (mysqli_num_rows($fetch_query_run) > 0) {
                                    while ($row = mysqli_fetch_array($fetch_query_run)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['student_id']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['first_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['last_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['date_of_birth']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['email']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['phone_num']; ?>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-success btn-sm btn-update"
                                                    data-student-id="<?php echo $row['student_id']; ?>"
                                                    data-first-name="<?php echo $row['first_name']; ?>"
                                                    data-last-name="<?php echo $row['last_name']; ?>"
                                                    data-date-of-birth="<?php echo $row['date_of_birth']; ?>"
                                                    data-email="<?php echo $row['email']; ?>"
                                                    data-phone="<?php echo $row['phone_num']; ?>">
                                                    Update
                                                </button>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                    data-student-id="<?php echo $row['student_id']; ?>" data-toggle="modal"
                                                    data-target="#deleteConfirmationModal">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="8">No Record Available</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="col-md-14 d-flex justify-content-center align-items-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                Add Student
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Student Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="student.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="update_student_id">Student ID</label>
                            <input type="text" class="form-control" name="update_student_id" id="update_student_id"
                                placeholder="Enter student ID" readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label for="update_first_name">First Name</label>
                            <input type="text" class="form-control" name="update_first_name" id="update_first_name"
                                placeholder="Enter first name">
                        </div>

                        <div class="form-group mb-3">
                            <label for="update_last_name">Last Name</label>
                            <input type="text" class="form-control" name="update_last_name" id="update_last_name"
                                placeholder="Enter last name">
                        </div>

                        <div class="form-group mb-3">
                            <label for="update_date_of_birth">Date of Birth</label>
                            <input type="date" class="form-control" name="update_date_of_birth"
                                id="update_date_of_birth">
                        </div>

                        <div class="form-group mb-3">
                            <label for="update_email">Email Address</label>
                            <input type="email" class="form-control" name="update_email" id="update_email"
                                placeholder="Enter email">
                        </div>

                        <div class="form-group mb-3">
                            <label for="update_phone">Phone Number</label>
                            <input type="text" class="form-control" name="update_phone" id="update_phone"
                                placeholder="Enter phone number">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update_student" class="btn btn-primary">Update Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.nav-link').click(function () {
                var target = $(this).attr('href');
                $('html, body').animate({
                    scrollTop: $(target).offset().top
                }, 800);
            });

            $('.btn-update').click(function () {
                var student_id = $(this).data('student-id');
                var first_name = $(this).data('first-name');
                var last_name = $(this).data('last-name');
                var date_of_birth = $(this).data('date-of-birth');
                var email = $(this).data('email');
                var phone = $(this).data('phone');

                $('#update_student_id').val(student_id);
                $('#update_first_name').val(first_name);
                $('#update_last_name').val(last_name);
                $('#update_date_of_birth').val(date_of_birth);
                $('#update_email').val(email);
                $('#update_phone').val(phone);

                $('#updateModal').modal('show');
            });

            $('.btn-delete').click(function () {
                var student_id = $(this).data('student-id');
                $('#confirmDelete').data('student-id', student_id);
            });

            $('#confirmDelete').click(function () {
                var student_id = $(this).data('student-id');
                window.location.href = 'student.php?delete_student=' + student_id;
            });
        });
    </script>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>

</html>