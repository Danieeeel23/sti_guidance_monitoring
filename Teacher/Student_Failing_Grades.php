<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--font-->
    <link rel="stylesheet" href="Failing_Grades.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css
">

    <title>List of Student</title>
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
                        <span class="icon"><img src="images/Home.svg" alt=""></span>
                        <span class="title1"><br>Home</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Attendance.php">
                        <span class="icon"><img src="images/Attendance.svg" alt=""></span>
                        <span class="title2"><br>Attendance</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Failing_Grades.php">
                        <span class="icon"><img src="images/Record Failing Grades.svg" alt=""></span>
                        <span class="title"><br>Failing Grades</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Excuse_Letter.php">
                        <span class="icon"><img src="images/VIew of Excuse Letter.svg" alt=""></span>
                        <span class="title"><br>Excuse Slip</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Announcement.php">
                        <span class="icon"><img src="images/VIew of Excuse Letter.svg" alt=""></span>
                        <span class="title"><br>Announcement</span>
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
                    <h2>Lists of Students</h2>
                </div>
                <div class="icons">
                    <i class="fa fa-bell"></i>
                    <i class="fa fa-search"></i>

                </div>
                <div class="icons1">
                    <h3>Teacher</h3>
                    <i class="fa fa-angle-down"></i>
                </div>
            </div>

        </div>
        <div class="main1">
            <div class="title2">
                <h1>List of Attendance</h1>
                <div class="bot">
                    <span class="create">
                        <i class="fa fa-plus"></i>
                        <form action="MyUserTech.php" method="POST">
                            <input type="submit" class="btn btn-primary btn-lg" value="Create">
                        </form>
                    </span>
                    <form action="code.php" method="POST">
                        <span class="Upload"><input type="submit" value="Upload"></span>
                        <span class="import"><input type="submit" value="Import"></span>
                </div>
            </div>

            <div class="search">
                <span id="sea"><i class="fa fa-search"></i> <input type="text" placeholder="Search.." name="search"></span>
                <label for="strand" name="Strand"></label>
                <select id="Strand" name="Strand">
                    <option value="0">STRAND</option>
                    <option value="1">STEM</option>
                    <option value="2">ABM</option>
                    <option value="3">HUMSS</option>
                    <option value="4">TVL</option>
                    <option value="5">GAS</option>

                </select>
                <i class="fa fa-filter"></i>
            </div>
        </div>
    </div>
    <div class="card-header">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Student No</th>
                    <th>Names</th>
                    <th>Subject</th>
                    <th>Year & Section</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>


                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="larger" name="checkbox">10000</td>
                    <td>Jonah Mae Alejo</td>
                    <td>English</td>
                    <td>Grade 11 - ABM 1 - A</td>
                    <td>June 12, 2022</td>
                    <td>June 15, 2022</td>
                    <td>Present</td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="larger" name="checkbox">10001</td>
                    <td>William Ribalde</td>
                    <td>Math</td>
                    <td>Grade 11 - STEM 1-A </td>
                    <td>June 12, 2022</td>
                    <td>June 15, 2022</td>
                    <td>Present</td>

                </tr>
                <tr>
                    <td><input type="checkbox" class="larger" name="checkbox">10002</td>
                    <td>Daniel Lois Hidalgo</td>
                    <td>Filipino</td>
                    <td>Grade 11 - STEM 1-A </td>
                    <td>June 12, 2022</td>
                    <td>June 15, 2022</td>
                    <td>Present</td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="larger" name="checkbox">10003</td>
                    <td>Keane Klyde Lara</td>
                    <td>Science</td>
                    <td>JGrade 11 - ICT 1 - A</td>
                    <td>June 12, 2022</td>
                    <td>June 15, 2022</td>
                    <td>Present</td>
                </tr>
                </tr>


                <!-- and so on... -->
            </tbody>
        </table>
        </form>
    </div>




</body>

</html>