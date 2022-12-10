<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--font-->
    <link rel="stylesheet" href="Manage_Section.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <title>Add Student & Parent</title>
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
                    <a href="Lists_of_Concern.php">
                    <span class="icon"><img src="Images/sidebar_menu/Concerns.svg" alt=""></span>
                    <span class="title3" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Inquiries.php">
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
                      <h1>Add Subject Teacher</h1>
                     <h4>Subject Teacher Information</h4>
                    </div>
                    <div class="bot">
                    <form action="code.php" method="POST">
                        <span class="create">
                            <input type="submit" name="save_subject_teacher" class="btn btn-primary btn-lg" value="Next" style="margin-top: -50px; margin-left: 1px;">
                        </span>
                    </div>
                    <div class="bsinfo">
                        <h4><i class='fa fa-user-circle'></i>Basic Information</h4>

                        <div class="info">

                <div class="multi-selector">

                    <div class="select-field">
                    <input type="text" name="" placeholder="Choose Subjects" id="" class="input-selector">
                    <span class="down-arrow">&blacktriangledown;</span>
                    </div>
                    <!---------List of checkboxes and options----------->
                    <div class="list">

                    <?php
                            $link = mysqli_connect("localhost","root","","sti guidance monitoring");

                            $query = "SELECT * FROM `subject`";
                            $query_run = mysqli_query($link, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $subjects)
                                {
                                    ?>
                                    <input type="checkbox" name="subjectlist[]" value="<?= $subjects['Subject_Name']; ?>" /> <?= $subjects['Subject_Name']; ?> <br/>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "No Record Found";
                            }
                        ?>                

                    </div>


                    </div>


                    <script>


                    document.querySelector('.select-field').addEventListener('click',()=>{
                        document.querySelector('.list').classList.toggle('show');
                        document.querySelector('.down-arrow').classList.toggle('rotate180');

                    });

                    </script>
                        </div>

                    </div>
                </div>
                </div>
<br>
</br>
                    

                <div class="bsinfo1">
                        <h4><i class="fa fa-phone" style="font-size:15px"></i>Contact Information</h4>
                        <div class="info">
                           <label for="Telephone">Telephone Number</label> <span id="btk"> <input type="text" placeholder="" name="telno"></span>
                           <br>
                            <label for="Mobile">Mobile Number</label> <span id="btk"> <input type="text" placeholder="" name="mobileno"></span>
                      
                      <br><label for="Email">Email Address</label> <span id="btk"> <input type="text" placeholder="" name="email" required></span>
                       
                    </div>
                </div>
                </div>
<br>
</br>
                <div class="bsinfo2">
                        <h4><i class="fa fa-map-marker" style="font-size:15px"> </i>Address</h4>
                        <div class="info">
                           <label for="Address">Address</label> <span id="btk"> <input type="text" placeholder="" name="address"></span>
                            <label for="City">City</label> <span id="btk"> <input type="text" placeholder="" name="city" ></span>
                      
                      <br><label for="Province">Province</label> <span id="btk"> <input type="text" placeholder="" name="province"></span>
                       <label for="Postcode">Postcode</label> <span id="btk"> <input type="text" placeholder="" name="postcode"></span>
                    </div>
                 
                </div>
                </div>
         <br>
</br> 
        </form>
   
</body>
</html>