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
                    <span class="icon"><img src="images/sidebar_menu/Excuse_slip.svg" alt=""></span>
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
                    <span class="icon"><img src="images/sidebar_menu/Announcement.svg" alt=""></span>
                    <span class="title" ><br>Announcement</span>
                    </a>
                </li>
                <li>
                    <a href="Student_Record.php">
                    <span class="icon"><img src="images/sidebar_menu/Student_Record.svg" alt=""></span>
                    <span class="title" ><br>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Concerns.php">
                    <span class="icon"><img src="images/sidebar_menu/Concerns.svg" alt=""></span>
                    <span class="title3" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="List_of_Inquiries.php">
                    <span class="icon"><img src="images/sidebar_menu/Inquiry.svg" alt=""></span>
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
                    <i class="fa fa-bell"></i>
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
                        <a href="Overview_of_Attendance.php" class="btn" style="text-decoration: none; color:black; margin-right: 180px;">View All</a>
                    </div>
                    <div class="pictures">
                        <div class="subjects"><p><strong>Subject 1</strong></p>
                        <p class="name">Anna Lissa Abello</p>
                        <p class="date">June 07 2021</p>
                    </div>
                
                </div>
                </div>
                <div class="mainn2">
                    <div class="boddy">
                        <div class="cardbody2">
                            <h2>Failing Grades</h2>
                            <a href="Overview_of_Failing_Grades.php" class="btn" style="text-decoration: none; color:black; margin-right: 180px;">View All</a>
                        </div>
                        <div class="pictures">
                            <div class="subjects"><p><strong>Subject 1</strong></p>
                            <p class="name">Anna Lissa Abello</p>
                            <p class="date">June 07 2021</p>
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
                                <div class="subjects"><p><strong>Subject 1</strong></p>
                                <p class="name">Anna Lissa Abello</p>
                                <p class="date">June 07 2021</p>
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