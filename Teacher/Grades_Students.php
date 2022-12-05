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
    <title>Grades - Students</title>
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
            </ul>
        </div>
        <div class="main">
            <span id="logo"><img src="images/sti_logo.png" alt=""></span>
            <div class="topbar">
                <div class="toptitle">
                    <h2>Grades</h2>
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
                    <h3>Quarter: </h3>
                    <select id="Quarter" class="Quarter" name="Quarter[]">
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
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
                        <th>Quarter</th>
                        <th>Grades</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `student` WHERE Strand='$currentstrand' AND Section='$currentsection'";
                    $query_run = mysqli_query($link, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        $students = $query_run;
                        foreach ($query_run as $student) {
                            $studentid = $student['Student_ID'];
                            $query1 = "SELECT Quarter, Grades FROM `failing_grades` WHERE Student_ID = $studentid AND Class_ID = $currentclassid AND (Quarter ='1st' OR Quarter = '')";
                            $query_run1 = mysqli_query($link, $query1);
                            if (mysqli_num_rows($query_run1) > 0) {
                                $grades = mysqli_fetch_array($query_run1);
                                $grade = $grades['Grades'];
                                $quarter = $grades['Quarter'];
                            } else {
                                $grade = "";
                                $quarter = "";
                            }

                    ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="emp_checkbox" data-emp-id="<?= $studentid; ?>">
                                </td>
                                <td><?= $student['First_Name']; ?></td>
                                <td><?= $student['Last_Name'] ?></td>
                                <td><?= $quarter ?>
                                </td>
                                <td>
                                    <input type="number" name="Grades1st[]" min="60" max="99" data-maxlength="2" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" value="<?= $grade ?>">
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                    }
                    ?>

                </tbody>
            </table>
            <table id="myDataTable2" class="hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Quarter</th>
                        <th>Grades</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `student` WHERE Strand='$currentstrand' AND Section='$currentsection'";
                    $query_run = mysqli_query($link, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        $students = $query_run;
                        foreach ($query_run as $student) {
                            $studentid = $student['Student_ID'];
                            $query1 = "SELECT Quarter, Grades FROM `failing_grades` WHERE Student_ID = $studentid AND Class_ID = $currentclassid AND Quarter='2nd'";
                            $query_run1 = mysqli_query($link, $query1);
                            if (mysqli_num_rows($query_run1) > 0) {
                                $grades = mysqli_fetch_array($query_run1);
                                $grade = $grades['Grades'];
                                $quarter = $grades['Quarter'];
                            } else {
                                $grade = "";
                                $quarter = "";
                            }

                    ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="emp_checkbox" data-emp-id="<?= $studentid; ?>">
                                </td>
                                <td><?= $student['First_Name']; ?></td>
                                <td><?= $student['Last_Name'] ?></td>
                                <td><?= $quarter ?>
                                </td>
                                <td>
                                    <input type="number" name="Grades2nd[]" min="60" max="99" data-maxlength="2" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" value="<?= $grade ?>">
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
                        <input type="hidden" name="selectedquarter" id="selectedquarter" value="1st">
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
                        <input type="submit" class="btn btn-primary btn-lg" name="save_grades" value="Submit Grades">

                    </span>
                    <!-- <form action="code.php" method="POST"> -->
                </div>
            </div>
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
                ],
                // columnDefs: [{
                //     target: 3,
                //     visible: false,
                // }]
            });
            $('#myDataTable2').DataTable({
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
            // var table = $('#myDataTable').DataTable();

            // // #myInput is a <input type="text"> element
            // $('#Quarter').on('change', function() {
            //     table
            //         .columns(3)
            //         .search(this.value)
            //         .draw();
            // });
            $('#myDataTable2_wrapper').hide();
            $('#Quarter').on('change', function() {
                if (this.value == "1st") {
                    $('#myDataTable2_wrapper').hide();
                    $('#myDataTable_wrapper').show();
                    $('#selectedquarter').val("1st");
                } else {
                    $('#myDataTable_wrapper').hide();
                    $('#myDataTable2_wrapper').show();
                    $('#selectedquarter').val("2nd");
                }
            });
        });
    </script>


</body>

</html>