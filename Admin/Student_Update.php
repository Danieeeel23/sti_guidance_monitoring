<?php
session_start();
require 'config.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--font-->
    <link rel="stylesheet" href="Student_Update.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <title>Update Student</title>
</head>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

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
                    <a href="Lists_of_Excuse_Letter.php">
                        <span class="icon"><img src="images/sidebar_menu/Excuse_slip.svg" alt=""></span>
                        <span class="title2"><br>Excuse Slip</span>
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
                                <a href="Lists_of_Subjects.php">Subjects</a>
                                <a href="Lists_of_Section.php">Sections</a>
                                <a href="Lists_of_Schedule.php">Classes</a>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Announcement.php">
                        <span class="icon"><img src="images/sidebar_menu/Announcement.svg" alt=""></span>
                        <span class="title"><br>Announcement</span>
                    </a>
                </li>
                <li>
                    <a href="Student_Record.php">
                        <span class="icon"><img src="images/sidebar_menu/Student_Record.svg" alt=""></span>
                        <span class="title"><br>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Concerns.php">
                        <span class="icon"><img src="images/sidebar_menu/Concerns.svg" alt=""></span>
                        <span class="title3"><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="List_of_Inquiries.php">
                        <span class="icon"><img src="images/sidebar_menu/Inquiry.svg" alt=""></span>
                        <span class="title4"><br>Inquiry</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">
            <span id="logo"><img src="images/sti_logo.png" alt=""></span>
            <div class="topbar">
                <div class="toptitle">
                    <h2>My User</h2>
                </div>
                <div class="icons">
                    <i class="fa fa-bell"></i>
                    <i class="fa fa-search"></i>

                </div>
                <div class="icons1">
                    <h3>Admin</h3>
                    <i class="fa fa-angle-down"></i>
                </div>
            </div>
        </div>
        <div class="main1">
            <div class="title2">
                <?php include('message.php'); ?>
                <h1>Update Student</h1>
                <span class="create">
                    <input type="submit" name="update_student" class="btn btn-primary btn-lg" value="Update">
                </span>
            </div>


        </div>
        <form action="code.php" method="POST">
            <div class="info-container">
                <h4>Student Information</h4>
                <div class="bsinfo-container">
                    <div class="bsinfo">
                        <?php
                        if (isset($_GET['id'])) {
                            $student_id = mysqli_real_escape_string($link, $_GET['id']);
                            $query = "SELECT * FROM student WHERE Student_ID='$student_id' ";
                            $query_run = mysqli_query($link, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $student = mysqli_fetch_array($query_run);
                        ?>
                                <h4><i class='fa fa-user-circle'></i>Basic Information</h4>

                                <div class="info">

                                    <label for="StudentNo">Student No</label> <span id="btk"> <input type="text" placeholder="" name="studentno" value="<?= $student['Student_ID']; ?>" readonly></span>

                                    <label for="Birthday">Birth Date</label>
                                    <input type="date" id="Birthdayy" name="birthday" value="<?= $student['Birthdate']; ?>">
                                    <br>
                                    <label for="Gender">Gender</label>
                                    <input type="radio" name="gender" value="Male" <?php
                                                                                    if ($student['Gender'] == "Male") {
                                                                                        echo "checked";
                                                                                    }
                                                                                    ?>> Male
                                    <input type="radio" name="gender" value="Female" <?php
                                                                                        if ($student['Gender'] == "Female") {
                                                                                            echo "checked";
                                                                                        }
                                                                                        ?>> Female


                                    <br>

                                    <label for="Firstname">Firstname</label> <span id="btk"> <input type="text" placeholder="" name="firstname" value="<?= $student['First_Name']; ?>"></span>

                                    <label for="MI">MI</label> <span id="btk"> <input type="text" placeholder="" name="middlename" value="<?= $student['Middle_Name']; ?>"></span>

                                    <label for="Surname">Surname</label> <span id="btk"> <input type="text" placeholder="" name="lastname" value="<?= $student['Last_Name']; ?>"></span>
                                    </br>

                                    <label for="Year">Year Level</label><span class="asterisk"> *</span>
                                    <select class="Strand" placeholder="" name="yrlvl" required>
                                        <?php
                                        $link = mysqli_connect("localhost", "root", "", "sti guidance monitoring");
                                        $query = "SELECT * FROM `year_level`";
                                        $query_run = mysqli_query($link, $query);

                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $yrlvl) {
                                                if ($student['Year_Level'] == $yrlvl['Year_Level']) {
                                        ?>
                                                    <option value="<?= $yrlvl['Year_Level']; ?>" selected><?= $yrlvl['Year_Level']; ?></option> <br>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?= $yrlvl['Year_Level']; ?>"><?= $yrlvl['Year_Level']; ?></option> <br>
                                        <?php
                                                }
                                            }
                                        } else {
                                            echo "No Year Level Found";
                                        }
                                        ?>
                                    </select>
                                    <label for="Strand" name="Strand">Strand</label>
                                    <select class="Strand" placeholder="" name="Strand" required>
                                        <?php
                                        $link = mysqli_connect("localhost", "root", "", "sti guidance monitoring");
                                        $query = "SELECT * FROM `strand`";
                                        $query_run = mysqli_query($link, $query);

                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $strand) {
                                                if ($student['Strand'] == $strand['Name']) {
                                        ?>
                                                    <option value="<?= $strand['Name']; ?>" selected><?= $strand['Name']; ?></option> <br>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?= $strand['Name']; ?>"><?= $strand['Name']; ?></option> <br>
                                        <?php
                                                }
                                            }
                                        } else {
                                            echo "No Year Level Found";
                                        }
                                        ?>
                                    </select>

                                    <label for="Section">Section</label> <span id="btk">
                                        <select class="Strand" placeholder="" name="Strand" required>
                                            <?php
                                            $link = mysqli_connect("localhost", "root", "", "sti guidance monitoring");
                                            $query = "SELECT * FROM `section`";
                                            $query_run = mysqli_query($link, $query);

                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $section) {
                                                    if ($student['Section'] == $section['Section']) {
                                            ?>
                                                        <option value="<?= $section['Section']; ?>" selected><?= $section['Section']; ?></option> <br>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="<?= $section['Section']; ?>"><?= $section['Section']; ?></option> <br>
                                            <?php
                                                    }
                                                }
                                            } else {
                                                echo "No Year Level Found";
                                            }
                                            ?>
                                        </select>
                                        <!-- <label for="Password">Password</label> <span id="btk"> <input type="text" placeholder="" name="password" value=""></span> -->



                                        <label for="Role"></label> <span id="btk"> <input type="hidden" placeholder="" name="role" value="Student" readonly></span>
                                </div>

                    </div>
                    <div class="right">
                        <div class="bsinfo1">
                            <h4><i class="fa fa-phone" style="font-size:15px"></i>Contact Information</h4>
                            <div class="info">
                                <label for="TelephoneNumber">Telephone Number</label> <span id="btk"> <input type="number" placeholder="" name="telno" value="<?= $student['Telephone_No']; ?>"></span>
                                <br>
                                <label for="MobileNumber">Mobile Number</label> <span id="btk"> <input type="number" placeholder="" name="mobileno" value="<?= $student['Mobile_No']; ?>"></span>

                                <!-- <br><label for="Email Address">Email Address</label> <span id="btk"> <input type="text" placeholder="" name="email" value=""></span> -->

                            </div>
                        </div>
                        <div class="bsinfo2">
                            <h4><i class="fa fa-map-marker" style="font-size:15px"> </i>Address</h4>
                            <div class="info">
                                <label for="Address">Address</label> <span id="btk"> <input type="text" placeholder="" name="address" value="<?= $student['Address']; ?>"></span>
                                <label for="City">City</label> <span id="btk"> <input type="text" placeholder="" name="city" value="<?= $student['City']; ?>"></span>

                                <br><label for="Province">Province</label> <span id="btk"> <input type="text" placeholder="" name="province" value="<?= $student['Province']; ?>"></span>
                                <label for="Postcode">Postcode</label> <span id="btk"> <input type="number" placeholder="" name="postcode" value="<?= $student['Postcode']; ?>"></span>
                            </div>

                        </div>
                    </div>
                </div>
        <?php
                            } else {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
        ?>
            </div>

            <div class="info-container">
                <h4>Parent Information</h4>
                <div class="bsinfo-container">
                    <?php
                    if (isset($_GET['id'])) {
                        $parent_id = mysqli_real_escape_string($link, $_GET['id']);
                        $query = "SELECT * FROM parent WHERE Student_ID='$parent_id' ";
                        $query_run = mysqli_query($link, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $index => $parent) {
                                # code...

                    ?>
                                <div class="bsinfo">
                                    <h3>Parent <?= $index + 1 ?></h3>
                                    <h4><i class='fa fa-user-circle'></i>Basic Information</h4>
                                    <div class="info">
                                        <label for="Student No">Parent No</label> <span id="btk"> <input type="text" placeholder="" name="parent_id" value="<?= $parent['Parent_ID']; ?>" readonly></span>

                                        <label for="Gender">Parents</label>
                                        <input type="radio" name="pgender<?= $index ?>" value="Mother" <?php
                                                                                                        if ($parent['Gender'] == "Mother") {
                                                                                                            echo "checked";
                                                                                                        }
                                                                                                        ?>> Mother
                                        <input type="radio" name="pgender<?= $index ?>" value="Father" <?php
                                                                                                        if ($parent['Gender'] == "Father") {
                                                                                                            echo "checked";
                                                                                                        }
                                                                                                        ?>> Father
                                        <input type="radio" name="pgender<?= $index ?>" value="Guardian" <?php
                                                                                                            if ($parent['Gender'] == "Guardian") {
                                                                                                                echo "checked";
                                                                                                            }
                                                                                                            ?>> Guardian

                                        <br>

                                        <label for="Firstname">Firstname</label> <span id="btk"> <input type="text" placeholder="" name="pfirstname" value="<?= $parent['First_Name']; ?>"></span>
                                        <label for="MI">MI</label> <span id="btk"> <input type="text" placeholder="" name="pmiddlename" value="<?= $parent['Middle_Name']; ?>"></span>

                                        <br>

                                        <label for="Surname">Surname</label> <span id="btk"> <input type="text" placeholder="" name="plastname" value="<?= $parent['Last_Name']; ?>"></span></br>

                                        <br>

                                        <label for="Role"></label> <span id="btk"> <input type="hidden" placeholder="" name="prole" value="Parent" readonly></span>
                                    </div>
                                    <div class="right">
                                        <div class="bsinfo1">
                                            <h4><i class="fa fa-phone" style="font-size:15px"></i>Contact Information</h4>

                                            <div class="info">
                                                <label for="TelephoneNumber">Telephone Number</label> <span id="btk"> <input type="number" placeholder="" name="telno" value="<?= $parent['Telephone_No']; ?>"></span>
                                                <br>
                                                <label for="MobileNumber">Mobile Number</label> <span id="btk"> <input type="number" placeholder="" name="mobileno" value="<?= $parent['Mobile_No']; ?>"></span>

                                                <!-- <br><label for="Email Address">Email Address</label> <span id="btk"> <input type="text" placeholder="" name="email" value=""></span> -->

                                            </div>
                                        </div>
                                        <div class="bsinfo2">
                                            <h4><i class="fa fa-map-marker" style="font-size:15px"> </i>Address</h4>
                                            <div class="info">
                                                <label for="Address">Address</label> <span id="btk"> <input type="text" placeholder="" name="address" value="<?= $parent['Address']; ?>"></span>
                                                <label for="City">City</label> <span id="btk"> <input type="text" placeholder="" name="city" value="<?= $parent['City']; ?>"></span>

                                                <br><label for="Province">Province</label> <span id="btk"> <input type="text" placeholder="" name="province" value="<?= $parent['Province']; ?>"></span>
                                                <label for="Postcode">Postcode</label> <span id="btk"> <input type="number" placeholder="" name="postcode" value="<?= $parent['Postcode']; ?>"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        } else {
                            echo "<h4>No Parent Information Available</h4>";
                        }
                    }
                    ?>
                </div>
        </form>

    </div>
</body>

</html>