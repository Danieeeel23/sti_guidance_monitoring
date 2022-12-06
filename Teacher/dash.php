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

$attendancequery = "SELECT * FROM `attendance`";
$attendancequery_run = mysqli_query($link, $attendancequery);
if (mysqli_num_rows($attendancequery_run) > 0) {
    $attendancecount = mysqli_num_rows($attendancequery_run);
} else {
    $attendancecount = 0;
}

$failquery = "SELECT * FROM `failing_grades`";
$failquery_run = mysqli_query($link, $failquery);
if (mysqli_num_rows($failquery_run) > 0) {
    $failcount = mysqli_num_rows($failquery_run);
} else {
    $failcount = 0;
}

$excusequery = "SELECT * FROM `excuse letter`";
$excusequery_run = mysqli_query($link, $excusequery);
if (mysqli_num_rows($excusequery_run) > 0) {
    $excusecount = mysqli_num_rows($excusequery_run);
} else {
    $excusecount = 0;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--font-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
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
                    <h2>Classes</h2>
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
        <div class="1title">
            <p>Admin’s Dashboard</p>
        </div>
        <div class="cardbox">
            <div class="card">
                <div class="iconss">
                    <i class="fa fa-users"></i>
                </div>
                <div>
                    <div class="cardname"><strong>Attendance</strong></div>
                    <div class="numbers"><?= $attendancecount ?></div>
                </div>
            </div>
            <div class="card">
                <div class="iconss">
                    <i class="fa fa-users"></i>
                </div>
                <div>
                    <div class="cardname"><strong>Grades</strong></div>
                    <div class="numbers"><?= $failcount ?></div>
                </div>
            </div>
            <div class="card">
                <div class="iconss">
                    <i class="fa fa-users"></i>
                </div>
                <div>
                    <div class="cardname"><strong>Excuse Letter</strong></div>
                    <div class="numbers"><?= $excusecount ?></div>
                </div>
            </div>
        </div>
        <div class="mainn">
            <div class="boddy">
                <div class="cardbody">
                    <h2>Announcement</h2>

                    <div class="cement">
                        <p><i class="fa fa-bullhorn" aria-hidden="true"></i>Announcement 1: School Requirements</p>
                        <p class="date1">06/18/2022</p>
                    </div>
                    <div class="cement">
                        <p><i class="fa fa-bullhorn" aria-hidden="true"></i>Announcement 2: Webinar</p>
                        <p class="date1">06/18/2022</p>
                    </div>
                    <div class="cement">
                        <p><i class="fa fa-bullhorn" aria-hidden="true"></i>Announcement 3: Parent’s Orientation</p>
                        <p class="date1">06/18/2022</p>
                    </div>
                    <div class="cement">
                        <p><i class="fa fa-bullhorn" aria-hidden="true"></i>Announcement 4: Enrollment</p>
                        <p class="date1">06/18/2022</p>
                    </div>
                </div>
            </div>

            <div class="boddy">
                <div class="cardbody">
                    <h2>Student Records</h2>
                </div>
                <div class="pictures">
                    <div class="card-pictures"><img src="Images/attendance.jpg" alt="">
                        <h3>Attendance</h3>
                        <a href="Attendance_Classes.php">
                            <h4>Start <i class="fa fa-play" aria-hidden="true"></i></h4>
                        </a>
                    </div>
                    <div class="card-pictures"><img src="Images/failinggrades.jpg" alt="">
                        <h3>Failing Grades</h3>
                        <a href="Grades_Classes.php">
                            <h4>Start <i class="fa fa-play" aria-hidden="true"></i></h4>
                        </a>
                    </div>
                    <div class="card-pictures"><img src="Images/ecuseletter.jpg" alt="">
                        <h3>Excuse Letter</h3>
                        <a href="Lists_of_Excuse_Letter.php">
                            <h4>Start <i class="fa fa-play" aria-hidden="true"></i></h4>
                        </a>
                    </div>
                </div>
            </div>

            <div class="boddy">
                <div class="cardbody">
                    <h2>Newly Received</h2>
                    <div class="anoun">
                        <div class="ongoing">
                            <div class="anoun-header">
                                <p><strong>Grades</strong></p>
                                <a href="Grades_Classes.php" class="btn">View All</a>
                            </div>

                            <div class="card1">
                                <table class="table1">
                                    <?php

                                    $query = "SELECT *, CONCAT(First_Name,' ',Last_Name) AS Name FROM failing_grades ORDER BY Last_Modified DESC LIMIT 3";
                                    $query_run = mysqli_query($link, $query);
                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $fail) {
                                            $classid = $fail['Class_ID'];
                                            //get the subject using single row subquery
                                            $query1 = "SELECT * FROM subject WHERE Subject_ID = (SELECT Subject_ID FROM class WHERE Class_ID = $classid)";
                                            $query_run1 = mysqli_query($link, $query1);
                                            $subjects = mysqli_fetch_array($query_run1);
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $fail['Name']; ?></td>
                                                    <td><?= $subjects['Subject_Name']; ?></td>
                                                    <td><?= $fail['Last_Modified']; ?></td>
                                                </tr>
                                                <!-- and so on... -->
                                            </tbody>

                                    <?php
                                        }
                                    } else {
                                        echo '<span style="margin-left: 30px; margin-top: 15px; color: red;">' . 'No Available Failing Students' . '</span>';
                                    }
                                    ?>


                                </table>
                            </div>
                        </div>
                        <div class="expired">
                            <div class="anoun-header">
                                <p><strong>Excuse Letter</strong></p>
                                <a href="Lists_of_Excuse_Letter.php" class="btn">View All</a>
                            </div>
                            <div class="card1">
                                <table class="table1">
                                    <tbody>
                                        <tr>
                                            <td>Daniel Lois F. Hidalgo</td>
                                            <td>06/20/2022 16:01:00</td>
                                        </tr>
                                        <tr>
                                            <td>William R. Ribalde</td>
                                            <td>06/21/2022 </td>
                                        </tr>

                                        <!-- and so on... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>