<?php
session_start();
require 'config.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--font-->
    <link rel="stylesheet" href="MyUserTechUpdate.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <title>Update Teacher</title>
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
                    <span class="title" ><br>Annoucement</span>
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
                    <div class="title2">
                    <?php include('message.php'); ?>
                      <h1>Update Teacher</h1>
                     <h4> Step 1: Teacher Information</h4>
                    </div>
                  
                    <div class="bsinfo">
                    
                                <h4><i class='fa fa-user-circle'></i>Basic Information</h4>

                                <div class="info">
                                <?php
                                    if(isset($_GET['id']))
                                    {
                                        $teacher_id = mysqli_real_escape_string($link, $_GET['id']);
                                        $query = "SELECT * FROM teacher WHERE Teacher_ID='$teacher_id' ";
                                        $query_run = mysqli_query($link, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            $teacher = mysqli_fetch_array($query_run);
                                            ?>
                                <form action="code.php" method="POST">
                                
                                <label for="Student No">Teacher No</label> <span id="btk"> <input type="text" placeholder="" name="teacher_id" value="<?= $teacher['Teacher_ID']; ?>" readonly></span>
                                <label for="Student No"></label> <span id="btk"> <input type="hidden" placeholder="" name="credential_id" value="<?= $teacher['Credential_ID']; ?>" readonly></span>

                                <label for="">Birth Date</label>
                                <input type="date" id="Birthday" name="tbirthday" value="<?= $teacher['Birthdate']; ?>">
                                
                                <label for="Gender">Gender</label>
                                <input type="radio" name="tgender" value="Male"
                                <?php 
                                    if($teacher['Gender'] == "Male")
                                    {
                                        echo "checked";
                                    }
                                ?>> Male
                                <input type="radio" name="tgender" value="Female"
                                <?php 
                                    if($teacher['Gender'] == "Female")
                                    {
                                        echo "checked";
                                    }
                                ?>> Female
                                <input type="radio" name="tgender" value="Other"
                                <?php 
                                    if($teacher['Gender'] == "Other")
                                    {
                                        echo "checked";
                                    }
                                ?>> Other

                                <br>

                                <label for="Firstname">First Name</label> <span id="btk"> <input type="text" placeholder="" name="tfirstname" value="<?= $teacher['First_Name']; ?>"></span>

                            <label for="MI">Middle Name</label> <span id="btk"> <input type="text" placeholder="" name="tmiddlename" value="<?= $teacher['Middle_Name']; ?>"></span>

                                <label for="Surname">Surname</label> <span id="btk"> <input type="text" placeholder="" name="tlastname" value="<?= $teacher['Last_Name']; ?>"></span>
                                </br>
                            <br> 
                                <label for="Year Level">Email</label> <span id="btk"> <input type="text" placeholder="" name="temail" value="<?= $teacher['Email']; ?>" required></span>

                                <label for="Section">Password</label> <span id="btk"> <input type="text" placeholder="" name="tpassword" value="<?= $teacher['Password']; ?>" required></span>

                                <label for="Role">Role</label> <span id="btk"> <input type="text" placeholder="" name="trole" value="Teacher" readonly></span>
                            
                                </br>

                            <label for="Strand">Department</label>
                        <label for="Strand" name = "Department"></label>
                        <select class="Strand" name="Department">
                            <option value="<?= $teacher['Department']; ?>"></option>
                            <option value="STEM"
                            <?php 
                                if($teacher['Department'] == "STEM")
                                {
                                    echo "selected";
                                }
                            ?>>STEM</option>
                            <option value="ABM"
                            <?php 
                                if($teacher['Department'] == "ABM")
                                {
                                    echo "selected";
                                }
                            ?>>ABM</option>
                            <option value="ICT"
                            <?php 
                                if($teacher['Department'] == "ICT")
                                {
                                    echo "selected";
                                }
                            ?>>ICT</option>
                            <option value="GAS"
                            <?php 
                                if($teacher['Department'] == "GAS")
                                {
                                    echo "selected";
                                }
                            ?>>GAS</option>
                            <option value="TVL"
                            <?php 
                                if($teacher['Department'] == "TVL")
                                {
                                    echo "selected";
                                }
                            ?>>TVL</option>
                            
                        </select>
                
                                </div>

                            </div>
                        </div>
                        </div>
        <br>
        </br>
                        <div class="bsinfo1" style="height: 190px;">
                                <h4><i class="fa fa-phone" style="font-size:15px"></i>Contact Information</h4>
                                <div class="info">
                                <label for="Telephone Number">Telephone Number</label> <span id="btk"> <input type="text" placeholder="" name="ttelno" value="<?= $teacher['Telephone_No']; ?>"></span>
                                    <label for="Mobile Number">Mobile Number</label> <span id="btk"> <input type="text" placeholder="" name="tmobileno" value="<?= $teacher['Mobile_No']; ?>"></span>
                            
                            </div>
                        </div>
                        </div>
        <br>
        </br>
                        <div class="bsinfo2">
                                <h4><i class="fa fa-map-marker" style="font-size:15px"> </i>Address</h4>
                                <div class="info">
                                <label for="Address">Address</label> <span id="btk"> <input type="text" placeholder="" name="taddress" value="<?= $teacher['Address']; ?>"></span>
                                    <label for="City">City</label> <span id="btk"> <input type="text" placeholder="" name="tcity" value="<?= $teacher['City']; ?>"></span>
                            
                            <br><label for="Province">Province</label> <span id="btk"> <input type="text" placeholder="" name="tprovince" value="<?= $teacher['Province']; ?>"></span>
                            <label for="Postcode">Postcode</label> <span id="btk"> <input type="text" placeholder="" name="tpostcode" value="<?= $teacher['Postcode']; ?>"></span>
                            </div>
                    

                        
                        </div>
                        </div>

                <div class="bot">
                                <span class="create">
                                    <input type="submit" name="update_teacher" class="btn btn-primary btn-lg" value="Update" style="margin-top: 25px; margin-left: 1px;">
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
                
            

   
</body>
</html>