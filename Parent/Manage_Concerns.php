<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['parent_id'])){
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
    <link rel="stylesheet" href="Manage_Concerns.css">
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

    <title>Manage Concerns</title>
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
                        $parent_id = $_SESSION['parent_id'];
                        $query = "SELECT *, CONCAT(First_Name,' ',Last_Name) AS Names FROM `parent` WHERE Parent_ID='$parent_id'";
                        $query_run = mysqli_query($link, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $parent)
                            {
                                ?>
                    <button class="dropbtn"><?= $parent['Names']; ?></button>
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
                <?php include('message.php'); ?>
                    <div class="title2">
                      <h1>Manage Concerns</h1>
                      <a href="Lists_of_Concerns.php"><input type="submit" class="btnn2" value="Cancel"style="position:absolute;width: 150px; height: 30px; margin-top: -40px; margin-left: 980px; font-size: 15px;"></a>
                      <div class="coninfo1">
                      <form action="code.php" method="POST" enctype="multipart/form-data">
                            <input type="submit" class="btnn" name="save_concerns" value="Create" style="position:absolute;width: 150px; height: 30px; margin-top: -40px; margin-left: 800px; font-size: 15px;">
   
                        </div>
                    </div>
                    <div class="bsinfo">
                        <h4>Basic Information</h4>
                        <div class="info">
                       
                            <label for="Stu">Search</label>
                            <span id="btk"> <input type="text" placeholder="" name="studentno" id="studentno" onkeyup="GetDetail(this.value)" value="" required></span>
                            <button class="btn"><i class="fa fa-search"></i></button>
                       
                            <label for="Name">Name</label>
                            <span id="btk"> <input type="text" placeholder=""  name="cfirstname" id="firstname" value="" readonly></span>
                            <label for="Name">Year</label>
                            <span id="btk"> <input type="text" placeholder=""  name="cyrlvl" id="yrlvl" value="" readonly></span>
                            <label for="Name">Strand</label>
                            <span id="btk"> <input type="text" placeholder=""  name="cstrand" id="strand" value="" readonly></span>
                            <label for="Name">Section</label>
                            <span id="btk"> <input type="text" placeholder=""  name="csection" id="section" value="" readonly></span>

                            <script>
  
                            // onkeyup event will occur when the user 
                            // release the key and calls the function
                            // assigned to this event
                            function GetDetail(str) {
                                if (str.length == 0) {
                                    document.getElementById("firstname").value = "";
                                    document.getElementById("yrlvl").value = "";
                                    document.getElementById("strand").value = "";
                                    document.getElementById("section").value = "";
                                    return;
                                }
                                else {
                    
                                    // Creates a new XMLHttpRequest object
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function () {
                    
                                        // Defines a function to be called when
                                        // the readyState property changes
                                        if (this.readyState == 4 && 
                                                this.status == 200) {
                                            
                                            // Typical action to be performed
                                            // when the document is ready
                                            var myObj = JSON.parse(this.responseText);
                    
                                            // Returns the response data as a
                                            // string and store this array in
                                            // a variable assign the value 
                                            // received to first name input field
                                            
                                            document.getElementById
                                                ("firstname").value = myObj[0];
                                            
                                            // Assign the value received to
                                            // last name input field
                                            document.getElementById(
                                                "yrlvl").value = myObj[1];

                                                document.getElementById(
                                                "strand").value = myObj[2];

                                                document.getElementById(
                                                "section").value = myObj[3];
                                        }
                                    };
                    
                                    // xhttp.open("GET", "filename", true);
                                    xmlhttp.open("GET", "gfg.php?studentno=" + str, true);
                                    
                                    // Sends the request to the server
                                    xmlhttp.send();
                                }
                            }
                        </script>

                        <label for="Name">Title</label>
                            <span id="btk"> <input type="text" placeholder=""  name="title"></span>
                       
                        <label for="Name">Reason</label>
                        <span id="btk"> <input type="text" placeholder=""  name="reason"></span>

                        <label for="Date">Date</label>
                        <input type="date" placeholder="Date" id="Date" name="date" required>

                        <label for="Status"></label> <span id="btk"> <input type="hidden" placeholder="" name="status" value="Ongoing" readonly></span>
                                            
                        </div>
                        
                    </div>
                    <div class="content">
                        <div class="coninfo">
                            <div id="textarea">
                                <label for="Description" name ="Description">Description</label>

  <textarea id="statement" name="statemen" rows="27" cols="130" style="margin-top: 25px; box-shadow: 5px 5px 5px rgb(139, 134, 134);">name:william  date: august  section : bsit  cLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, 
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
                      
                    </div>   
                </div>
                </div>
</body>
</html>