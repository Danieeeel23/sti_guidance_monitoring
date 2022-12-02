<?php

require 'config.php';
session_start();

if (isset($_SESSION['teacher_id'])) {
    $currentteacherid = $_SESSION['teacher_id'];
    $query = "SELECT *, CONCAT(First_Name,' ',Middle_Initial,' ',Last_Name) AS Name FROM `teacher` WHERE `Teacher_ID`= $currentteacherid ";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $currentteachername = $row['Name'];
    }
} else {
    echo "No Session ID";
}

if (isset($_GET['class'])) {
    $currentclassid = $_GET['class'];
    $query = "SELECT * FROM `class` WHERE `Class_ID`= $currentclassid ";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $currentsubjectid = $row['Subject_ID'];
        $currentstrand = $row['Strand'];
        $currentsection = $row['Section'];
    }
} else {
    echo "No Class ID";
}

if (isset($currentsubjectid)) {

    // $currentsubject = mysqli_real_escape_string($link, $_GET['subject']);
    $query = "SELECT * FROM `subject` WHERE `Subject_ID`= $currentsubjectid ";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $currentsubject = $row['Subject_Name'];
    }
} else {
    echo "No Subject ID";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--font-->

    <link href="css/jquery.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="delete_script.js"></script>
    <link rel="stylesheet" href="ListStyle.css" type="text/css">
    <title>List of Students</title>
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="">
                        <span class="icon1"><img src="" alt=""></span>

                    </a>
                </li>
                <li>
                    <a href="dash.php">
                        <span class="icon"><img src="Images/sidebar_menu/Mask group.svg" alt=""></span>
                        <span class="title1"><br>Home</span>
                    </a>
                </li>
                <li><a href="Lists_of_Subjects.php">

                        <span class="icon"><img src="Images/sidebar_menu/Edit Calendar.svg" alt=""></span>
                        <span class="title"><br>Attendance</span>

                    </a>

                </li>
                <li>
                    <a href="Lists_of_Failing_Grades.php">
                        <span class="icon"><img src="Images/sidebar_menu/Terms and Conditions.svg" alt=""></span>
                        <span class="title"><br>Record Failing Grades</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Excuse_Letter.php">
                        <span class="icon"><img src="Images/sidebar_menu/Vector.svg" alt=""></span>
                        <span class="title"><br>View of Excuse Slip</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="main">
            <span id="logo"><img src="images/sti_logo.png" alt=""></span>
            <div class="topbar">
                <div class="toptitle">
                    <h2>Students</h2>
                </div>
                <div class="rightbar">
                    <div class="icons">
                        <i class="fa fa-bell"></i>
                        <i class="fa fa-search"></i>
                    </div>
                    <div class="dropdown">
                        <div class="icons1">
                            <h3 class="dropbtn"> <?php echo $currentteachername ?> </h3>
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="dropdown-content">
                            <a href="../logins/logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="main1">
            <div class="title2">
                <h1><?php echo "(", $currentsubject, ") ", $currentstrand, "-", $currentsection ?></h1>
                <div class="bot">
                    <span class="create">
                        <i class="fa fa-plus"></i>
                        <input type="submit" class="btn btn-primary btn-lg" name="save_attendance" value="Create">
                    </span>
                    <span class="delete">
                        <i class="fa fa-trash"></i>
                        <input type="submit" class="btn btn-primary btn-lg" name="save_attendance" value="Delete">
                    </span>
                    <!-- <form action="code.php" method="POST"> -->
                </div>
            </div>


        </div>
    </div>
    <div class="card-header">
        <form action="code.php" method="POST">
            <table id="myDataTable" class="hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Grades</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `failing_grades`";
                    $query_run = mysqli_query($link, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        $students = $query_run;
                        foreach ($query_run as $student) {
                    ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="emp_checkbox" data-emp-id="<?= $student['Student_ID']; ?>">
                                </td>
                                <td><?= $student['First_Name']; ?></td>
                                <td><?= $student['Last_Name']; ?></td>
                                <td><?= $student['Grades']; ?></td>
                            </tr>
                    <?php
                        }
                    } else {
                    }
                    ?>

                </tbody>
            </table>

        </form>
    </div>

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#myDataTable').DataTable({
                pageLength: 5,
                lengthMenu: [
                    [5, 10, 15, 20],
                    [5, 10, 15, 20]
                ]
            });
        });
    </script>


</body>

</html>