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
    <link rel="stylesheet" href="MyUser.css">
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
                    <a href="dash.html">
                    <span class="icon"><img src="Images/sidebar_menu/Home.svg" alt=""></span>
                    <span class="title1" ><br>Home</span>
                    </a>
                </li>
                <li>
                    <a href="listofexcuseletter.html">
                    <span class="icon"><img src="Images/sidebar_menu/Excuse_slip.svg" alt=""></span>
                    <span class="title2" ><br>Excuse Slip</span>
                    </a>
                </li>
                <li>
                    <a href="">
                    <span class="icon"><img src="Images/sidebar_menu/Manage_Users.svg" alt=""></span>
                    <span class="title" ><br>Manage Users</span>
                    </a>
                </li>
                <li>
                    <a href="listofannoucement.html">
                    <span class="icon"><img src="Images/sidebar_menu/Announcement.svg" alt=""></span>
                    <span class="title" ><br>Announcement</span>
                    </a>
                </li>
                <li>
                    <a href="">
                    <span class="icon"><img src="Images/sidebar_menu/Student_Record.svg" alt=""></span>
                    <span class="title" ><br>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="listofconcerns.html">
                    <span class="icon"><img src="Images/sidebar_menu/Concerns.svg" alt=""></span>
                    <span class="title3" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="listofinquiries.html">
                    <span class="icon"><img src="Images/sidebar_menu/Inquiry.svg" alt=""></span>
                    <span class="title4" ><br>Inquiry</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="main">
            <span id="logo"><img src="Images/sti_logo.png" alt=""></span>
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
                    <form action="code.php" method="POST">
                        <h4><i class='fa fa-user-circle'></i>Basic Information</h4>

                        <div class="info">
                        
                            <label for="Student No">Student No</label> <span id="btk"> <input type="text" placeholder="" name="studentno" value="<?= $student['Student_ID']; ?>" readonly></span>

                            <label for="Birthday">Birth Date</label>
                            <input type="date" id="Birthdayy" name="birthday" value="<?= $student['Birthdate']; ?>">
                          
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
                        <input type="radio" name="gender" value="Other"
                        <?php 
                            if($student['Gender'] == "Other")
                            {
                                echo "checked";
                            }
                        ?>> Other

                         <br>

                          <label for="Firstname">Firstname</label> <span id="btk"> <input type="text" placeholder="" name="firstname" value="<?= $student['First_Name']; ?>"></span>

                      <label for="MI">MI</label> <span id="btk"> <input type="text" placeholder="" name="middlename" value="<?= $student['Middle_Name']; ?>"></span>

                           <label for="Surname">Surname</label> <span id="btk"> <input type="text" placeholder="" name="lastname" value="<?= $student['Last_Name']; ?>"></span>
                        </br>
                      <br> 
                        <label for="Year Level">Year Level</label> <span id="btk"> <input type="text" placeholder="" name="yrlvl" value="<?= $student['Year_Level']; ?>"></span>

                         <label for="Section">Section</label> <span id="btk"> <input type="text" placeholder="" name="section" value="<?= $student['Section']; ?>"></span>

                         <label for="Password">Password</label> <span id="btk"> <input type="text" placeholder="" name="password" value="<?= $student['Password']; ?>"></span>
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
                  
                  <label for="Day">Day</label>
                  <label for="Day" name = "Day"></label>
                <select class="Day" name="Day">
                    <option value="<?= $student['Day']; ?>"></option>
                    <option value="Sunday" 
                    <?php 
                        if($student['Day'] == "Sunday")
                        {
                            echo "selected";
                        }
                    ?>>Sunday</option>
                    <option value="Monday" 
                    <?php 
                        if($student['Day'] == "Monday")
                        {
                            echo "selected";
                        }
                    ?>>Monday</option>
                    <option value="Tuesday" 
                    <?php 
                        if($student['Day'] == "Tuesday")
                        {
                            echo "selected";
                        }
                    ?>>Tuesday</option>
                    <option value="Wednesday" 
                    <?php 
                        if($student['Day'] == "Wednesday")
                        {
                            echo "selected";
                        }
                    ?>>Wednesday</option>
                    <option value="Thursday" 
                    <?php 
                        if($student['Day'] == "Thursday")
                        {
                            echo "selected";
                        }
                    ?>>Thursday</option>
                    <option value="Friday" 
                    <?php 
                        if($student['Day'] == "Friday")
                        {
                            echo "selected";
                        }
                    ?>>Friday</option>
                    <option value="Saturday" 
                    <?php 
                        if($student['Day'] == "Saturday")
                        {
                            echo "selected";
                        }
                    ?>>Saturday</option>              
                </select>

                <label for="Role">Role</label> <span id="btk"> <input type="text" placeholder="" name="role" value="Student" readonly></span>
                        </div>

                    </div>
                </div>
                </div>
<br>
</br>
                <div class="bsinfo1">
                        <h4><i class="fa fa-phone" style="font-size:15px"></i>Contact Information</h4>
                        <div class="info">
                           <label for="Telephone Number">Telephone Number</label> <span id="btk"> <input type="text" placeholder="" name="telno" value="<?= $student['Telephone_No']; ?>"></span>
                            <label for="Mobile Number">Mobile Number</label> <span id="btk"> <input type="text" placeholder="" name="mobileno" value="<?= $student['Mobile_No']; ?>"></span>
                      
                      <br><label for="Email Address">Email Address</label> <span id="btk"> <input type="text" placeholder="" name="email" value="<?= $student['Email']; ?>"></span>
                       
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
                <div class="bot">
                        <span class="create"> 
                            <input type="submit" name="update_student" class="btn btn-primary btn-lg" value="Update" style="margin-top: -50px; margin-left: 1px;">
                        </span>
                        </form>
                        <?php
                    }
                    else
                    {
                        echo "<h4>No Such Id Found</h4>";
                    }
                }
                ?>
            </div>