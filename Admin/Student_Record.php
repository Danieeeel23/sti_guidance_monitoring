<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_id'])) {
    header('location:../logins/login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--font-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
     ">
    <link rel="stylesheet" href="Student_Record.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Student Record</title>
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
                        <span class="icon"><img src="images/sidebar_menu/Home.svg" alt=""></span>
                        <span class="title1"><br>Home</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Excuse_Letter.php">
                        <span class="icon"><img src="images/sidebar_menu/Excuse_slip.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                        <span class="title2"><br>Excuse Slip</span>
                    </a>
                </li>
                <li><a href="">
                        <div class="dropdown1">
                            <span class="icon" style="padding-top: -100px;"><img src="images/sidebar_menu/Manage_Users.svg" alt=""></span>
                            <a class="dropbtn1" style="margin-top: -40px;">
                                <span class="title">Manage Users</span>
                            </a>

                            <div class="dropdown-user">
                                <a href="Lists_of_Student.php">Students</a>
                                <a href="Lists_of_Teacher.php">Teachers</a>
                                <a href="Lists_of_Parent.php">Parents</a>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Announcement.php">
                        <span class="icon"><img src="images/sidebar_menu/Announcement.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                        <span class="title"><br>Announcement</span>
                    </a>
                </li>
                <li>
                    <a href="Student_Record.php">
                        <span class="icon"><img src="images/sidebar_menu/Student_Record.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                        <span class="title"><br>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Concerns.php">
                        <span class="icon"><img src="images/sidebar_menu/Concerns.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                        <span class="title3"><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="List_of_Inquiries.php">
                        <span class="icon"><img src="images/sidebar_menu/Inquiry.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                        <span class="title4"><br>Inquiry</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="main">
            <span id="logo"><img src="images/sti_logo.png" alt=""></span>
            <div class="topbar">
                <div class="toptitle">
                    <h2>Student Record</h2>
                </div>
                <div class="icons">
                    <i class="fa fa-bell"></i><span class="badge badge-light">4</span>
                    <i class="fa fa-question-circle"></i>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">Admin</button>
                    <div class="dropdown-content">
                        <a href="../logins/logout.php">Logout</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="1title">
            <p>Admin’s Dashboard</p>
        </div>


        <div class="mainn">
            <div class="boddy">
                <div class="cardbody">
                    <h2>Attendance</h2>
                    <div class="cardright">
                        <a href="Overview_of_Attendance.php" class="btn">View All</a>
                        <span class="numbers">
                            <?php
                            $query = "SELECT Attendance_ID FROM attendance ORDER BY Attendance_ID";
                            $query_run = mysqli_query($link, $query);

                            $row = mysqli_num_rows($query_run);

                            echo $row

                            ?>
                        </span>
                    </div>
                </div>
                <div class="pictures"></div>
                <div class="cardtable">
                    <?php

                    $lastmodifiedquery = "SELECT * FROM attendance ORDER BY `Last_Modified` DESC LIMIT 1";
                    $query = "SELECT * FROM class";
                    $lastmodifiedquery_run = mysqli_query($link, $lastmodifiedquery);
                    $lastmodified = mysqli_fetch_array($lastmodifiedquery_run);
                    $query_run = mysqli_query($link, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $attendance) {
                    ?>
                            <div class="classes">
                                <p><strong><?= $attendance['Teacher_Name']; ?></strong></p>
                                <p class="name"><?= $attendance['Subject_Name']; ?></p>

                            </div>
                            <span class="lastmodified">
                                <p class="date"><?= $lastmodified['Last_Modified']; ?></p>
                            </span>
                    <?php
                        }
                    } else {
                        echo '<span style="margin-left: 30px; margin-top: 15px; color: red;">' . 'No Available Attendance' . '</span>';
                    }
                    ?>
                </div>


            </div>
            <div class="boddy">
                <div class="cardbody">
                    <h2>Failing Students</h2>
                    <div class="cardright">
                        <a href="Overview_of_Failing_Grades.php" class="btn">View All</a>
                        <span class="numbers">
                            <?php
                            $query = "SELECT Failing_Grades_ID FROM failing_grades ORDER BY Failing_Grades_ID";
                            $query_run = mysqli_query($link, $query);

                            $row = mysqli_num_rows($query_run);

                            echo $row

                            ?>
                        </span>
                    </div>
                </div>
                <div class="pictures"></div>
                <div class="cardtable">
                    <?php

                    $query = "SELECT *, CONCAT(First_Name,' ',Last_Name) AS Name FROM failing_grades WHERE Status = 'Failed' ORDER BY Last_Modified DESC";
                    $query_run = mysqli_query($link, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $fail) {
                            $classid = $fail['Class_ID'];
                            //get the subject using single row subquery
                            $query1 = "SELECT * FROM subject WHERE Subject_ID = (SELECT Subject_ID FROM class WHERE Class_ID = $classid)";
                            $query_run1 = mysqli_query($link, $query1);
                            $subjects = mysqli_fetch_array($query_run1);
                    ?>
                            <div class="classes">
                                <p><strong><?= $fail['Name']; ?></strong></p>
                                <p class="name"><?= $subjects['Subject_Name']; ?> (<?= $fail['Grades']; ?>)</p>

                            </div>
                            <span class="lastmodified">
                                <p class="date"><?= $fail['Last_Modified']; ?></p>
                            </span>
                    <?php
                        }
                    } else {
                        echo '<span style="margin-left: 30px; margin-top: 15px; color: red;">' . 'No Available Attendance' . '</span>';
                    }
                    ?>
                </div>

            </div>
        </div>
</body>

</html>