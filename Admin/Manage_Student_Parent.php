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
    <link rel="stylesheet" href="Manage_Student_Parent.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <title>Add Student & Parent</title>
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
                <li>
                    <a href="">
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
                    <a href="Lists_of_Concern.php">
                    <span class="icon"><img src="images/sidebar_menu/Concerns.svg" alt=""></span>
                    <span class="title3" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Inquiries.php">
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
                      <h1>Add Student</h1>
                     <h4> Step 1: Student Information</h4>
                    </div>
                  
                    <div class="bsinfo">
                    <form action="code.php" method="POST">
                        <h4><i class='fa fa-user-circle'></i>Basic Information</h4>

                        <div class="info">
                        
                            <label for="Student No">Student No</label> <span id="btk"> <input type="text" placeholder="" name="studentno" required></span>

                            <label for="Birthday">Birth Date</label>
                            <input type="date" id="Birthdayy" name="birthday" value="">
                          
                        <label for="Gender">Sex</label>
                        <input type="radio" name="gender" value="Male"> Male
                        <input type="radio" name="gender" value="Female"> Female

                         <br>

                          <label for="Firstname">Firstname</label> <span id="btk"> <input type="text" placeholder="" name="firstname"></span>

                      <label for="MI">MI</label> <span id="btk"> <input type="text" placeholder="" name="middlename"></span>

                           <label for="Surname">Surname</label> <span id="btk"> <input type="text" placeholder="" name="lastname"></span>
                        </br>
                      <br> 
                        <label for="Year Level">Year Level</label> <span id="btk"> <input type="text" placeholder="" name="yrlvl"></span>

                         <label for="Section">Section</label> <span id="btk"> <input type="text" placeholder="" name="section"></span>

                         <label for="Password">Password</label> <span id="btk"> <input type="text" placeholder="" name="password" required></span>
                        </br>

                    <label for="Strand">Strand</label>
                  <label for="Strand" name = "Strand"></label>
                <select class="Strand" name="Strand">
                    <option value="0"></option>
                    <option value="STEM">STEM</option>
                    <option value="HUMSS">HUMSS</option>
                    <option value="ABM">ABM</option>
                    <option value="ICT">ICT</option>
                   <option value="GAS">GAS</option>
                    <option value="TVL">TVL</option>

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
                           <label for="Telephone Number">Telephone Number</label> <span id="btk"> <input type="text" placeholder="" name="telno"></span>
                            <label for="Mobile Number">Mobile Number</label> <span id="btk"> <input type="text" placeholder="" name="mobileno"></span>
                      
                      <br><label for="Email Address">Email Address</label> <span id="btk"> <input type="text" placeholder="" name="email" required></span>
                       
                    </div>
                </div>
                </div>
<br>
</br>
                <div class="bsinfo2">
                        <h4><i class="fa fa-map-marker" style="font-size:15px"> </i>Address</h4>
                        <div class="info">
                           <label for="Address">Address</label> <span id="btk"> <input type="text" placeholder="" name="address"></span>
                            <label for="City">City</label> <span id="btk"> <input type="text" placeholder="" name="city" ></span>
                      
                      <br><label for="Province">Province</label> <span id="btk"> <input type="text" placeholder="" name="province"></span>
                       <label for="Postcode">Postcode</label> <span id="btk"> <input type="text" placeholder="" name="postcode"></span>
                    </div>
                 
                </div>
                </div>
         <br>
</br>
<div class="main2">
                    <div class="title3" >
                      <h1>Add Parent</h1>
                     <h4> Step 2: Parent Information</h4>
                    </div>
                  
                    <div class="bsinfo5">
                        <h4><i class='fa fa-user-circle'></i>Basic Information</h4>
                        <div class="info">
                           <label for="Student No">Parent No</label> <span id="btk"> <input type="text" placeholder="" name="parent_id" required></span>
                            <label for="Birthday">Birth Date</label>
                            <input type="date" id="Birthday" name="pbirthday" value="">
                          
                           <label for="Gender">Parents</label>
                          <input type="radio" name="pgender" value="Mother"> Mother
                          <input type="radio" name="pgender" value="Father"> Father
                         <br> <label for="Firstname">Firstname</label> <span id="btk"> <input type="text" placeholder="" name="pfirstname" ></span>
                      <label for="MI">MI</label> <span id="btk"> <input type="text" placeholder="" name="pmiddlename"></span>
                           <label for="Surname">Surname</label> <span id="btk"> <input type="text" placeholder="" name="plastname"></span></br>
                      <br> <label for="Email Address">Email</label> <span id="btk"> <input type="text" placeholder="" name="pemail" required></span>
                           <label for="Password">Password</label> <span id="btk"> <input type="text" placeholder="" name="ppassword" required></span>
                           <label for="Role"></label> <span id="btk"> <input type="hidden" placeholder="" name="prole" value="Parent" readonly></span>
                 
                        </div>

                    </div>
                </div>
                
<br>
</br>
                <div class="bsinfo1" style="height: 190px;">
                        <h4><i class="fa fa-phone" style="font-size:15px"></i>Contact Information</h4>
                        <div class="info">
                           <label for="Telephone Number">Telephone Number</label> <span id="btk"> <input type="text" placeholder="" name="ptelno"></span>
                            <label for="Mobile Number">Mobile Number</label> <span id="btk"> <input type="text" placeholder="" name="pmobileno"></span>
                      
                       
                    </div>
                </div>
                </div>
<br>
</br>
                <div class="bsinfo2">
                        <h4><i class="fa fa-map-marker" style="font-size:15px"> </i>Address</h4>
                        <div class="info">
                           <label for="Address">Address</label> <span id="btk"> <input type="text" placeholder="" name="paddress"></span>
                            <label for="City">City</label> <span id="btk"> <input type="text" placeholder="" name="pcity" ></span>
                      
                      <br><label for="Province">Province</label> <span id="btk"> <input type="text" placeholder="" name="pprovince"></span>
                       <label for="Postcode">Postcode</label> <span id="btk"> <input type="text" placeholder="" name="ppostcode"></span>
                    </div>
                 
                </div>
                </div>
         <br>
</br>
          <div class="bot">
                        <span class="create"> 
                            <input type="submit" name="save_student_parent" class="btn btn-primary btn-lg" value="Create" style="margin-top: -50px; margin-left: 1px;">
                        </span>
                        </form>
                    </div>

            

   
</body>
</html>