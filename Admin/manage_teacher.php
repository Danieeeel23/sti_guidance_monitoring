<?php
session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--font-->
    <link rel="stylesheet" href="Manage_Teacher.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <title>Add Teacher</title>
</head>
<!-- DISABLE CONFIRM SUBMIT RESUBMISSION -->
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
                <li>
                    <a href="Manage_User.php">
                    <span class="icon"><img src="images/sidebar_menu/Manage_Users.svg" alt=""></span>
                    <span class="title" ><br>Manage Users</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Announcement.php">
                    <span class="icon"><img src="images/sidebar_menu/Announcement.svg" alt=""></span>
                    <span class="title" ><br>Annoucement</span>
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
                    <div class="title2">
                    <?php include('message.php'); ?>
                      <h1>Add Teacher</h1>
                     <h4> Step 1: Teacher Information</h4>
                     <span class="create">
                     <form action="code.php" method="POST">
                            <input type="submit" name="save_teacher" class="btn btn-primary btn-lg" value="Create" style="position:relative;margin-top: 10px; margin-left: 1000px;">
                        </span>
                    </div>
                  
                    <div class="bsinfo">
                        <h4><i class='fa fa-user-circle'></i>Basic Information</h4>

                        <div class="info">

                          

                            <label for="Student No">Teacher No</label> <span id="btk"> <input type="text" placeholder="" name="teacher_id" required></span>

                            <label for="">Birth Date</label>
                        <input type="date" id="Birthday" name="tbirthday">
                          
                        <label for="Gender">Gender</label>
                        <input type="radio" name="tgender" value="Male"> Male
                        <input type="radio" name="tgender" value="Female"> Female
                        <input type="radio" name="tgender" value="Other"> Other

                         <br>

                          <label for="Firstname">First Name</label> <span id="btk"> <input type="text" placeholder="" name="tfirstname" autocomplete="off"></span>

                      <label for="MI">Middle Name</label> <span id="btk"> <input type="text" placeholder="" name="tmiddlename" autocomplete="off"></span>

                           <label for="Surname">Surname</label> <span id="btk"> <input type="text" placeholder="" name="tlastname" autocomplete="off"></span>
                        </br>
                      <br> 
                        <label for="Year Level">Email</label> <span id="btk"> <input type="text" placeholder="" name="temail" autocomplete="off" required></span>

                         <label for="Section">Password</label> <span id="btk"> <input type="text" placeholder="" name="tpassword" autocomplete="off" required></span>

                         <label for="Role"></label> <span id="btk"> <input type="hidden" placeholder="" name="trole" value="Teacher" readonly></span>
                       
                        </br>

                    <label for="Strand">Department</label>
                  <label for="Strand" name = "Department"></label>
                <select class="Strand" name="Department">
                    <option value="0">Department</option>
                    <option value="STEM">STEM</option>
                    <option value="ABM">ABM</option>
                    <option value="ICT">ICT</option>
                    <option value="GAS">GAS</option>
                    <option value="TVL">TVL</option>
                    
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
                           <label for="Telephone Number">Telephone Number</label> <span id="btk"> <input type="text" placeholder="" name="ttelno" autocomplete="off"></span>
                            <label for="Mobile Number">Mobile Number</label> <span id="btk"> <input type="text" placeholder="" name="tmobileno" autocomplete="off"></span>
                       
                    </div>
                </div>
                </div>
<br>
</br>
                <div class="bsinfo2">
                        <h4><i class="fa fa-map-marker" style="font-size:15px"> </i>Address</h4>
                        <div class="info">
                           <label for="Address">Address</label> <span id="btk"> <input type="text" placeholder="" name="taddress" autocomplete="off"></span>
                            <label for="City">City</label> <span id="btk"> <input type="text" placeholder="" name="tcity" autocomplete="off"></span>
                      
                      <br><label for="Province">Province</label> <span id="btk"> <input type="text" placeholder="" name="tprovince" autocomplete="off"></span>
                       <label for="Postcode">Postcode</label> <span id="btk"> <input type="text" placeholder="" name="tpostcode" autocomplete="off"></span>
                    </div>
            

                 
                </div>
                </div>

         
                        
                    </form>
                   

            

   
</body>
</html>