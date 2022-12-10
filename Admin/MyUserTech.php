<?php
session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--font-->
    <link rel="stylesheet" href="MyUserTech.css">
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
                <li>
                    <a href="">
                    <span class="icon"><img src="Images/sidebar_menu/Manage_Users.svg" alt=""></span>
                    <span class="title" ><br>Manage Users</span>
                    </a>
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
                    <a href="Lists_of_Concerns.php">
                    <span class="icon"><img src="Images/sidebar_menu/Concerns.svg" alt=""></span>
                    <span class="title3" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Inquiry.php">
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
                      <h1>Add Teacher</h1>
                     <h4> Step 1: Teacher Information</h4>
                     <span class="create">
                     <form action="code.php" method="POST">
                            <input type="submit" name="save_teacher" class="btn btn-primary btn-lg" value="Create" style=" position:relative;margin-top: -80px; margin-left: 1000px;">
                        </span>
                    </div>
                  
                    <div class="bsinfo">
                    
                        <h4><i class='fa fa-user-circle'></i>Basic Information</h4>

                        <div class="info">

                          <label for="Firstname">First Name<span class="asterisk"> *</span></label> <span id="btk"> <input type="text" placeholder="" name="tfirstname" autocomplete="off" required></span>

                      <label for="MI">MI</label> <span id="btk"> <input type="texta" placeholder="" name="tmiddlename" autocomplete="off"></span>

                           <label for="Surname">Surname<span class="asterisk"> *</span></label> <span id="btk"> <input type="text" placeholder="" name="tlastname" autocomplete="off" required></span>
                        
                        
                      <br> 
                        <label for="Email">Email<span class="asterisk"> *</span></label> <span id="btk"> <input type="email" placeholder="" name="temail" autocomplete="off" required></span>

                       
    

                    <label for="Strand">Department</label>
                 
                <select class="Strand" name="Department"id="department">
                    <option value="0">Department</option>
                    <option value="HECA">HECA</option>
                    <option value="ABM">ABM</option>
                    <option value="ICT">ICT</option>  
                             
                </select>
                <span id="btk"> <input type="hidden" placeholder="" name="trole" value="Teacher" readonly></span> 
                <br>
                        <label for="Gender">Gender</label>
                        <input type="radio" name="tgender" value="Male"> Male
                        <input type="radio" name="tgender" value="Female"> Female
                        </div>

                    </div>
                </div>
                </div>
<br>
</br>
                <div class="bsinfo1" >
                        <h4><i class="fa fa-phone" style="font-size:15px"></i>Contact Information</h4>
                        <div class="info">
                           <label for="Telephone">Telephone Number</label> <span id="btk"> <input type="number" placeholder="" name="ttelno" autocomplete="off"></span>
                           <br>
                            <label for="Mobile">Mobile Number</label> <span id="btk"> <input type="number" placeholder="" name="tmobileno" autocomplete="off"></span>
                       
                    </div>
                </div>
                </div>
<br>
</br>
                <div class="bsinfo2">
                        <h4><i class="fa fa-map-marker" style="font-size:15px"> </i>Address</h4>
                        <div class="info">
                           <label for="Address">Address</label> <span id="btk"> <input type="text" placeholder="" name="taddress" autocomplete="off"></span>
                            <label for="City">Municipality</label> <span id="btk"> <input type="text" placeholder="" name="tcity" autocomplete="off"></span>
                      
                      <br><label for="Province">Province</label> <span id="btk"> <input type="text" placeholder="" name="tprovince" autocomplete="off"></span>
                       <label for="Postcode">Postcode</label> <span id="btk"> <input type="number" placeholder="" name="tpostcode" autocomplete="off"></span>
                    </div>
            

                 
                </div>
                </div>

          
                       
                    </form>
                    

            

   
</body>
</html>