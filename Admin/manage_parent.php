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
    <link rel="stylesheet" href="Manage_Parent.css">
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
                    <span class="icon"><img src="Images/sidebar_menu/Home.svg" alt=""></span>
                    <span class="title1" ><br>Home</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Excuse_Letter.php">
                    <span class="icon"><img src="Images/sidebar_menu/Excuse_slip.svg" alt=""></span>
                    <span class="title2" ><br>Excuse Slip</span>
                    </a>
                </li>
                <li><a href="">
                    <div class="dropdown1">
                        <span class="icon" style="padding-top: -100px;"><img src="Images/sidebar_menu/Manage_Users.svg" alt=""></span>
                        <a class="dropbtn1" style="margin-top: -40px;">
                            <span class="titlea">Manage Users</span>
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
                    <span class="icon"><img src="Images/sidebar_menu/Announcement.svg" alt=""></span>
                    <span class="title" ><br>Annoucement</span>
                    </a>
                </li>
                <li>
                    <a href="Student_Record.php">
                    <span class="icon"><img src="Images/sidebar_menu/Student_Record.svg" alt=""></span>
                    <span class="title" ><br>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Concern.php">
                    <span class="icon"><img src="Images/sidebar_menu/Concerns.svg" alt=""></span>
                    <span class="title3" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Inquiries.php">
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
                      <h1>Add Parent</h1>
                     <h4> Step 2: Parent Information</h4>
                     <form action="code.php" method="POST">
                     <span class="create">
                            <input type="submit" name="save_parent" class="btn btn-primary btn-lg" value="Create" style="position:absolute;margin-top: -80px; margin-left: 1000px;">
                        </span>
                    </div>
                  
                    <div class="bsinfo">
                        <h4><i class='fa fa-user-circle'></i>Basic Information</h4>
                        <div class="info">
                           <br>
                         <label for="Firstname">Firstname<span class="asterisk"> *</span></label>  <span id="btk"> <input type="text" placeholder="" name="pfirstname" required></span>
                      <label for="MI">MI</label> <span id="btk"> <input type="text" placeholder="" name="pmiddlename"></span>
                           <label for="Surname">Surname<span class="asterisk"> *</span></label> <span id="btk"> <input type="text" placeholder="" name="plastname" required></span>
                           <br>
                           
                           <label for="Gender">Parents</label>
                          <input type="radio" name="pgender" value="Mother">Mother
                          <input type="radio" name="pgender" value="Father">Father
                          <input type="radio" name="pgender" value="Guardian">Guardian
                      <br>
                       <label for="Email">Email<span class="asterisk"> *</span></label> <span id="btk"> <input type="email" placeholder="" name="pemail" required></span>
                           <label for="Role"></label> <span id="btk"> <input type="hidden" placeholder="" name="prole" value="Parent" readonly></span>
                 
                        </div>
                       
                        <div class="info">
                           
                         <label for="Firstname">Firstname<span class="asterisk"> *</span></label> <span id="btk"> <input type="text" placeholder="" name="tfirstname" required></span>
                      <label for="MI">MI</label> <span id="btk"> <input type="text" placeholder="" name="tmiddlename"></span>
                           <label for="Surname">Surname<span class="asterisk"> *</span></label> <span id="btk"> <input type="text" placeholder="" name="tlastname" required></span>
                           <br>
                           
                           <label for="Gender">Parents</label>
                          <input type="radio" name="tgender" value="Mother">Mother
                          <input type="radio" name="tgender" value="Father">Father
                          <input type="radio" name="tgender" value="Guardian">Guardian
                     
                           <label for="Role"></label> <span id="btk"> <input type="hidden" placeholder="" name="prole" value="Parent" readonly></span>
                 
                        </div>


                    </div>
                </div>
                
<br>
</br>
                <div class="bsinfo1" >
                        <h4><i class="fa fa-phone" style="font-size:15px"></i>Contact Information</h4>
                        <div class="info">
                           <label for="Telephone">Telephone Number</label> <span id="btk"> <input type="number" placeholder="" name="ptelno"></span>
                           <br>
                            <label for="Mobile">Mobile Number</label> <span id="btk"> <input type="number" placeholder="" name="pmobileno"></span>
                      
                       
                    </div>
                </div>
                </div>
<br>
</br>
                <div class="bsinfo2">
                        <h4><i class="fa fa-map-marker" style="font-size:15px"> </i>Address</h4>
                        <div class="info">
                           <label for="Address">Address</label> <span id="btk"> <input type="text" placeholder="" name="paddress"></span>
                            <label for="City">Municipality</label> <span id="btk"> <input type="text" placeholder="" name="pcity" ></span>
                      
                      <br><label for="Province">Province</label> <span id="btk"> <input type="text" placeholder="" name="pprovince"></span>
                       <label for="Postcode">Postcode</label> <span id="btk"> <input type="number" placeholder="" name="ppostcode"></span>
                    </div>
                 
                </div>
                </div>
         <br>
</br>                      
                        </form>
                    