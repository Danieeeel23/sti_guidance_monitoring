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
    <link rel="stylesheet" href="Update_Offense.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>

    <title>Update Offense</title>
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
                    <span class="icon"><img src="Images/sidebar_menu/Home.svg" alt=""></span>
                    <span class="titleh" ><br>Home</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Excuse_Letter.php">
                    <span class="icon"><img src="Images/sidebar_menu/Excuse_slip.svg" alt=""></span>
                    <span class="titlee" ><br>Excuse Slip</span>
                    </a>
                </li>
                <li><a href="">
                    <div class="dropdown1">
                        <span class="icon" style="padding-top: -100px;"><img src="Images/sidebar_menu/Manage_Users.svg" alt=""></span>
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
                    <span class="icon"><img src="Images/sidebar_menu/Announcement.svg" alt=""></span>
                    <span class="titlea" ><br>Announcement</span>
                    </a>
                </li>
                <li>
                    <a href="Student_Record.php">
                    <span class="icon"><img src="Images/sidebar_menu/Student_Record.svg" alt=""></span>
                    <span class="titles" ><br>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Concerns.php">
                    <span class="icon"><img src="Images/sidebar_menu/Concerns.svg" alt=""></span>
                    <span class="titlec" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="List_of_Inquiries.php">
                    <span class="icon"><img src="Images/sidebar_menu/Inquiry.svg" alt=""></span>
                    <span class="titlei" ><br>Inquiry</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="main">
            <span id="logo"><img src="Images/sti_logo.png" alt=""></span>
            <div class="topbar">
                <div class="toptitle">
                    <h2>Student Record</h2>
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
                      <h1>Update Offense</h1>
                       <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="coninfo1">
                            <input type="submit" class="btnn" name="update_offense" value="Update" position:absolute;width: 150px; height: 30px; margin-top: -110px; margin-left: 1200px; font-size: 15px;">                   
                        </div>
                     
                    </div>
                    <div class="bsinfo">
                        <h4>Basic Information</h4>
                        <div class="info">
                        
                        <?php
                                    $country  = mysqli_query($link, "SELECT DISTINCT Type_of_Violation FROM violation");
                                    $option = mysqli_query($link, "SELECT DISTINCT Type_of_Violation FROM `offense`");

                                    if(isset($_GET['id']))
                                    {
                                        $violation_id = mysqli_real_escape_string($link, $_GET['id']);
                                        $query = "SELECT * FROM `violation` WHERE Violation_ID='$violation_id' ";
                                        $query_run = mysqli_query($link, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            $violation = mysqli_fetch_array($query_run);
                                            ?>
                           
                            <span id="btk"> <input type="hidden" placeholder="" name="violationno" id="violationno" value="<?= $violation['Violation_ID']; ?>" readonly></span>
                            
                            <br>    
                            <label for="Name">Name</label>
                            <span id="btk"> <input type="text" placeholder="Name"  name="vname" value="<?= $violation['Name']; ?>" readonly></span>
                            <label for="Name">Year</label>
                            <span id="btk"> <input type="text" placeholder="Year"  name="vyear" value="<?= $violation['Year_Level']; ?>" readonly></span>
                            <label for="Name">Strand</label>
                            <span id="btk"> <input type="text" placeholder="Strand"  name="vstrand" value="<?= $violation['Strand']; ?>" readonly></span>
                            <label for="Name">Section</label>
                            <span id="btk"> <input type="text" placeholder="Section"  name="vsection" value="<?= $violation['Section']; ?>" readonly></span>
                        <br>
                       
                        <label for="Violation" name ="Violation">Type of Violation</label>
                        <select class="Violation" placeholder="Type of Violation" name="Violation">
                        <?php foreach($country as $rows):?>
                                        <option value="<?php echo $rows['Type_of_Violation'] ?>"
          
                                    ><?php echo $rows['Type_of_Violation'] ?></option>
                                    <?php endforeach;?>
                                    
                                    <!-- To View All Subjects -->
                                    <?php foreach($option as $key => $value){ ?>
                                        <option value="<?=$value['Type_of_Violation'] ;?>"><?=$value['Type_of_Violation'] ;?></option>
                                    <?php } ?>
                                </select>


                         
                        <label for="Offense" name ="Offense">Type of Offense</label>
                        <select class="Offense" placeholder="Type of Offense" name="Offense">
                            <option value="<?= $violation['Type_of_Offense']; ?>">Type of Offense</option>
                            <option value="Minor Offense"
                            <?php 
                                if($violation['Type_of_Offense'] == "Minor Offense")
                                {
                                    echo "selected";
                                }
                                ?>>Minor Offense</option>
                            <option value="Major Offense A"
                            <?php 
                                if($violation['Type_of_Offense'] == "Major Offense A")
                                {
                                    echo "selected";
                                }
                                ?>>Major Offense A</option>
                            <option value="Major Offense B"
                            <?php 
                                if($violation['Type_of_Offense'] == "Major Offense B")
                                {
                                    echo "selected";
                                }
                                ?>>Major Offense B</option>
                            <option value="Major Offense C"
                            <?php 
                                if($violation['Type_of_Offense'] == "Major Offense C")
                                {
                                    echo "selected";
                                }
                                ?>>Major Offense C</option>
                            <option value="Major Offense D"
                            <?php 
                                if($violation['Type_of_Offense'] == "Major Offense D")
                                {
                                    echo "selected";
                                }
                                ?>>Major Offense D</option>
                            </select>
                        
                         
                        <label for="level_Offense" name ="Level_Offense">Level of Offense</label>
                        <select class="level_Offense" placeholder="Level of Offense" name="Level_Offense">
                             <option value="<?= $violation['Level_of_Offense']; ?>">Level of Offense</option>
                             <option value="First Offense"
                             <?php 
                                if($violation['Level_of_Offense'] == "First Offense")
                                {
                                    echo "selected";
                                }
                                ?>>First Offense</option>
                             <option value="Second Offense"
                             <?php 
                                if($violation['Level_of_Offense'] == "Second Offense")
                                {
                                    echo "selected";
                                }
                                ?>>Second Offense</option>
                             <option value="Third Offense"
                             <?php 
                                if($violation['Level_of_Offense'] == "Third Offense")
                                {
                                    echo "selected";
                                }
                                ?>>Third Offense</option>
                            </select>
                            
                            <label for="Status" name ="Status">Status</label>
                            <select class="Status" placeholder="" name="Status" required>
                                <option value="<?= $violation['Status']; ?>"></option>
                                <option value="Ongoing"
                                <?php 
                                if($violation['Status'] == "Ongoing")
                                {
                                    echo "selected";
                                }
                                ?>>Ongoing</option>
                                <option value="Resolved"
                                <?php 
                                if($violation['Status'] == "Resolved")
                                {
                                    echo "selected";
                                }
                                ?>>Resolved</option>
                            </select>

                            <label for="Date">Date</label>
                            <input type="date" placeholder="Date" id="Date" name="date" value="<?= $violation['Date']; ?>">
                 
                        </div>
                        
                    </div>
                    <div class="content">
                        <div class="coninfo">
                            <div id="textarea">
                                <label for="Description" name ="Description">Description</label>

  <textarea id="statement" name="statemen" rows="29" cols="65" style="margin-top: 25px; box-shadow: 5px 5px 5px rgb(139, 134, 134);" required><?php echo $violation['Description']; ?></textarea>
                            </div>
                        </div>
                        <div class="coninfo1">
                        <label for="Image" name ="Image">Image</label>
                            <!--<input type="image" style="border-style:outset" height="560" width="470"/>--> 
                            <input type="file" id="inputFile" style="margin-top: 15px;" name="file" onchange="readURL(this);" /> <button type="button" onclick="removeImg()" style="margin-left: -140px;margin-right: 10px;  margin-bottom: 20px;">Remove Image</button>
                            <img id="file" src="<?php echo "../Uploads/".$violation['Images']; ?>" name="file" style="border-style:outset; margin-top: 5px;" height="440" width="410"/>
                          
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