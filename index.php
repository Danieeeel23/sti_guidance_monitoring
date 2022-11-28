<?php
session_start();
header('location:logins/login_form.php');
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <title>Student CRUD</title>
</head>

<body>

    <div class="container mt-4">

        <?php include('message.php'); ?>

        <?php
        if (isset($_SESSION['status'])) {
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            unset($_SESSION['status']);
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <form action="code.php" method="POST">
                            <h4>List of Students
                                <a href="create.php" class="btn btn-primary float-end">Add Student</a>
                                <button type="submit" onclick="return confirm('Are You Sure You Want To Delete?');" name="stud_delete_multiple_btn" class="btn btn-danger" style="margin-left:892px;">Delete</button>
                            </h4>
                            <div class="card-body">
                                <table id="datatableid" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Student ID</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $query = "SELECT * FROM student";
                                        $query_run = mysqli_query($link, $query);

                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $student) {
                                        ?>
                                                <tr>
                                                    <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" name="stud_delete_id[]" value="<?= $student['Student_ID']; ?>">
                                                    </td>
                                                    <td><?= $student['Student_ID']; ?></td>
                                                    <td><?= $student['First_Name']; ?></td>
                                                    <td><?= $student['Middle_Initial']; ?></td>
                                                    <td><?= $student['Last_Name']; ?></td>
                                                    <td>
                                                        <a href="read.php?id=<?= $student['Student_ID']; ?>" class="btn btn-info btn-sm">View</a>
                                                        <a href="update.php?id=<?= $student['Student_ID']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "<h5 style='color:red;'> No Record Found! </h5>";
                                        }
                                        ?>

                                    </tbody>
                                </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatableid').DataTable();
        });
    </script>
</body>

</html>