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
    <link rel="stylesheet" href="Update_Concerns.css".css">
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
                    <span class="title1" ><br>Home</span>
                    </a>
                </li>
                <li>
                    <a href="Student_Record.php">
                    <span class="icon"><img src="images/sidebar_menu/Student_Record.svg" alt=""></span>
                    <span class="title2"><br>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Concerns.php">
                    <span class="icon"><img src="images/sidebar_menu/Concerns.svg" alt=""></span>
                    <span class="title" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Announcement.php">
                    <span class="icon"><img src="images/sidebar_menu/Mask group (9).svg" alt=""></span>
                    <span class="title5" ><br>Announcement</span>
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
                      <h1>Update Concerns</h1>
                      <a href="Lists_of_Concerns.php"><input type="submit" class="btnn2" value="Cancel" style="position:absolute;width: 150px; height: 30px; margin-top: -40px; margin-left: 980px; font-size: 15px;"></a>
                      <form action="code.php" method="POST" enctype="multipart/form-data">
                            <input type="submit" class="btnn" name="update_concerns" value="Update" style="position:absolute;width: 150px; height: 30px; margin-top: -40px; margin-left: 800px; font-size: 15px;">
                            

                     
                     
                    </div>
                    <div class="bsinfo">
                        <h4>Basic Information</h4>
                        <div class="info">
                        <?php
                                    if(isset($_GET['id']))
                                    {
                                        $concern_id = mysqli_real_escape_string($link, $_GET['id']);
                                        $query = "SELECT * FROM `concerns` WHERE Concern_ID='$concern_id' ";
                                        $query_run = mysqli_query($link, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            $concerns = mysqli_fetch_array($query_run);
                                            ?>
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                            <span id="btk"> <input type="hidden" placeholder="" name="concernno" id="concernno" value="<?= $concerns['Concern_ID']; ?>" readonly></span>

                            <br>    
                            <label for="Name">Name</label>
                            <span id="btk"> <input type="text" placeholder="Name"  name="cname" value="<?= $concerns['Name']; ?>" readonly></span>
                            <label for="Name">Title</label>
                            <span id="btk"> <input type="text" placeholder="Year"  name="ctitle" value="<?= $concerns['Title']; ?>"></span>
                            <label for="Name">Reason</label>
                            <span id="btk"> <input type="text" placeholder="Strand"  name="creason" value="<?= $concerns['Reason']; ?>"></span>
                            <label for="Date">Date</label>
                            <input type="date" placeholder="Date" id="Date" name="cdate" value="<?= $concerns['Date']; ?>">
                        <br>
                       
                        <label for="Violation" name ="Violation">Status</label>
                        <input type="text" placeholder="" id="Status" name="cstatus" value="<?= $concerns['Status']; ?>" readonly>
                 
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