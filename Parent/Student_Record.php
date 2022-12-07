<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['parent_id'])) {
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
                    <a href="Student_Record.php">
                        <span class="icon"><img src="images/sidebar_menu/Student_Record.svg" alt=""></span>
                        <span class="titlea"><br>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Concerns.php">
                        <span class="icon"><img src="images/sidebar_menu/Concerns.svg" alt=""></span>
                        <span class="title"><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Announcement.php">
                        <span class="icon"><img src="images/sidebar_menu/Mask group (9).svg" alt=""></span>
                        <span class="title5"><br>Announcement</span>
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
                    <i class="fa fa-bell"></i>
                    <i class="fa fa-question-circle"></i>
                </div>
                <div class="dropdown">
                    <?php
                    $parent_id = $_SESSION['parent_id'];
                    $query = "SELECT *, CONCAT(First_Name,' ',Last_Name) AS Names FROM `parent` WHERE Parent_ID='$parent_id'";
                    $query_run = mysqli_query($link, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $parent) {
                    ?>
                            <button class="dropbtn"><?= $parent['Names']; ?></button>
                            <div class="dropdown-content">
                                <a href="../logins/logout.php">Logout</a>
                            </div>
                </div>
            </div>

        </div>
<?php
                        }
                    } else {
                    }
?>

<div class="1title">
    <p>Admin’s Dashboard</p>
</div>


<div class="mainn">
    <div class="boddy">
        <div class="cardbody">
            <h2>Attendance</h2>
            <a href="Overview_of_Attendance.php" class="btn" style="text-decoration: none; color:black; margin-right: 180px;">View All</a>
        </div>
        <div class="pictures">
            <div class="subjects">
                <div class="cardtable">
                    <?php

                    $attendancequery = "SELECT *, CONCAT(Student_First_Name,' ',Student_Last_Name) AS Name FROM attendance ORDER BY `Last_Modified` DESC LIMIT 1";
                    $attendancequery_run = mysqli_query($link, $attendancequery);
                    $query_run = mysqli_query($link, $attendancequery);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $attendance) {
                    ?>
                            <div class="classes">
                                <p><strong><?= $attendance['Name']; ?></strong></p>
                                <p class="name"><?= $attendance['Status']; ?></p>

                            </div>
                            <span class="lastmodified">
                                <p class="date"><?= $attendance['Last_Modified']; ?></p>
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
    </div>
    <div class="mainn2">
        <div class="boddy">
            <div class="cardbody2">
                <h2>Grades</h2>
                <a href="Overview_of_Failing_Grades.php" class="btn" style="text-decoration: none; color:black; margin-right: 180px;">View All</a>
            </div>
            <div class="pictures">
                <div class="subjects">
                    <div class="cardtable">
                        <?php

                        $attendancequery = "SELECT *, CONCAT(First_Name,' ',Last_Name) AS Name FROM failing_grades ORDER BY `Last_Modified` DESC LIMIT 1";
                        $attendancequery_run = mysqli_query($link, $attendancequery);
                        $query_run = mysqli_query($link, $attendancequery);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $attendance) {
                        ?>
                                <div class="classes">
                                    <p><strong><?= $attendance['Name']; ?></strong></p>
                                    <p class="name"><?= $attendance['Status']; ?></p>

                                </div>
                                <span class="lastmodified">
                                    <p class="date"><?= $attendance['Last_Modified']; ?></p>
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

        </div>
        <div class="mainn3">
            <div class="boddy">
                <div class="cardbody3">
                    <h2>Record Offenses / Violation</h2>
                    <a href="List_of_Offense.php" class="btn" style="text-decoration: none; color:black; margin-right: 180px;">View All</a>
                </div>
                <div class="pictures">
                    <div class="subjects">
                        <div class="cardtable">
                            <?php

                            $attendancequery = "SELECT * FROM violation ORDER BY `Date` DESC LIMIT 1";
                            $attendancequery_run = mysqli_query($link, $attendancequery);
                            $query_run = mysqli_query($link, $attendancequery);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $attendance) {
                            ?>
                                    <div class="classes">
                                        <p><strong><?= $attendance['Name']; ?></strong></p>
                                        <p class="name"><?= $attendance['Type_of_Violation']; ?></p>

                                    </div>
                                    <span class="lastmodified">
                                        <p class="date"><?= $attendance['Date']; ?></p>
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
            </div>
            <div class="cement">
                <p><strong>Announcement</strong></p>

                <p><i class="fa fa-bullhorn" aria-hidden="true"></i>Announcement 1: School Requirements</p>
                <p class="date1">06/18/2022</p>
                <p><i class="fa fa-bullhorn" aria-hidden="true"></i>Announcement 2: Webinar</p>
                <p class="date1">06/18/2022</p>
                <p><i class="fa fa-bullhorn" aria-hidden="true"></i>Announcement 3: Parent’s Orientation</p>
                <p class="date1">06/18/2022</p>
                <p><i class="fa fa-bullhorn" aria-hidden="true"></i>Announcement 4: Enrollment</p>
                <p class="date1">06/18/2022</p>

            </div>
        </div>

    </div>
</div>
</body>

</html>