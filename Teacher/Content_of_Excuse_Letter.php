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

if (isset($_GET['excuse'])) {
    $currentexcuseid = $_GET['class'];
    $query = "SELECT * FROM `send_excuse_letter` WHERE `Class_ID`= $currentclassid ";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $name = $row['Name'];
        $year = $row['Year_Level'];
        $strand = $row['Strand'];
        $section = $row['Section'];
        $sdate = $row['Start_Date'];
        $edate = $row['End_Date'];
        $statement = $row['Statement'];
        $proof = $row['Proof_of_Absence'];
    }
} else {
    echo "No Class ID";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--font-->

    <link rel="stylesheet" href="ListStyle.css">
    <link rel="stylesheet" href="Content_of_Excuse_Letter.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <title>View of Excuse Slip</title>
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
                    <h2>Excuse Letter</h2>
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
                <h1>Content of Excuse Letter</h1>

            </div>
            <div class="bsinfo">
                <form action="">
                    <h4>Basic Information</h4>
                    <div class="info">

                        <label for="Name">Search</label>
                        <span id="btk"> <input type="text" placeholder="Search..." name="search"></span>

                        <label for="Status" name="Status">Status</label>
                        <select class="Status" placeholder="Status" name="Status">
                            <option value="0">Status</option>
                            <option value="1">Request</option>
                            <option value="2">Rejected</option>
                            <option value="3">Accepted</option>
                        </select>

                        <br>
                        <label for="Name">Name</label>
                        <span id="btk"> <input type="text" placeholder="Name" name="search"></span>
                        <label for="Name">Year</label>
                        <span id="btk"> <input type="text" placeholder="Year" name="search"></span>
                        <label for="Name">Strand</label>
                        <span id="btk"> <input type="text" placeholder="Strand" name="search"></span>
                        <label for="Name">Section</label>
                        <span id="btk"> <input type="text" placeholder="Section" name="search"></span>
                        <br>

                        <label for="Date">Start Date</label>
                        <input type="date" placeholder="Date" id="Date" name="date">

                        <label for="Date">End Date</label>
                        <input type="date" placeholder="Date" id="Date" name="date">


                    </div>

            </div>
            <div class="content">
                <div class="coninfo">
                    <div id="textarea">
                        <label for="Description" name="Description">Description</label>

                        <textarea id="statement" name="statemen">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur eos ipsam, magni harum repudiandae quisquam libero quidem fugiat ipsum impedit consequuntur voluptas amet perspiciatis ex unde, dolorem architecto asperiores facere!
                        </textarea>
                    </div>
                </div>
                <div class="coninfo1">

                    <label for="Image" name="Image">Image</label>
                    <input type="image" src="images/image 4.png" />
                    <div class="btn-container">
                        <button class="btn"><i class="fa fa-download"></i> Upload</button>
                        <button class="btnn">Send to Teacher</button>
                    </div>


                </div>
            </div>
            </form>
        </div>
    </div>