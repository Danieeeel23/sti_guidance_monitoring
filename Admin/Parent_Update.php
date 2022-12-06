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
    <link rel="stylesheet" href="Parent_Update.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <title>Update Parent</title>
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
                    <div class="title2">
                    <?php include('message.php'); ?>
                      <h1>Add Parent</h1>
                     <h4> Step 2: Parent Information</h4>
                     <span class="create">
                     <form action="code.php" method="POST">
                            <input type="submit" name="update_parent" class="btn btn-primary btn-lg" value="Update" style=" position:absolute; margin-top: -80px; margin-left: 1000px;">
                        </span>
                    </div>
                  
                    <div class="bsinfo">
                    <h4><i class='fa fa-user-circle'></i>Basic Information</h4>
                        <div class="info">
                    <?php
                                    if(isset($_GET['id']))
                                    {
                                        $parent_id = mysqli_real_escape_string($link, $_GET['id']);
                                        $query = "SELECT * FROM parent WHERE Parent_ID='$parent_id' ";
                                        $query_run = mysqli_query($link, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            $parent = mysqli_fetch_array($query_run);
                                            ?>
                        

                        <label for="Student No">Parent No</label> <span id="btk"> <input type="text" placeholder="" name="parent_id" value="<?= $parent['Parent_ID']; ?>" readonly></span>
                        
                            
                          
                            <label for="Gender">Parents</label>
                          <input type="radio" name="pgender" value="Mother"
                          <?php 
                                    if($parent['Gender'] == "Mother")
                                    {
                                        echo "checked";
                                    }
                                ?>> Mother
                          <input type="radio" name="pgender" value="Father"
                          <?php 
                                    if($parent['Gender'] == "Father")
                                    {
                                        echo "checked";
                                    }
                                ?>> Father
                            <input type="radio" name="pgender" value="Guardian"
                          <?php 
                                    if($parent['Gender'] == "Guardian")
                                    {
                                        echo "checked";
                                    }
                                ?>> Guardian
                        
                         <br> <label for="Firstname">Firstname</label> <span id="btk"> <input type="text" placeholder="" name="pfirstname" value="<?= $parent['First_Name']; ?>"></span>
                      <label for="MI">MI</label> <span id="btk"> <input type="text" placeholder="" name="pmiddlename" value="<?= $parent['Middle_Name']; ?>"></span>
                           <label for="Surname">Surname</label> <span id="btk"> <input type="text" placeholder="" name="plastname" value="<?= $parent['Last_Name']; ?>"></span></br>
                      <br> 
                           <label for="Role"></label> <span id="btk"> <input type="hidden" placeholder="" name="prole" value="Parent" readonly></span>
                 
                        </div>

                    </div>
                </div>
                </div>
                
<br>
</br>
                <div class="bsinfo1" >
                        <h4><i class="fa fa-phone" style="font-size:15px"></i>Contact Information</h4>
                        <div class="info">
                           <label for="Telephone ">Telephone Number</label> <span id="btk"> <input type="number" placeholder="" name="ptelno" value="<?= $parent['Telephone_No']; ?>"></span>
                           <br>
                            <label for="Mobile">Mobile Number</label> <span id="btk"> <input type="number" placeholder="" name="pmobileno" value="<?= $parent['Mobile_No']; ?>"></span>
                      
                       
                    </div>
                </div>
                </div>
<br>
</br>
                <div class="bsinfo2">
                        <h4><i class="fa fa-map-marker" style="font-size:15px"> </i>Address</h4>
                        <div class="info">
                           <label for="Address">Address</label> <span id="btk"> <input type="text" placeholder="" name="paddress" value="<?= $parent['Address']; ?>"></span>
                            <label for="City">Municipality</label> <span id="btk"> <input type="text" placeholder="" name="pcity" value="<?= $parent['City']; ?>"></span>
                      
                      <br><label for="Province">Province</label> <span id="btk"> <input type="text" placeholder="" name="pprovince" value="<?= $parent['Province']; ?>"></span>
                       <label for="Postcode">Postcode</label> <span id="btk"> <input type="number" placeholder="" name="ppostcode" value="<?= $parent['Postcode']; ?>"></span>
                    </div>
                 
                </div>
                </div>
                <?php
                        }
                        else
                        {
                            echo "<h4>No Such Id Found</h4>";
                        }
                    }
                    ?>
         <br>
</br>                      
                        </form>
                </body>
                </html>
                    