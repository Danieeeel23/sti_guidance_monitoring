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
    <link rel="stylesheet" href="Update_Excuse_Letter.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

    <title>Update Excuse Letter</title>
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
                    <span class="titleh" ><br>Home</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Excuse_Letter.php">
                    <span class="icon"><img src="images/sidebar_menu/Excuse_slip.svg" alt=""></span>
                    <span class="titlee" ><br>Excuse Slip</span>
                    </a>
                </li>
                <li><a href="">
                    <div class="dropdown1">
                        <span class="icon" style="padding-top: -100px;"><img src="images/sidebar_menu/Manage_Users.svg" alt=""></span>
                        <a class="dropbtn1" style="margin-top: -40px;">
                            <span class="titlem">Manage Users</span>
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
                    <span class="icon"><img src="images/sidebar_menu/Announcement.svg" alt=""></span>
                    <span class="titlea" ><br>Announcement</span>
                    </a>
                </li>
                <li>
                    <a href="Student_Record.php">
                    <span class="icon"><img src="images/sidebar_menu/Student_Record.svg" alt=""></span>
                    <span class="titles" ><br>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Concerns.php">
                    <span class="icon"><img src="images/sidebar_menu/Concerns.svg" alt=""></span>
                    <span class="titlec" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="List_of_Inquiries.php">
                    <span class="icon"><img src="images/sidebar_menu/Inquiry.svg" alt=""></span>
                    <span class="titlei" ><br>Inquiry</span>
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
                      <h1>Update Excuse Letter</h1>
                     
                    </div>
                    <div class="bsinfo">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="coninfo1">
                            <input type="submit" class="btnn" name="update_excuse_letter" value="Update" style=" position:absolute; width: 150px; height: 30px; margin-top: -50px; margin-left: 1200px; font-size: 15px;">  
                        </div>
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
                            
                            <label for="Name">Student ID</label>
                            <span id="btk"> <input type="text" placeholder="" name="studentno" id="studentno" value="<?= $excuse['Student_ID']; ?>" readonly></span>
                            <span id="btk"> <input type="hidden" placeholder="" name="excuseletterno" id="excuseletterno" value="<?= $excuse['Excuse_Letter_ID']; ?>" readonly></span>
                            <label for="Status" name ="Status">Status</label>
                            <select class="Status" placeholder="Status" name="Status">
                                <option value="<?= $excuse['Status']; ?>"></option>
                                <option value="Request" 
                                <?php 
                                if($excuse['Status'] == "Request")
                                {
                                    echo "selected";
                                }
                                ?>>Request</option>
                                <option value="Rejected"
                                <?php 
                                if($excuse['Status'] == "Rejected")
                                {
                                    echo "selected";
                                }
                                ?>>Rejected</option>
                                <option value="Accepted"
                                <?php 
                                if($excuse['Status'] == "Accepted")
                                {
                                    echo "selected";
                                }
                                ?>>Accepted</option>
                                </select>
                        
                            
                                <br>
                            
                            <span id="btk"> <input type="hidden" placeholder=""  name="datetime" id="datetime" value="<?= $excuse['Sent']; ?>" readonly></span>
                            <label for="Name">Name</label>
                            <span id="btk"> <input type="text" placeholder=""  name="efirstname" id="firstname" value="<?= $excuse['Names']; ?>" readonly></span>
                            <label for="Name">Year</label>
                            <span id="btk"> <input type="text" placeholder=""  name="eyrlvl" id="yrlvl" value="<?= $excuse['Year_Level']; ?>" readonly></span>
                            <label for="Name">Strand</label>
                            <span id="btk"> <input type="text" placeholder=""  name="estrand" id="strand" value="<?= $excuse['Strand']; ?>" readonly></span>
                            <label for="Name">Section</label>
                            <span id="btk"> <input type="text" placeholder=""  name="esection" id="section" value="<?= $excuse['Section']; ?>" readonly></span>
                                          
                        <label for="Date">Start Date</label>
                        <input type="date" placeholder="Date" id="Date" name="startdate" value="<?= $excuse['Start_Date']; ?>">

                        <label for="Date">End Date</label>
                        <input type="date" placeholder="Date" id="Date" name="enddate" value="<?= $excuse['End_Date']; ?>">

                        </div>
                        
                    </div>
                    <div class="content">
                        <div class="coninfo">
                            <div id="textarea">
                                <label for="Description" name ="Description">Description</label>

                                <textarea id="statement" name="statemen" rows="29" cols="65" style="margin-top: 25px; box-shadow: 5px 5px 5px rgb(139, 134, 134);" required><?php echo $excuse['Description']; ?></textarea>
                            </div>
                        </div>
                        <div class="coninfo1">
                            <label for="Image" name ="Image">Image</label>
                            <!--<input type="image" style="border-style:outset" height="560" width="470"/>--> 
                            <input type="file" id="inputFile" style="margin-top: 15px;" name="file" onchange="readURL(this);" /> <button type="button" onclick="removeImg()" style="margin-left: -140px; margin-bottom: 20px;">Remove Image</button>
                            <img id="file" src="<?php echo "../Uploads/".$excuse['Images']; ?>" name="file" style="border-style:outset; margin-top: 5px;" height="440" width="410"/>
                
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
                </div>
                </div>
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
                // function to remove the displayed image
                var inputFile = document.getElementById("inputFile");
                removeImg=()=>{
                    $('#file')
                        .attr('src', "#")
                        inputFile.value="";
                }
                </script>
                
</body>
</html>