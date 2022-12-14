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
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
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
                    <span class="icon"><img src="Images/sidebar_menu/Home.svg" alt=""></span>
                    <span class="title1"><br>Home</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Excuse_Letter.php">
                    <span class="icon"><img src="Images/sidebar_menu/Excuse_slip.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title2"><br>Excuse Slip</span>
                    </a>
                </li>
                <li><a href="">
                    <div class="dropdown2">
                        <span class="icon" style="padding-top: -100px;"><img src="Images/sidebar_menu/Manage_Users.svg" alt=""></span>
                        <a class="dropbtn2" style="margin-top: -40px;">
                            <span class="title3">Manage</span>
                        </a>

                        <div class="dropdown-user">
                            <a href="Lists_of_Student.php">Students</a>
                            <a href="Lists_of_Teacher.php">Teachers</a>
                            <a href="Lists_of_Parent.php">Parents</a>
                            <a href="Lists_of_Subjects.php">Subjects</a>
                            <a href="Lists_of_Section.php">Sections</a>
                            <a href="Lists_of_Schedule.php">Classes</a>
                        </div>
                    </div></a>
              
                </li>
                <li>
                    <a href="Lists_of_Announcement.php">
                    <span class="icon"><img src="Images/sidebar_menu/Announcement.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title"><br>Announcement</span>
                    </a>a
                </li>
                <li>
                    <a href="Student_Record.php">
                    <span class="icon"><img src="Images/sidebar_menu/Student_Record.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title"><br>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Concerns.php">
                    <span class="icon"><img src="Images/sidebar_menu/Concerns.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title3"><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="List_of_Inquiries.php">
                    <span class="icon"><img src="Images/sidebar_menu/Inquiry.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title4"><br>Inquiry</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="main">
            <span id="logo"><img src="Images/sti_logo.png" alt=""></span>
            <div class="topbar">
                <div class="toptitle">
                    <h2>Dashboard</h2>
                </div>
                <div class="icons">
                    <div class="dropdown">
                        <button class="dropbtn" onclick="myFunction()"><i class="fa fa-bell"></i><span class="badge badge-light">4</span></button>
                        <div class="dropdown-content" id="myDropdown">
                        <a href="#">Action</a>
                        <a href="#">Another Action</a>
                        <a href="#">Something Else</a>
                    </div> 
                </div> 
                <script>
                /* When the user clicks on the button, 
                toggle between hiding and showing the dropdown content */
                function myFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
                }

                // Close the dropdown if the user clicks outside of it
                window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                    }
                }
                }
                </script>                   
                <i class="fa fa-question-circle"></i>
                </div>
                <div class="dropdown1">
                    <button class="dropbtn1" onclick="myFunction1()">Admin</button>
                    <div class="dropdown-content1" id="myDropdown1">
                        <a href="../logins/logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
                /* When the user clicks on the button, 
                toggle between hiding and showing the dropdown content */
                function myFunction1() {
                document.getElementById("myDropdown1").classList.toggle("show");
                }

                // Close the dropdown if the user clicks outside of it
                window.onclick = function(event) {
                if (!event.target.matches('.dropbtn1')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content1");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                    }
                }
                }
                </script>
        <div class="1title">
            <p>Admin???s Dashboard</p>
        </div>
                
        <div class="cardbox">
        <?php include('message.php'); ?>
            <div class="card">
            <div class="iconss">
                <i class="fa fa-user w3-xxxlarge"></i>
             </div>
             <div>
                <?php
                    
                    $query = "SELECT Student_ID FROM student ORDER BY Student_ID";
                    $query_run = mysqli_query($link, $query);

                    $row = mysqli_num_rows($query_run);

                    echo '<div class="cardname"><strong>Students</strong></div>
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
                         $query = "SELECT Parent_ID FROM parent ORDER BY Parent_ID";
                         $query_run = mysqli_query($link, $query);
     
                         $row = mysqli_num_rows($query_run);
     
                         echo '<div class="cardname"><strong>Parents</strong></div>
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
                         $query = "SELECT Teacher_ID FROM teacher ORDER BY Teacher_ID";
                         $query_run = mysqli_query($link, $query);
     
                         $row = mysqli_num_rows($query_run);
     
                         echo '<div class="cardname"><strong>Teachers</strong></div>
                         <div class="numbers">'.$row.'</div>
                         </div>
                         </div>'
                      ?> 
                  
                 </div>
                 <div class="mainn">
            <div class="boddy">
                <div class="cardbody">
                    <h2>Announcement</h2>
                    <div class="cement">
                    <?php 

                                        $query = "SELECT * FROM announcement LIMIT 5";
                                        $query_run = mysqli_query($link, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $announcements)
                                            {
                                                ?>
                        <p style="color:#00008B;"><i class="fa fa-bullhorn" aria-hidden="true"></i><a href="Update_Announcement.php?id=<?= $announcements['Announcement_ID']; ?>" style="text-decoration: none;"><?= $announcements['Title']; ?> - <?= $announcements['Description']; ?> <span style="font-size: 12px; color: gray;"><?= $announcements['Start_Date']; ?></span></a></p>
                       
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
                <div class="boddy">
                    <div class="cardbody">
                        <h2>Excuse Slip</h2>
                    </div>
                    <div class="pictures">
                        <div class="request"><img src="Images/request.jpeg" alt=""><h3>Excuse Letter</h3><a href="Lists_of_Excuse_Letter.php" style="text-decoration: none;"><h4>Start <i class="fa fa-play" aria-hidden="true"></i></h4></a></div>
                        <div class="request1"><img src="Images/attendance.jpg" alt=""><h3>Attendance</h3><a href="Overview_of_Attendance.php" style="text-decoration: none;"><h4>Start <i class="fa fa-play" aria-hidden="true"></i></h4></a></div>
                        <div class="rejected"><img src="Images/failinggrades.jpg"alt=""><h3>Failing Grades</h3><a href="Overview_of_Failing_Grades.php" style="text-decoration: none;"><h4>Start <i class="fa fa-play" aria-hidden="true"></i></h4></a></div>
                        <div class="accepted"><img src="Images/offense.jpg" alt=""><h3>Offenses</h3><a href="List_of_Offense.php" style="text-decoration: none;"><h4>Start <i class="fa fa-play" aria-hidden="true"></i></h4></a></div>
                       
                    </div>
                </div>
                <div class="announce">
                    <div class="cardbody4">
                        <h2>Complaints and Inquiries</h2>
                        <a href="List_of_Inquiries.php" class="btn2">View All</a>
                    <div class="anoun">
                        <div class="ongoing"><p><strong>Concerns</strong></p>
                            <div class="card1">
                                <table class="table1">
                                    <tbody>
                                    <?php 

                                        $query = "SELECT * FROM concerns LIMIT 3";
                                        $query_run = mysqli_query($link, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $concerns)
                                            {
                                    ?>
                                        <tr>
                                            <td>Complaints <?= $concerns['Concern_ID']; ?></td>
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
                            </div>
                        </div>
                        <div class="expired"><p><strong>Inquiries</strong></p>
                        <a href="Lists_of_Concerns.php" class="btn3">View All</a>
                            <div class="card1">
                                <table class="table1">
                                    <tbody>
                                    <?php 

                                        $query = "SELECT * FROM inquiries LIMIT 3";
                                        $query_run = mysqli_query($link, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $inquiry)
                                            {
                                                ?>
                                        <tr>
                                            <td><?= $inquiry['Title']; ?></td>
                                            <td><?= $inquiry['Date']; ?></td>   
                                        </tr>
                                       
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo '<span style="margin-left: 140px;">' . 'No Available Inquiries' . '</span>';
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
                     
                    </div>
                    
            </div>
</div>
</body>
</html>