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
if(window.history.replaceState) 
{
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
                            <a href="Lists_of_Subjects.php">Subjects</a>
                            <a href="Lists_of_Section.php">Sections</a>
                            <a href="Lists_of_Schedule.php">Classes</a>
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
                    <h2>My User</h2>
                </div>
                <div class="icons">
                    <i class="fa fa-bell"></i>
                    <i class="fa fa-search"></i>

                </div>
                <div class="icons1">
                    <h3>Admin</h3>
                    <i class="fa fa-angle-down"></i></div>
                </div>
          
            
                </div>
                <div class="main1">
                    <div class="title2" >
                    <?php include('message.php'); ?>
                      <h1>Update Student</h1>
                     <h4> Step 1: Student Information</h4>
                     <form action="code.php" method="POST">
                     <span class="create"> 
                            <input type="submit" name="update_student" class="btn btn-primary btn-lg" value="Update" style=" position: relative;margin-top: -1000px; margin-left: 1000px;">
                        </span>
                    </div>
                  
                    <div class="bsinfo">
                    <?php
                                    if(isset($_GET['id']))
                                    {
                                        $student_id = mysqli_real_escape_string($link, $_GET['id']);
                                        $query = "SELECT * FROM student WHERE Student_ID='$student_id' ";
                                        $query_run = mysqli_query($link, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            $student = mysqli_fetch_array($query_run);
                                            ?>
                        <h4><i class='fa fa-user-circle'></i>Basic Information</h4>

                        <div class="info">
                        
                            <label for="StudentNo">Student No</label> <span id="btk"> <input type="text" placeholder="" name="studentno" value="<?= $student['Student_ID']; ?>" readonly></span>

                            <label for="Birthday">Birth Date</label>
                            <input type="date" id="Birthdayy" name="birthday" value="<?= $student['Birthdate']; ?>">
                        <br>
                        <label for="Gender">Gender</label>
                        <input type="radio" name="gender" value="Male"
                        <?php 
                            if($student['Gender'] == "Male")
                            {
                                echo "checked";
                            }
                        ?>> Male
                        <input type="radio" name="gender" value="Female"
                        <?php 
                            if($student['Gender'] == "Female")
                            {
                                echo "checked";
                            }
                        ?>> Female
                      

                         <br>

                          <label for="Firstname">Firstname</label> <span id="btk"> <input type="text" placeholder="" name="firstname" value="<?= $student['First_Name']; ?>"></span>

                      <label for="MI">MI</label> <span id="btk"> <input type="text" placeholder="" name="middlename" value="<?= $student['Middle_Name']; ?>"></span>

                           <label for="Surname">Surname</label> <span id="btk"> <input type="text" placeholder="" name="lastname" value="<?= $student['Last_Name']; ?>"></span>
                        </br>
                      
                        <label for="Year">Year Level</label> <span id="btk"> <input type="text" placeholder="" name="yrlvl" value="<?= $student['Year_Level']; ?>"></span>
                        <br>
                         <label for="Section">Section</label> <span id="btk"> <input type="text" placeholder="" name="section" value="<?= $student['Section']; ?>"></span>

                         <!-- <label for="Password">Password</label> <span id="btk"> <input type="text" placeholder="" name="password" value=""></span> -->
                        </br>

                    <label for="Strand">Strand</label>
                  <label for="Strand" name = "Strand"></label>
                <select class="Strand" name="Strand">
                    <option value="<?= $student['Strand']; ?>"></option>
                    <option value="STEM" 
                    <?php 
                        if($student['Strand'] == "STEM")
                        {
                            echo "selected";
                        }
                    ?>>STEM</option>
                    <option value="HUMSS" 
                    <?php 
                        if($student['Strand'] == "HUMSS")
                        {
                            echo "selected";
                        }
                    ?>>HUMSS</option>
                    <option value="ABM" 
                    <?php 
                        if($student['Strand'] == "ABM")
                        {
                            echo "selected";
                        }
                    ?>>ABM</option>
                    <option value="ICT" 
                    <?php 
                        if($student['Strand'] == "ICT")
                        {
                            echo "selected";
                        }
                    ?>>ICT</option>
                    <option value="GAS" 
                    <?php 
                        if($student['Strand'] == "GAS")
                        {
                            echo "selected";
                        }
                    ?>>GAS</option>
                    <option value="TVL" 
                    <?php 
                        if($student['Strand'] == "TVL")
                        {
                            echo "selected";
                        }
                    ?>>TVL</option>
                    
                </select>

                <label for="Role"></label> <span id="btk"> <input type="hidden" placeholder="" name="role" value="Student" readonly></span>
                        </div>

                    </div>
                </div>
                </div> 
<br>
</br>
                <div class="bsinfo1">
                        <h4><i class="fa fa-phone" style="font-size:15px"></i>Contact Information</h4>
                        <div class="info">
                           <label for="TelephoneNumber">Telephone Number</label> <span id="btk"> <input type="text" placeholder="" name="telno" value="<?= $student['Telephone_No']; ?>"></span>
                           <br>
                            <label for="MobileNumber">Mobile Number</label> <span id="btk"> <input type="text" placeholder="" name="mobileno" value="<?= $student['Mobile_No']; ?>"></span>
                      
                      <!-- <br><label for="Email Address">Email Address</label> <span id="btk"> <input type="text" placeholder="" name="email" value=""></span> -->
                       
                    </div>
                </div>
                </div>
<br>
</br>
                <div class="bsinfo2">
                        <h4><i class="fa fa-map-marker" style="font-size:15px"> </i>Address</h4>
                        <div class="info">
                           <label for="Address">Address</label> <span id="btk"> <input type="text" placeholder="" name="address" value="<?= $student['Address']; ?>"></span>
                            <label for="City">City</label> <span id="btk"> <input type="text" placeholder="" name="city" value="<?= $student['City']; ?>"></span>
                      
                      <br><label for="Province">Province</label> <span id="btk"> <input type="text" placeholder="" name="province" value="<?= $student['Province']; ?>"></span>
                       <label for="Postcode">Postcode</label> <span id="btk"> <input type="text" placeholder="" name="postcode" value="<?= $student['Postcode']; ?>"></span>
                    </div>
                 
                </div>
                </div>
                        </form>
                        <?php
                    }
                    else
                    {
                        echo "<h4>No Such Id Found</h4>";
                    }
                }
                ?>
         