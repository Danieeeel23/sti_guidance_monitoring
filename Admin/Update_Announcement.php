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
    <link rel="stylesheet" href="Update_Announcement.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

    <title>Content of Announcement</title>
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
                    <span class="icon"><img src="images/sidebar_menu/Excuse_slip.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="titlee" ><br>Excuse Slip</span>
                    </a>
                </li>
                <li><a href="">
                    <div class="dropdown1">
                        <span class="icon" style="padding-top: -100px;"><img src="images/sidebar_menu/Manage_Users.svg" alt=""></span>
                        <a class="dropbtn1" style="margin-top: -40px;">
                            <span class="title1">Manage Users</span>
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
                    <span class="title1" ><br>Announcement</span>
                    </a>
                </li>
                <li>
                    <a href="Student_Record.php">
                    <span class="icon"><img src="images/sidebar_menu/Student_Record.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title2" ><br>Student Record</span>
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
                    <h2>Announcement</h2>
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
                      <h1>Content of Announcement</h1>
                      <form action="code.php" method="POST" enctype="multipart/form-data">
                      <input type="submit" class="btnn" name="update_announcement" value="Update" style=" position:absolute; width: 150px; height: 30px; margin-top: -40px; margin-left: 1000px; font-size: 15px;">  
                    </div>
                    <div class="bsinfo">
                        <h4>Basic Information</h4>
                        <div class="info">
                        <?php
                                    if(isset($_GET['id']))
                                    {
                                        $announcement_id = mysqli_real_escape_string($link, $_GET['id']);
                                        $query = "SELECT * FROM `announcement` WHERE Announcement_ID='$announcement_id' ";
                                        $query_run = mysqli_query($link, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            $announcement = mysqli_fetch_array($query_run);
                                            ?>
                            
                            <span id="btk"> <input type="hidden" placeholder="" name="announcement_id" id="announcement_id" value="<?= $announcement['Announcement_ID']; ?>" readonly></span>
                            <label for="Name">Author</label>
                            <span id="btk"> <input type="text" placeholder=""  name="author" value="<?= $announcement['Author']; ?>"></span>

                            <label for="Name">Title</label>
                            <span id="btk"> <input type="text" placeholder=""  name="title" value="<?= $announcement['Title']; ?>"></span>


                            <br>    
                            <label for="Date">Start Date</label>
                            <input type="date" placeholder="" id="Date" name="start_date" value="<?= $announcement['Start_Date']; ?>">
                            <br>
                            <br>
                            <label for="Date">End Date</label>
                            <input type="date" placeholder="" id="Date" name="end_date" value="<?= $announcement['End_Date']; ?>">
                        <br> 
                        <br>
                        <label for="Violation" name ="Violation">Category</label>
                        <select class="Violation" placeholder="Type of Violation" name="category">
                            <option value="<?= $announcement['Category']; ?>"></option>    
                            <option value="Ongoing"
                            <?php 
                                if($announcement['Category'] == "Ongoing")
                                {
                                    echo "selected";
                                }
                                ?>>Ongoing</option>
                            <option value="Expired"
                            <?php 
                                if($announcement['Category'] == "Expired")
                                {
                                    echo "selected";
                                }
                                ?>>Expired</option>
                            </select> 
                            <br> 
                        <br>
                            <label for="Violation" name ="Violation">Participants</label>
                        <select class="Violation" placeholder="Type of Violation" name="participants">
                        <option value="<?= $announcement['Participants']; ?>"></option>
                            <option value="All"
                            <?php 
                                if($announcement['Participants'] == "All")
                                {
                                    echo "selected";
                                }
                                ?>>All</option>
                            <option value="ICT Students"
                            <?php 
                                if($announcement['Participants'] == "ICT Students")
                                {
                                    echo "selected";
                                }
                                ?>>ICT Students</option>
                            <option value="ABM Students"
                            <?php 
                                if($announcement['Participants'] == "ABM Students")
                                {
                                    echo "selected";
                                }
                                ?>>ABM Students</option>
                            <option value="STEM Students"
                            <?php 
                                if($announcement['Participants'] == "STEM Students")
                                {
                                    echo "selected";
                                }
                                ?>>STEM Students</option>
                            <option value="HUMSS Students"
                            <?php 
                                if($announcement['Participants'] == "HUMSS Students")
                                {
                                    echo "selected";
                                }
                                ?>>HUMSS Students</option>
                            <option value="TVL Students"
                            <?php 
                                if($announcement['Participants'] == "TVL Students")
                                {
                                    echo "selected";
                                }
                                ?>>TVL Students</option>
                            <option value="Parents"
                            <?php 
                                if($announcement['Participants'] == "Parents")
                                {
                                    echo "selected";
                                }
                                ?>>Parents</option>
                            <option value="Teachers"
                            <?php 
                                if($announcement['Participants'] == "Teachers")
                                {
                                    echo "selected";
                                }
                                ?>>Teachers</option>
                            </select>
                 
                        </div>
                        
                    </div>
                    <div class="content">
                        <div class="coninfo">
                            <div id="textarea">
                                <label for="Description" name ="Description">Description</label>

  <textarea id="statement" name="statemen" rows="27" cols="65" style="margin-top: 25px; box-shadow: 5px 5px 5px rgb(139, 134, 134);" required><?php echo $announcement['Description']; ?></textarea>
                            </div>
                        </div>
                        <div class="coninfo1">
                            <label for="Image" name ="Image">Image</label>
                            <input type="file" id="inputFile" style="margin-top: 15px; width: 270px; margin-left: -10px; " name="file" onchange="readURL(this);" /><button type="button" onclick="removeImg()" style="margin-left: 5px; margin-bottom: 5px;">Remove Image</button>
                            <img id="file" src="<?php echo "../Uploads/".$announcement['Image']; ?>" name="file" style="border-style:outset;margin-left: -10px; margin-top: 5px;" height="430" width="410"/>
                            
                                                    
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