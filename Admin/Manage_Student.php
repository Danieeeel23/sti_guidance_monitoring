<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--font-->
    <link rel="stylesheet" href="Manage_Student.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

    <title>Add Student & Parent</title>
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
                    <span class="icon"><img src="images/sidebar_menu/Excuse_slip.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title2" ><br>Excuse Slip</span>
                    </a>
                </li>
                <li><a href="">
                    <div class="dropdown1">
                        <span class="icon" style="padding-top: -100px;"><img src="images/sidebar_menu/Manage_Users.svg" alt=""></span>
                        <a class="dropbtn1" style="margin-top: -40px;">
                            <span class="titlea">Manage Users</span>
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
                    <a href="Lists_of_Concern.php">
                    <span class="icon"><img src="images/sidebar_menu/Concerns.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title3" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Inquiries.php">
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
                    <h2>My User</h2>
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
                    <div class="title2">
                    <?php include('message.php'); ?>
                      <h1>Add Student</h1>
                     <h4> Step 1: Student Information</h4>
                    </div>
                    <div class="bot">
                    <form action="code.php" method="POST">
                        <span class="create">
                            <input type="submit" name="save_student" class="btn btn-primary btn-lg" value="Next" style="margin-top: -50px; margin-left: 1px;">
                        </span>
                    </div>
                    <div class="bsinfo">
                        <h4><i class='fa fa-user-circle'></i>Basic Information</h4>

                        <div class="info">
                        
                            
                          <label for="Firstname">First Name<span class="asterisk"> *</span></label> <span id="btk"> <input type="text" style="margin-left: 17px;" placeholder="" name="firstname" required></span>

                          <label for="MI">MI</label> <span id="btk"> <input type="text" placeholder="" style="margin-left: 9px;"  name="middlename"></span>
                      
                           <label for="Surname">Surname<span class="asterisk"> *</span></label> <span id="btk"> <input type="text" placeholder="" style="margin-left: 7px;"  name="lastname" required></span>
                           <br>
                           <label for="Birthday">Birth Date</label>
                            <input type="date" id="Birthdayy" name="birthday" value="">
        
                        <label for="Gender">Sex</label>
                        <input type="radio" name="gender" value="Male"> Male
                        <input type="radio" name="gender" value="Female"> Female

                    <br>

                    <label for="Year">Year Level</label><span class="asterisk"> *</span>
                    <select class="Strand" placeholder="" name="yrlvl" required>
                        <option value="0">Choose Year Level</option>
                        <?php
                        $link = mysqli_connect("localhost", "root", "", "sti guidance monitoring");
                        $query = "SELECT * FROM `year_level`";
                        $query_run = mysqli_query($link, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $yrlvl) {
                        ?>
                                <option value="<?= $yrlvl['Year_Level']; ?>"><?= $yrlvl['Year_Level']; ?></option> <br>
                        <?php
                            }
                        } else {
                            echo "No Year Level Found";
                        }
                        ?>
                    </select>

                    <label for="Strand">Course/Strand</label><span class="asterisk"> *</span>
                    <select class="Strand" placeholder="" name="Strand" required>
                        <option value="0">Choose Course/Strand</option>
                        <?php
                        $link = mysqli_connect("localhost", "root", "", "sti guidance monitoring");
                        $query = "SELECT * FROM `strand`";
                        $query_run = mysqli_query($link, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $strand) {
                        ?>
                                <option value="<?= $strand['Name']; ?>"><?= $strand['Name']; ?></option> <br>
                        <?php
                            }
                        } else {
                            echo "No Teacher Found";
                        }
                        ?>
                    </select>
                    <!-- <label for="Section">Section</label> <span id="btk"> <input type="text" placeholder="" name="section"></span> -->

                    <label for="Section">Section</label><span class="asterisk"> *</span>
                    <select class="Strand" placeholder="" name="Section" required>
                        <option value="0">Choose Section</option>
                        <?php
                        $link = mysqli_connect("localhost", "root", "", "sti guidance monitoring");
                        $query = "SELECT * FROM `section`";
                        $query_run = mysqli_query($link, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $section) {
                        ?>
                                <option value="<?= $section['Section']; ?>"><?= $section['Section']; ?></option> <br>
                        <?php
                            }
                        } else {
                            echo "No Teacher Found";
                        }
                        ?>
                    </select>

                    <label for="Role"></label> <span id="btk"> <input type="hidden" placeholder="" name="role" value="Student" readonly></span>
                    <label for="Role"></label> <span id="btk"> <input type="hidden" placeholder="" name="credential" readonly></span>
                </div>

            </div>
        </div>
    </div>
    <br>
    </br>
    <div class="bsinfo1">
        <h4><i class="fa fa-phone" style="font-size:15px"></i>Contact Information</h4>
        <div class="info">
            <label for="Telephone">Telephone Number</label> <span id="btk"> <input type="number" placeholder="" name="telno"></span>
            <br>
            <label for="Mobile">Mobile Number</label> <span id="btk"> <input type="number" placeholder="" name="mobileno"></span>

            <br><label for="Email">Email Address<span class="asterisk"> *</span></label> <span id="btk"> <input type="email" placeholder="" name="email" required></span>

        </div>
    </div>
    </div>
    <br>
    </br>
    <div class="bsinfo2">
        <h4><i class="fa fa-map-marker" style="font-size:15px"> </i>Address</h4>
        <div class="info">
            <label for="Address">Address</label> <span id="btk"> <input type="text" placeholder="" name="address"></span>
            <label for="City">Municipality</label> <span id="btk"> <input type="text" placeholder="" name="city"></span>

            <br><label for="Province">Province</label> <span id="btk"> <input type="text" placeholder="" name="province"></span>
            <label for="Postcode">Postcode</label> <span id="btk"> <input type="number" placeholder="" name="postcode"></span>
        </div>

    </div>
    </div>
    <br>
    </br>
    </form>

</body>

</html>