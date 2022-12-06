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
    <title>List of Excuse Letter</title>
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
                    <h2>Excuse Letter</h2>
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
            <?php include('message.php'); ?>
            <div class="title2">
                <h1>List of Students</h1>

            </div>
        </div>
    </div>
    <div class="card-header">
        <table id="myDataTable" class="hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Section</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $currentdate = date("Y-m-d");
                $query = "SELECT * FROM `send_excuse_letter` WHERE Status = 'Accepted' AND ('$currentdate' BETWEEN `Start_Date` AND End_Date)";
                $query_run = mysqli_query($link, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $excuse) {
                ?>
                        <tr>
                            <td>
                                <input type="checkbox" class="emp_checkbox" data-emp-id="<?= $excuse['Send_Excuse_Letter_ID']; ?>">
                            </td>
                            <td><?= $excuse['Name']; ?></td>
                            <td><?= $excuse['Strand'] . '-' . $excuse['Section'] ?></td>
                            <td><?= $excuse['Status']; ?></td>
                            <td><?= $excuse['Start_Date']; ?></td>
                            <td><?= $excuse['End_Date']; ?></td>
                            <td><a href="Content_of_Excuse_Letter.php?excuse=<?= $excuse['Send_Excuse_Letter_ID'] ?>"><button type="submit" class="btn btn-update">View</button></a></td>
                        </tr>
                <?php
                    }
                } else {
                }
                ?>

            </tbody>
        </table>
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
                ]
            })
        });
    </script>


</body>

</html>