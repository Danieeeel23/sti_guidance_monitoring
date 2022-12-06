<?php
session_start();
require 'config.php';

if(!isset($_SESSION['student_id'])){
    header('location:../logins/login_form.php');
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--font-->
    <link rel="stylesheet" href="Create_Excuse_letter.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    

    <title>Excuse Letter</title>
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
                    <h2>View of Excuse Slip</h2>
                </div>
                <div class="icons">
                    <i class="fa fa-bell"></i><span class="badge badge-light">4</span>
                    <i class="fa fa-question-circle"></i>
                </div>
                <div class="dropdown">
                <?php 
                        $student_id = $_SESSION['student_id'];
                        $query = "SELECT *, CONCAT(First_Name,' ',Last_Name) AS Names FROM `student` WHERE Student_ID='$student_id'";
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
                      <h1>Create Excuse Letter</h1>
                      <div class="coninfo1">
                      <form action="code.php" method="POST" enctype="multipart/form-data">
                            <input type="submit" class="btnn" name="student_save_excuse_letter" value="Send to Guidance"  style="width: 150px; position: absolute; height: 40px; margin-top: -45px; margin-left: 1200px; font-size: 15px;">
                        </div>
                    </div>
                    <div class="bsinfo">
                        <h4>Basic Information</h4>
                        <div class="info">
                        <?php
                                    if(isset($_GET['id']))
                                    {
                                        $student_id = mysqli_real_escape_string($link, $_GET['id']);
                                        $query = "SELECT *, CONCAT(First_Name,' ',Middle_Name,' ',Last_Name) AS Names FROM `student` WHERE Student_ID='$student_id'";
                                        $query_run = mysqli_query($link, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            $student = mysqli_fetch_array($query_run);
                                            ?>
                        

                            <label for="Name">Student ID</label>
                            <span id="btk"> <input type="text" placeholder=""  name="studentno" value="<?= $student['Student_ID']; ?>"></span>
                            <label for="Name">Name</label>
                            <span id="btk"> <input type="text" placeholder=""  name="efirstname" id="name" value="<?= $student['Names']; ?>" readonly></span>
                            <label for="Name">Year Level</label>
                            <span id="btk"> <input type="text" placeholder=""  name="eyrlvl" id="name" value="<?= $student['Year_Level']; ?>" readonly></span>
                            <label for="Name">Strand</label>
                            <span id="btk"> <input type="text" placeholder=""  name="estrand" id="name" value="<?= $student['Strand']; ?>" readonly></span>
                            <label for="Name">Section</label>
                            <span id="btk"> <input type="text" placeholder=""  name="esection" id="name" value="<?= $student['Section']; ?>" readonly></span>

                            <input type="hidden" placeholder="" id="Status" name="Status" value="Request">

                            <label for="reasons">Reason<span class="asterisk"> *</span></label>

                            <select name="reasons" id="reasons" required>
                                <option></option>
                                <option value="Health Related Problem">Health Related Problem</option>
                                <option value="Family Issue">Family Issue</option>
                                <option value="Traffic">Traffic</option>
                                <option value="Bad Weather">Bad Weather</option>
                                <option value="Appointment">Appointment</option>
                                <option value="Others">Others</option>
                            </select>
                       
                        <label for="Date">Start Date<span class="asterisk"> *</span></label>
                        <input type="date" placeholder="Date" id="Date" name="sstartdate" required>

                        <label for="Date">End Date<span class="asterisk"> *</span></label>
                        <input type="date" placeholder="Date" id="Date" name="sendate" required>

                 
                        </div>
                        
                    </div>
                    <div class="content">
                        <div class="coninfo">
                            <div id="textarea">
                                <label for="Description" name ="Description">Description</label>

                                <textarea id="statement" name="statemen" rows="28" cols="65" style="margin-top: 25px; box-shadow: 5px 5px 5px rgb(139, 134, 134);" required>name:william  date: august  section : bsit  cLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, 
                                    pulvinar facilisis justo mollis, auctor consequat urna. Morbi a bibendum metus. 
                                    Donec scelerisque sollicitudin enim eu venenatis. Duis tincidunt laoreet ex, 
                                    in pretium orci vestibulum eget. Class aptent taciti sociosqu ad litora torquent
                                    per conubia nostra, per inceptos himenaeos. Duis pharetra luctus lacus ut 
                                    vestibulum. Maecenas ipsum lacus, lacinia quis posuere ut, pulvinar vitae dolor.
                                    Integer eu nibh at nisi ullamcorper sagittis id vel leo. Integer feugiat 
                                    faucibus libero, at maximus nisl suscipit posuere. Morbi nec enim nunc. 
                                    Phasellus bibendum turpis ut ipsum egestas, sed sollicitudin elit convallis. 
                                    Cras pharetra mi tristique sapien vestibulum lobortis. Nam eget bibendum metus, 
                                    non dictum mauris. Nulla at tellus sagittis, viverra est a, bibendum metus.</textarea>
                            </div>
                        </div>
                        <div class="coninfo1">
                            <label for="Image" name ="Image">Proof of Absence</label>
                            <input type="file" id="inputFile" style="width:88%; margin-top: 33px; margin-right: -85px;" name="file" onchange="readURL(this);" required/> <button type="button" onclick="removeImg()">Remove</button> 
                            <img id="file" src="#" style="border-style:outset" height="420" width="420" required/>
                           
                            
                            
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
                                .width(420)
                                .height(420);
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