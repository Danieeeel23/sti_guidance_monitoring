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
    <link rel="stylesheet" href="Update_Subject.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

    <title>Update Concerns</title>
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
                    <span class="icon"><img src="images/sidebar_menu/Announcement.svg" alt=""></span>
                    <span class="titlea" ><br>Announcement</span>
                    </a>
                </li>
                <li>
                    <a href="Student_Record.php">
                    <span class="icon"><img src="images/sidebar_menu/Student_Record.svg" alt=""></span>
                    <span class="titlea" ><br>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Concerns.php">
                    <span class="icon"><img src="images/sidebar_menu/Concerns.svg" alt=""></span>
                    <span class="title3" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="List_of_Inquiries.php">
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
                    <h2>Concerns</h2>
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
                      <h1>Update Concerns</h1>
                      <div class="coninfo1">
                      <a href="Lists_of_Concerns.php"><input type="submit" class="btnn2" value="Cancel" style="position:absolute;width: 150px; height: 30px; margin-top: -40px; margin-left: 980px; font-size: 15px;"></a>
                      <form action="code.php" method="POST" enctype="multipart/form-data">
                            <input type="submit" class="btnn" name="update_subject" value="Update" style="position:absolute;width: 150px; height: 30px; margin-top: -40px; margin-left: 800px; font-size: 15px;">
                        </div>  

                    </div>
                    <div class="bsinfo">
                        <h4>Basic Information</h4>
                        <div class="info-latest">
                            <?php
                                        $country  = mysqli_query($link, "SELECT DISTINCT Subject_Name FROM subject_teacher");
                                        $option = mysqli_query($link, "SELECT DISTINCT Subject_Name FROM `subject`");

                                        if(isset($_GET['id']))
                                        {
                                            $subject_id = mysqli_real_escape_string($link, $_GET['id']);
                                            $query = "SELECT * FROM `subject_teacher` WHERE Subject_Teacher_ID='$subject_id' ";
                                            $query_run = mysqli_query($link, $query);
                                        
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                $subjects = mysqli_fetch_array($query_run);
                                                ?>

                                <span id="btk"> <input type="hidden" placeholder="" name="subjectno" id="subjectno" value="<?= $subjects['Subject_Teacher_ID']; ?>" readonly></span>
                                            
                                <br>    
                                <label for="Strand2">Subjects:</label>
                                <select name="Strand2" id="Strand2">
                                <?php foreach($country as $rows):?>
                                    <option value="<?php echo $rows['Subject_Name'] ?>"

                                    <?php 
                                    if($subjects['Subject_Name'] == $rows['Subject_Name'])
                                    {
                                        echo 'selected="selected"';
                                    }
                                    ?>

                                    ><?php echo $rows['Subject_Name'] ?> </option>
                                    <?php endforeach;?>
                                    
                                    <!-- To View All Subjects -->
                                    <?php foreach($option as $key => $value){ ?>
                                        <option value="<?=$value['Subject_Name'] ;?>"><?=$value['Subject_Name'] ;?></option>
                                    <?php } ?>
                                </select>

                                <label for="Date">Date</label>
                                <input type="date" placeholder="Date" id="Date" name="cdate" value="<?= $concerns['Date']; ?>">
                            <br>
                             <br>
                             <br>
                            <label for="Violation" name ="Violation">Status</label>
                            <select class="Violation" placeholder="Status" name="Status">
                                <option value="<?= $concerns['Status']; ?>"></option>
                                <option value="Ongoing"
                                <?php 
                                    if($concerns['Status'] == "Ongoing")
                                    {
                                        echo "selected";
                                    }
                                    ?>>Ongoing</option>
                                <option value="Resolved"
                                <?php 
                                    if($concerns['Status'] == "Resolved")
                                    {
                                        echo "selected";
                                    }
                                    ?>>Resolved</option>
                            </select>
                            
                        </div>
                            
                    </div>
                    <div class="content">
                        <div class="coninfo">
                            <div id="textarea">
                                <label for="Description" name ="Description">Description</label>

  <textarea id="statement" name="statemen" rows="27" cols="130" style="margin-top: 25px; box-shadow: 5px 5px 5px rgb(139, 134, 134);"><?php echo $concerns['Statement']; ?></textarea>
                            </div>
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
</body>
</html>