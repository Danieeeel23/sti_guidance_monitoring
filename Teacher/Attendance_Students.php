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

    <script src="js/dropdown.js" defer></script>
    <link rel="stylesheet" href="ListStyle.css" type="text/css">
    <title>Attendance - Students</title>
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li><a href=""><span class="icon1"><img src="" alt=""></span></a></li>
                <li>
                    <a href="dash.php">
                        <span class="icon"><img src="Images/sidebar_menu/Mask group.svg" alt=""></span>
                        <span class="title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="Attendance_Classes.php">
                        <span class="icon"><img src="Images/sidebar_menu/Edit Calendar.svg" alt=""></span>
                        <span class="title">Attendance</span>
                    </a>
                </li>
                <li>
                    <a href="Grades_Classes.php">
                        <span class="icon"><img src="Images/sidebar_menu/Terms and Conditions.svg" alt=""></span>
                        <span class="title">Grades</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Excuse_Letter.php">
                        <span class="icon"><img src="Images/sidebar_menu/Vector.svg" alt=""></span>
                        <span class="title">View of <br> Excuse Slip</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Announcement.php">
                    <span class="icon"><img src="images/sidebar_menu/Mask group (9).svg" alt="">
                    <span class="title5" ><br>Announcement</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">
            <span id="logo"><img src="images/sti_logo.png" alt=""></span>
            <div class="topbar">
                <div class="toptitle">
                    <h2>Attendance</h2>
                </div>
                <div class="rightbar">
                    <div class="icons">
                        <i class="fa fa-bell"></i>
                        <i class="fa fa-search"></i>
                    </div>
                    <div class="dropdown">
                        <button class="icons1" onclick="myFunction()">
                            <h3 class="dropbtn"> <?php echo $currentteachername ?> <i class="fa fa-angle-down"></i></h3>

                        </button>
                        <div class="dropdown-content" id="myDropdown">
                            <a href="../logins/logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="main1">
            <div class="title2">
                <h1 id="check"><?php echo "(", $currentsubject, ") ", $currentstrand, "-", $currentsection ?></h1>
                <div class="bot">
                    <select id="SelectDate" class="SelectDate" name="SelectDate[]" style="width: 200px;">
                        <option value="<?= date("Y-m-d") ?>"><?= date("l") . ' ' . date("Y-m-d") ?></option>
                        <?php
                        $query = "SELECT DISTINCT Date FROM `attendance` ORDER BY Date DESC";
                        $query_run = mysqli_query($link, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $dates) {
                        ?>
                                <option value="<?= $dates['Date'] ?>"><?= date("l", strtotime($dates['Date'])) . ' ' . $dates['Date'] ?></option>
                        <?php
                            }
                        } else {
                        }
                        ?>

                    </select>

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
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `student` WHERE Strand='$currentstrand' AND Section='$currentsection'";
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
                                <td>
                                    <select id="Status" class="Status" name="Status[]">
                                        <option value="Absent">Absent</option>
                                        <option value="Present">Present</option>
                                    </select>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                    }
                    ?>

                </tbody>
            </table>
            <table id="myDataTable1" class="hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `attendance` ";
                    $query_run = mysqli_query($link, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $student) {
                    ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="emp_checkbox" data-emp-id="<?= $student['Student_ID']; ?>">
                                </td>
                                <td><?= $student['Student_First_Name']; ?></td>
                                <td><?= $student['Student_Last_Name']; ?></td>
                                <td><?= $student['Date']; ?></td>
                                <td>
                                    <select id="Status" class="Status" name="Status[]">
                                        <option value="Absent" <?= $student['Status'] == 'Absent' ? ' selected="selected"' : ''; ?>>Absent</option>
                                        <option value="Present" <?= $student['Status'] == 'Present' ? ' selected="selected"' : ''; ?>>Present</option>
                                    </select>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                    }
                    ?>

                </tbody>
            </table>
            <div class="main2">
                <div class="bot">
                    <span class="create">
                        <i class="fa fa-plus"></i>

                        <input type="hidden" name="classid" value="<?= $currentclassid; ?>">
                        <input type="hidden" name="subjectid" value="<?= $currentsubjectid; ?>">
                        <input type="hidden" id="selecteddate" name="selecteddate" value=" ">
                        <input type="hidden" name="studentid" value="<?php
                                                                        foreach ($students as $student) {
                                                                            echo $student['Student_ID'], ":";
                                                                        }
                                                                        ?>">
                        <input type="hidden" name="firstname" value="<?php
                                                                        foreach ($students as $student) {
                                                                            echo $student['First_Name'], ":";
                                                                        }
                                                                        ?>">
                        <input type="hidden" name="lastname" value="<?php
                                                                    foreach ($students as $student) {
                                                                        echo $student['Last_Name'], ":";
                                                                    }
                                                                    ?>">
                        <input type="submit" class="btn btn-primary btn-lg" id="insertattendance" name="save_attendance" value="CREATE">
                        <input type="submit" class="btn btn-primary btn-lg" id="updateattendance" name="update_attendance" value="UPDATE">
                    </span>
                    <!-- <form action="code.php" method="POST"> -->
                </div>
            </div>
        </form>
    </div>

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script>
        var fullDate = new Date();
        // var twoDigitMonth = ((fullDate.getMonth().length + 1) === 1) ? (fullDate.getMonth() + 1) : '0' + (fullDate.getMonth() + 1);
        var month = fullDate.getMonth() + 1;
        var day = fullDate.getDate() < 10 ? "0" + fullDate.getDate() : fullDate.getDate();
        var currentDate = fullDate.getFullYear() + "-" + month + "-" + day;
        console.log(currentDate);
        $(document).ready(function() {
            $('#myDataTable').DataTable({
                pageLength: 5,
                lengthMenu: [
                    [5, 10, 15, 20],
                    [5, 10, 15, 20]
                ]
            });
            $('#myDataTable1').DataTable({
                pageLength: 5,
                lengthMenu: [
                    [5, 10, 15, 20],
                    [5, 10, 15, 20]
                ],
                // columnDefs: [{
                //     target: 3,
                //     visible: false,
                // }]
            });
            var table1 = $('#myDataTable1').DataTable();
            $('#myDataTable1_wrapper').hide();
            $('#myDataTable1_filter').hide();
            $('#SelectDate').on('change', function() {
                if ($('#SelectDate').val() == currentDate) {
                    $('#myDataTable1_wrapper').hide();
                    $('#myDataTable_wrapper').show();
                    $('#check').text("CURRENT!");
                    $('#selecteddate').val("");
                    $('#insertattendance').show();
                    $('#updateattendance').hide();
                } else {
                    $('#myDataTable1_wrapper').show();
                    $('#myDataTable_wrapper').hide();
                    table1.search($('#SelectDate').val()).draw();

                    $('#check').text("NO.");
                    $('#selecteddate').val($('#SelectDate').val());
                    $('#insertattendance').hide();
                    $('#updateattendance').show();
                }

            });
        });
    </script>


</body>

</html>