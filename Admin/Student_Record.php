<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_id'])){
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
                    <span class="title1" ><br>Home</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Excuse_Letter.php">
                    <span class="icon"><img src="images/sidebar_menu/Excuse_slip.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title2" ><br>Excuse Slip</span>
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
                    </div></a>            
                </li>
                <li>
                    <a href="Lists_of_Announcement.php">
                    <span class="icon"><img src="images/sidebar_menu/Announcement.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title" ><br>Announcement</span>
                    </a>
                </li>
                <li>
                    <a href="Student_Record.php">
                    <span class="icon"><img src="images/sidebar_menu/Student_Record.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title" ><br>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Concerns.php">
                    <span class="icon"><img src="images/sidebar_menu/Concerns.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title3" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="List_of_Inquiries.php">
                    <span class="icon"><img src="images/sidebar_menu/Inquiry.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title4" ><br>Inquiry</span>
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
                        <a href="Overview_of_Attendance.php" class="btn" style="text-decoration: none; color:#00008B; margin-right: 180px;">View All</a>
                        <span class="numbers" style="margin-left: 770px; color: red;">
                        <?php
                            $query = "SELECT Attendance_ID FROM attendance ORDER BY Attendance_ID";
                            $query_run = mysqli_query($link, $query);
        
                            $row = mysqli_num_rows($query_run);
        
                            echo $row
                            
                        ?>
                        </span> 
                    </div>
                    <div class="pictures">
                    <?php 

                        $query = "SELECT * FROM attendance ORDER BY `Last_Modified` DESC LIMIT 1";
                        $query_run = mysqli_query($link, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $attendance)
                            {
                                ?>
                                <div class="subjects"><p><strong><?= $attendance['Class_ID']; ?></strong></p>
                                <p class="name"><?= $attendance['Student_First_Name']; ?></p>
                                <p class="date"><?= $attendance['Last_Modified']; ?></p>
                                </div>
                            <?php
                            }
                        }
                        else
                        {
                            echo '<span style="margin-left: 30px; margin-top: 15px; color: red;">' . 'No Available Attendance' . '</span>';
                        }
                            ?>
                
                </div>
                </div>
                <div class="mainn2">
                    <div class="boddy">
                        <div class="cardbody2">
                            <h2>Failing Grades</h2>
                            <a href="Overview_of_Failing_Grades.php" class="btn" style="text-decoration: none; color:#00008B; margin-right: 180px;">View All</a>
                            <span class="numbers" style="margin-left: 770px; color: red;">
                        <?php
                            $query = "SELECT Failing_Grades_ID FROM failing_grades ORDER BY Failing_Grades_ID";
                            $query_run = mysqli_query($link, $query);
        
                            $row = mysqli_num_rows($query_run);
        
                            echo $row
                            
                        ?>
                        </span> 
                        </div>
                        <div class="pictures">
                        <?php 

                        $query = "SELECT * FROM failing_grades ORDER BY `Date_Issued` DESC LIMIT 1";
                        $query_run = mysqli_query($link, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $fails)
                            {
                                ?>
                                <div class="subjects"><p><strong><?= $fails['Subject_Name']; ?></strong></p>
                                <p class="name"><?= $fails['Teacher_Name']; ?></p>
                                <p class="date"><?= $fails['Date_Issued']; ?></p>
                                </div>
                            <?php
                            }
                        }
                        else
                        {
                            echo '<span style="margin-left: 30px; margin-top: 15px; color: red;">' . 'No Available Grades' . '</span>';
                        }
                            ?>              
                    </div>
                    </div>
                    <div class="mainn3">
                        <div class="boddy">
                            <div class="cardbody3">
                                <h2>Record Offenses / Violation</h2>
                                <a href="List_of_Offense.php" class="btn" style="text-decoration: none; color:#00008B; margin-right: 180px;">View All</a>
                                <span class="numbers" style="margin-left: 770px; color: red;">
                        <?php
                            $query = "SELECT Violation_ID FROM violation ORDER BY Violation_ID";
                            $query_run = mysqli_query($link, $query);
        
                            $row = mysqli_num_rows($query_run);
        
                            echo $row
                            
                        ?>
                        </span>
                            </div>
                            <div class="pictures">
                            <?php 

                            $query = "SELECT * FROM violation ORDER BY `Date` DESC LIMIT 1";
                            $query_run = mysqli_query($link, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $fails)
                                {
                                    ?>
                                    <div class="subjects"><p><strong><?= $fails['Type_of_Violation']; ?></strong></p>
                                    <p class="name"><?= $fails['Name']; ?></p>
                                    <p class="date"><?= $fails['Date']; ?></p>
                                    </div>
                                <?php
                                }
                            }
                            else
                            {
                                echo '<span style="margin-left: 30px; margin-top: 15px; color: red;">' . 'No Available Violation' . '</span>';
                            }
                                ?>               
                    </div>
                     </div>
                     <div class="cement">
                        <p><strong>Announcement</strong></p>

                        <?php 

                                        $query = "SELECT * FROM announcement LIMIT 5";
                                        $query_run = mysqli_query($link, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $announcements)
                                            {
                                                ?>
                        <p style="color:#00008B;"><i class="fa fa-bullhorn" aria-hidden="true"></i><a href="Update_Announcement.php?id=<?= $announcements['Announcement_ID']; ?>" style="text-decoration: none;"><?= $announcements['Title']; ?></a></p>
                       
                        <?php
                                    }
                                }
                                else
                                {
                                    echo '<span style="margin-left: 50px;">' . 'No Available Announcement' . '</span>';
                                }
                            ?>
                        
                     </div>
                    </div>
                    
            </div>
</div>
</body>
</html>