<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['student_id'])){
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
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
    <title>Dashboard</title>
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
                    <a href="Lists_of_Concerns.php">
                    <span class="icon"><img src="images/sidebar_menu/Concerns.svg" alt=""></span>
                    <span class="title2"><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Excuse_Letter.php">
                    <span class="icon"><img src="images/sidebar_menu/Excuse_slip.svg" alt=""></span>
                    <span class="title" ><br>Excuse Letter</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Violation.php">
                    <span class="icon"><img src="images/sidebar_menu/Mask group (7).svg" alt=""></span>
                    <span class="title3" ><br>Violation</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Failing_Grades.php">
                    <span class="icon"><img src="images/sidebar_menu/Mask group (8).svg" alt=""></span>
                    <span class="title4" ><br>Failing Grades</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Announcement.php">
                    <span class="icon"><img src="images/sidebar_menu/Mask group (9).svg" alt=""></span>
                    <span class="title5" ><br>Announcement</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="main">
            <span id="logo"><img src="images/sti_logo.png" alt=""></span>
            <div class="topbar">
                <div class="toptitle">
                    <h2>Dashboard</h2>
                </div>
                <div class="icons">
                    <i class="fa fa-bell"></i>
                    <i class="fa fa-question-circle"></i>
                    
                </div>
                <div class="dropdown">
                <?php 
                        $student_id = $_SESSION['student_id'];
                        $query = "SELECT *, CONCAT(First_Name,' ',Last_Name) AS Names FROM `student` WHERE Student_ID='$student_id'";
                        $query_run = mysqli_query($link, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $student)
                            {
                                ?>
                    <button class="dropbtn"><?= $student['Names']; ?></button>
                    <div class="dropdown-content">
                    <a href="../logins/logout.php">Logout</a>
                </div>
                </div>
                </div>
            
                </div>
                <?php
                                }
                            }
                            else
                            {
                                
                            }
                        ?>
                <div class="1title">
                    <p>Student Dashboard</p>
                </div>
                
        <div class="cardbox">
            <div class="card">
            <div class="iconss">
                <i class="fa fa-users"></i>
             </div>
             <div>
             <?php
                    $student_id = $_SESSION['student_id'];
                    $query = "SELECT * FROM `violation` WHERE Student_ID='$student_id'";
                    $query_run = mysqli_query($link, $query);

                    $row = mysqli_num_rows($query_run);

                    echo '<div class="cardname"><strong>Violation</strong></div>
                        <div class="numbers">'.$row.'</div>
                        </div>
                        </div>'
                ?>

            <div class="card">
                <div class="iconss">
                    <i class="fa fa-users"></i>
                 </div>
                 <div>
                 <?php
                    $student_id = $_SESSION['student_id'];
                    $query = "SELECT * FROM `failing_grades` WHERE Student_ID='$student_id'";
                    $query_run = mysqli_query($link, $query);

                    $row = mysqli_num_rows($query_run);

                    echo '<div class="cardname"><strong>Failing Grades</strong></div>
                        <div class="numbers">'.$row.'</div>
                        </div>
                        </div>'
                ?>

                <div class="card">
                    <div class="iconss">
                        <i class="fa fa-users"></i>
                     </div>
                     <div>
                     <?php
                    $student_id = $_SESSION['student_id'];
                    $query = "SELECT `Student_ID` FROM `excuse letter` WHERE Student_ID='$student_id'";;
                    $query_run = mysqli_query($link, $query);

                    $row = mysqli_num_rows($query_run);

                    echo '<div class="cardname"><strong>Excuse Letter</strong></div>
                        <div class="numbers">'.$row.'</div>
                        </div>
                        </div>'
                ?>
                 </div>
            <div class="mainn">
                <div class="boddy">
                    <div class="cardbody">
                        <h2>Student Records</h2>
                    </div>
                    <div class="pictures">
                        <div class="request"><img src="images/violation.jpg" alt=""><h3>Violation</h3><a href="Lists_of_Violation.php" style="text-decoration: none;"><h4>Start <i class="fa fa-play" aria-hidden="true"></i></h4></a></div>
                        <div class="rejected"><img src="images/failinggrades.jpg"alt=""><h3>Failing Grades</h3><a href="Lists_of_Failing_Grades.php" style="text-decoration: none;"><h4>Start <i class="fa fa-play" aria-hidden="true"></i></h4></a></div>
                        <div class="accepted"><img src="images/ecuseletter.jpg" alt=""><h3>Excuse Letter</h3><a href="Lists_of_Excuse_Letter.php" style="text-decoration: none;"><h4>Start <i class="fa fa-play" aria-hidden="true"></i></h4></a></div>
                    </div>
                </div>
                
                <div class="announce">
                    <div class="cardbody2">
                        <h2>Newly Created</h2>
                    <div class="anoun">
                        <div class="ongoing"><p><strong>Excuse Letter</strong><a href="Lists_of_Concerns.php" class="btn" style="text-decoration: none; color: white;">View All</a></p>
                            <div class="card1">
                                <table class="table1">
                                    <tbody>
                                    <?php 
                                        $student_id = $_SESSION['student_id'];
                                        $query = "SELECT * FROM `excuse letter` WHERE Student_ID='$student_id' LIMIT 3";
                                        $query_run = mysqli_query($link, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $excuse)
                                            {
                                        ?>
                                        <tr>
                                            <td><?= $excuse['Reason_for_Absence']; ?></td>
                                            <td><?= $excuse['Start_Date']; ?></td>   
                                        </tr>

                                        <?php
                                        }
                                        }
                                        else
                                        {

                                        }
                                        ?>
                                        <!-- and so on... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="expired"><p><strong>Complaints</strong><a href="Lists_of_Excuse_Letter.php" class="btn2" style="text-decoration: none; color: white;">View All</a></p>
                            <div class="card2">
                                <table class="table2">
                                    <tbody>
                                    <?php 
                                        $student_id = $_SESSION['student_id'];
                                        $query = "SELECT * FROM `concerns` WHERE Student_ID='$student_id' LIMIT 3";
                                        $query_run = mysqli_query($link, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $concerns)
                                            {
                                        ?>
                                        <tr>
                                            <td><?= $concerns['Title']; ?></td>
                                            <td><?= $concerns['Date']; ?></td>   
                                        </tr>

                                        <?php
                                        }
                                        }
                                        else
                                        {

                                        }
                                        ?>
                                        <!-- and so on... -->
                                    </tbody>
                                </table>
                            </div></div>
                    </div>
                    </div>
                </div>
                
                <div class="announce2">
                    <div class="cardbody3">
                        <h2>Newly Received</h2>
                    <div class="anoun">
                        <div class="ongoing"><p><strong>Violation</strong> <a href="Lists_of_Violation.php" class="btn3" style="text-decoration: none; color: white;">View All</a></p>
                            <div class="card1">
                                <table class="table1">
                                    <tbody>
                                    <?php 
                                        $student_id = $_SESSION['student_id'];
                                        $query = "SELECT * FROM `violation` WHERE Student_ID='$student_id' LIMIT 3";
                                        $query_run = mysqli_query($link, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $violation)
                                            {
                                        ?>
                                        <tr>
                                            <td>Violation <?= $violation['Violation_ID']; ?></td>
                                            <td><?= $violation['Type_of_Violation']; ?></td>   
                                        </tr>

                                        <?php
                                        }
                                        }
                                        else
                                        {

                                        }
                                        ?>
                                                                     
                                        <!-- and so on... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="expired"><p><strong>Failing Grades</strong> <a href="Lists_of_Failing_Grades.php" class="btn4" style="text-decoration: none; color: white;">View All</a></p>
                            <div class="card1">
                                <table class="table1">
                                    <tbody>
                                    <?php 
                                        $student_id = $_SESSION['student_id'];
                                        $query = "SELECT * FROM `failing_grades` WHERE Student_ID='$student_id' LIMIT 3";
                                        $query_run = mysqli_query($link, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $fails)
                                            {
                                        ?>
                                        <tr>
                                            <td>Violation <?= $fails['Subject']; ?></td>
                                            <td><?= $fails['Grades']; ?></td>   
                                        </tr>

                                        <?php
                                        }
                                        }
                                        else
                                        {

                                        }
                                        ?>
                                   
                                   
                                        <!-- and so on... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                     </div>
                     <div class="cement">
                        <p><strong>Announcement</strong></p>

                        <?php 

                            $query = "SELECT * FROM `announcement` LIMIT 6";
                            $query_run = mysqli_query($link, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $announcements)
                                {
                                    ?>
                        <p><i class="fa fa-bullhorn" aria-hidden="true"></i>Announcement <?= $announcements['Announcement_ID']; ?>: <?= $announcements['Title']; ?></p>
                        <p class="date1">06/18/2022</p>

                        <?php
                                    }
                                }
                                else
                                {
                                
                                }
                            ?>
                        
                     </div>
                    </div>
                    
            </div>
</div>
</body>
</html>