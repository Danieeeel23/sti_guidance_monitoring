<?php
session_start();
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
     <!--font-->
    <link rel="stylesheet" href="View_Excuse_Letter.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href= "https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity= "sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
   
    <title>Content of Excuse Letter</title>
</head>
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
                    <a href="Lists_of_Concerns.php">
                    <span class="icon"><img src="images/sidebar_menu/Concerns.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title2" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Excuse_Letter.php">
                    <span class="icon"><img src="images/sidebar_menu/Excuse_slip.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title" ><br>Excuse Letter</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Violation.php">
                    <span class="icon"><img src="images/sidebar_menu/Mask group (7).svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title3" ><br>Violation</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Failing_Grades.php">
                    <span class="icon"><img src="images/sidebar_menu/Mask group (8).svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title4" ><br>Failing Grades</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Announcement.php">
                    <span class="icon"><img src="images/sidebar_menu/Mask group (9).svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title5" ><br>Announcement</span>
                    </a>
                </li>
                

            </ul>
        </div>
        <div class="main">
            <span id="logo"><img src="images/sti_logo.png" alt=""></span>
            <div class="topbar">
                <div class="toptitle">
                    <h2>Excuse Slip</h2>
                </div>
                <div class="icons">
                    <i class="fa fa-bell"></i>
                    <i class="fa fa-question-circle"></i>
                </div>
                <div class="dropdown">
                <?php 
                        $student_id = $_SESSION['student_id']; //session created from the credentials table that serves as the foreign key also
                        $query = "SELECT *, CONCAT(First_Name,' ',Last_Name) AS Names FROM `student` WHERE Student_ID='$student_id'"; //it compares the student id from the student table and student id from the credentials
                        $query_run = mysqli_query($link, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $student)
                            {
                                ?>
                    <button class="dropbtn"><?= $student['Names']; ?></button>
                    <div class="dropdown-content">
                    <a href="../logins/logout.php">Logout</a>
                </div>
                </div>
                </div>
                
                </div>
                <?php
                                }
                            }
                            else
                            {
                                
                            }
                        ?>
                <div class="main1">
                    <div class="title2">
                    <?php include('message.php'); ?>
                      <h1>Content of Excuse Letter</h1>
                     
                    </div>
                    <div class="bsinfo">
                        <h4>Basic Information</h4>
                        <div class="info">
                        <?php
                                    if(isset($_GET['id']))
                                    {
                                        $excuseletter_id = mysqli_real_escape_string($link, $_GET['id']);
                                        $query = "SELECT * FROM `excuse letter` WHERE Excuse_Letter_ID='$excuseletter_id' ";
                                        $query_run = mysqli_query($link, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            $excuse = mysqli_fetch_array($query_run);
                                            ?>
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                            <label for="Name">Student ID</label>
                            <span id="btk"> <input type="text" placeholder="" name="studentno" id="studentno" value="<?= $excuse['Student_ID']; ?>" readonly></span>
                            <span id="btk"> <input type="hidden" placeholder="" name="excuseletterno" id="excuseletterno" value="<?= $excuse['Excuse_Letter_ID']; ?>" readonly></span>
                            <span id="btk"> <input type="hidden" placeholder="" name="ecomments" id="ecomments" value="The Guidance Office Accepts This Excuse Letter" readonly></span>
                        
                            <br>
                            <label for="Name">Name</label>
                            <span id="btk"> <input type="text" placeholder=""  name="efirstname" id="firstname" value="<?= $excuse['Names']; ?>" readonly></span>
                            <label for="Name">Year</label>
                            <span id="btk"> <input type="text" placeholder=""  name="eyrlvl" id="yrlvl" value="<?= $excuse['Year_Level']; ?>" readonly></span>
                            <label for="Name">Strand</label>
                            <span id="btk"> <input type="text" placeholder=""  name="estrand" id="strand" value="<?= $excuse['Strand']; ?>" readonly></span>
                            <label for="Name">Section</label>
                            <span id="btk"> <input type="text" placeholder=""  name="esection" id="section" value="<?= $excuse['Section']; ?>" readonly></span>
                                          
                        <label for="Date">Start Date</label>
                        <input type="date" placeholder="Date" id="startdate" name="startdate" value="<?= $excuse['Start_Date']; ?>" readonly>

                        <label for="Date">End Date</label>
                        <input type="date" placeholder="Date" id="enddate" name="enddate" value="<?= $excuse['End_Date']; ?>" readonly>

                        </div>
                        
                    </div>
                    <div class="content">
                        <div class="coninfo">
                            <div id="textarea">
                                <label for="Description" name ="Description">Statement</label>

                                <textarea id="statement" name="statemen" value="" rows="20" cols="55" style="margin-top: 25px; box-shadow: 5px 5px 5px rgb(139, 134, 134);" readonly><?php echo $excuse['Description']; ?></textarea>
                                
                                
                            </div>
                        </div>
                        <div id="textarea1">
                        <label for="comments" style = " position:absolute; margin-left:-470px; margin-top:425px;" >Comments </label>
                        <textarea id="statement" name="statemen" value="" rows="5" cols="55" style=" margin-left:-500px; margin-top: 450px; box-shadow: 5px 5px 5px rgb(139, 134, 134);" readonly><?php echo $excuse['Status']; ?></textarea>
                                
                                
                            </div>
                        <div class="coninfo1">
                            <label for="Image" name ="Image">Proof of Absence</label>
                            <!--<input type="image" style="border-style:outset" height="560" width="470"/>--> 
                            <img id="file" src="<?php echo "../Uploads/".$excuse['Images']; ?>" value="<?php echo "../Uploads/".$excuse['Images']; ?>" name="image" style="border-style:outset; margin-top: 10px;" height="400" width="420"/>

                        </div>
                        
                    </div>
                    
                </div>
                </div>
              
                    </div>
                    
                  
                    </div> 
                </div>
                <?php
                                }
                            }
                            else
                            {
                                
                            }
                        ?>

                              
</body>
</html>