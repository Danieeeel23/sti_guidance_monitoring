<?php
session_start();
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--font-->
    <link rel="stylesheet" href="Overview_of_Failing_Grades.css">
    <link href="css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="delete_script.js"></script>

    <title>Overview of Failing Grades</title>
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
                    <a href="Student_Record.php">
                    <span class="icon"><img src="images/sidebar_menu/Student_Record.svg" alt=""></span>
                    <span class="title2"><br>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Concerns.php">
                    <span class="icon"><img src="images/sidebar_menu/Concerns.svg" alt=""></span>
                    <span class="title" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Announcement.php">
                    <span class="icon"><img src="images/sidebar_menu/Mask group (9).svg" alt=""></span>
                    <span class="title4" ><br>Announcement</span>
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
        <div class="main1">
            <?php include('message.php'); ?>
            <div class="title2">
                <h1>Overview of Failing Grades</h1>
                <div class="bot">

                </div>
            </div>

        </div>
    </div>
    <div class="card-header">
        <table id="myDataTable" class="hover" style="margin-left: 80px;">
            <thead>
                <tr>
                    <th></th>
                    <th>Student Name</th>
                    <th>Strand & Section</th>
                    <th>Grades</th>
                    <th>Subject</th>
                    <th>Teacher</th>
                    <th>Last Modified</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT *, CONCAT(First_Name,' ',Last_Name) AS Name FROM `failing_grades` ";
                $query_run = mysqli_query($link, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $grades) {
                        $classid = $grades['Class_ID'];
                        $classquery = "SELECT * FROM class WHERE Class_ID = $classid";
                        $classquery_run = mysqli_query($link, $classquery);
                        $classes = mysqli_fetch_array($classquery_run);

                        $subjectid = $classes['Subject_ID'];
                        $subjectquery = "SELECT * FROM subject WHERE Subject_ID = '$subjectid'";
                        $subjectquery_run = mysqli_query($link, $subjectquery);
                        $subjects = mysqli_fetch_array($subjectquery_run);
                ?>
                        <tr>
                            <td>
                                <input type="checkbox" class="emp_checkbox" data-emp-id="<?= $grades['Failing_Grades_ID']; ?>">
                            </td>
                            <td><?= $grades['Name'] ?></td>
                            <td><?= $classes['Strand'] . '-' . $classes['Section'] ?></td>
                            <td>
                                <input type="number" name="Grades[]" min="60" max="99" data-maxlength="2" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" value="<?= $grades['Grades'] ?>" readonly>
                            </td>
                            <td><?= $subjects['Subject_Name'] ?></td>
                            <td><?= $classes['Teacher_Name'] ?></td>
                            <td><?= $grades['Last_Modified'] ?></td>
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
    <style>
        .card-header {
            margin-left: 120px;
            text-align: center;
            margin-top: -60px;
        }

        label {
            margin-left: 80px;
            margin-bottom: -1100px;
        }

        div#myDataTable_length.dataTables_length {
            margin-top: -20px;
            margin-bottom: 30px;
        }

        div#myDataTable_info.dataTables_info {
            margin-left: 80px;
            margin-top: 10px;
        }

        div#myDataTable_paginate.dataTables_paginate.paging_simple_numbers {
            margin-right: -95px;
            margin-top: 10px;
        }

        div#myDataTable_filter.dataTables_filter {
            margin-right: 300px;
            margin-top: -10px;
        }

        table.dataTable th,
        table.dataTable td {
            border-bottom: 10px solid #f3f3f3;
            font-size: 16px;
        }

        table.dataTable td {
            background-color: white;
            height: 10px;
        }
    </style>

</body>

</html>