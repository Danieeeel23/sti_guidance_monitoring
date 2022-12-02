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
    <link rel="stylesheet" href="Content_of_Excuse_Letter.css">
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
                    <span class="titlea" ><br>Announcement</span>
                    </a>
                </li>
                <li>
                    <a href="Student_Record.php">
                    <span class="icon"><img src="images/sidebar_menu/Student_Record.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="titlec" ><br>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Concerns.php">
                    <span class="icon"><img src="images/sidebar_menu/Concerns.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title3" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="List_of_Inquiries.php">
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
                    <h2>Excuse Slip</h2>
                </div>
                <div class="icons">
                    <i class="fa fa-bell"></i>
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
                            <br>
                            <label for="reasons">Reason for Absence</label>

                            <select name="reasons" id="reasons">
                                <option value=""></option>
                                <option value="Health Related Problem">Health Related Problem</option>
                                <option value="Family Issue">Family Issue</option>
                                <option value="Traffic">Traffic</option>
                                <option value="Bad Weather">Bad Weather</option>
                                <option value="Appointment">Appointment</option>
                                <option value="Others">Others</option>
                            </select>
                                      
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

                                <textarea id="statement" name="statemen" value="" rows="26" cols="55" style="margin-top: 25px; box-shadow: 5px 5px 5px rgb(139, 134, 134);" readonly><?php echo $excuse['Description']; ?></textarea>
                            </div>
                        </div>
                        <div class="coninfo1">
                            <label for="Image" name ="Image">Proof of Absence</label>
                            <!--<input type="image" style="border-style:outset" height="560" width="470"/>--> 
                            <img id="file" src="<?php echo "../Uploads/".$excuse['Images']; ?>" value="<?php echo "../Uploads/".$excuse['Images']; ?>" name="image" style="border-style:outset; margin-top: 40px;" height="400" width="420"/>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" id="submit">Accepted</button>
                            <button type="button" class="btn btn-primary btn-sm1" data-toggle="modal" data-target="#exampleModal1" style="margin-left: -450px;">Rejected</button> 
                        </div>
                    </div>

                </div>
                </div>
                <!--Accepted Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog"> 
                            <div class="modal-content"> 
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> 
                                    <h5 class="modal-title" id="exampleModalLabel">Excuse Slip</h5>  
                                </div> 
                                <div class="modal-body"> 
                                    <!-- Data passed is displayed in this part of the modal body -->
                                    <h6 id="modal_body"></h6>
                                    <input type="hidden" name="status" value="Accepted">
                                    <input type="hidden" name="comment" value="The Guidance Office Accepts This Excuse Letter">
                                    <input type="submit" class="btnn" name="accepted_excuse_letter" onClick="window.location.href=window.location.href" value="Send" style="width: 150px; height: 30px; margin-top: 20px; margin-bottom: -10px; margin-left: 260px; font-size: 15px;"> 
                                </div> 
                            </div> 
                        </div> 
                    </div>
                    
                    <!--Rejected Modal -->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog"> 
                            <div class="modal-content"> 
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> 
                                    <h5 class="modal-title" id="exampleModalLabel">Excuse Slip</h5>  
                                </div> 
                                <div class="modal-body"> 
                                    <!-- Data passed is displayed in this part of the modal body -->
                                    <h6 id="modal_body"><strong>Comments:</strong></h6>
                                    <textarea id="ecomments" name="ecomments" rows="4" cols="47" style="resize: none;"></textarea>
                                    <input type="hidden" name="estatus" value="Rejected">
                                    <input type="submit" class="btnn" name="rejected_excuse_letter" onClick="window.location.href=window.location.href" value="Send" style="width: 150px; height: 30px; margin-top: 20px; margin-bottom: -10px; margin-left: 260px; font-size: 15px;"> 
                                </div> 
                            </div> 
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
          
                </form>

                <script type="text/javascript"> 
                    $("#submit").click(function () { 
                        var firstname = $("#firstname").val() + "<br>" + "<br>";
                        var yrlvl = $("#yrlvl").val() + " - "; 
                        var strand = $("#strand").val();
                        var section = $("#section").val() + "<br>" + "<br>";
                        var startdate = $("#startdate").val();
                        var enddate = $("#enddate").val();
                        var str = "<strong>Name:</strong>" + " " + firstname + " " + "<strong>Year and Section:</strong>" + " " + yrlvl + " " + " " + strand + " " + section + " " + "<strong>Date of Absence:</strong>" + " " + startdate + " / " + enddate; 
                        $("#modal_body").html(str);
                    }); 
                </script> 

                <script>
                    // function to display an image after selecting a file
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#file')
                                .attr('src', e.target.result)
                                .width(470)
                                .height(560);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }
                </script>
                              
</body>
</html>