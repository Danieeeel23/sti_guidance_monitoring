<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--font-->
    <link rel="stylesheet" href="Create_Excuse_Letter.css">
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

    <title>Create Excuse Letter</title>
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
                    <span class="icon"><img src="images/sidebar_menu/Excuse_slip.svg" alt=""></span>
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
                    <span class="icon"><img src="images/sidebar_menu/Announcement.svg" alt=""></span>
                    <span class="titlec" ><br>Announcement</span>
                    </a>
                </li>
                <li>
                    <a href="Student_Record.php">
                    <span class="icon"><img src="images/sidebar_menu/Student_Record.svg" alt=""></span>
                    <span class="titled" ><br>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Concerns.php">
                    <span class="icon"><img src="images/sidebar_menu/Concerns.svg" alt=""></span>
                    <span class="titleb" ><br>Concerns</span>
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
                      <h1>Create Excuse Letter</h1>
                      <form action="code.php" method="POST" enctype="multipart/form-data">
                      <div class="coninfo1">
                            <input type="submit" class="btnn" name="save_excuse_letter" value="Create"  style="width: 150px; position: absolute; height: 40px; margin-top: -45px; margin-left: 1200px; font-size: 15px;"> 
                        </div>
                    </div>
                    <div class="bsinfo">
                        <h4>Basic Information</h4>
                        <div class="info">
                            
                            <label for="Stu">Search <span class="asterisk">*</span></label>
                            <span id="btk"> <input type="text" placeholder="Enter Student ID" name="studentno" id="studentno" onkeyup="GetDetail(this.value)" value="" required></span>
                                                                             
                            <label for="Name">Name</label>
                            <span id="btk"> <input type="text" placeholder=""  name="efirstname" id="firstname" value="" readonly></span>
                            <label for="Name1">Year</label>
                            <span id="btk"> <input type="text" placeholder=""  name="eyrlvl" id="yrlvl" value="" readonly></span>
                            <label for="Name">Strand</label>
                            <span id="btk"> <input type="text" placeholder=""  name="estrand" id="strand" value="" readonly></span>
                            <label for="Name">Section</label>
                            <span id="btk"> <input type="text" placeholder=""  name="esection" id="section" value="" readonly></span>
                            <input type="hidden" name="comments" value="The Guidance Office Accepts This Excuse Letter">

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
                                                
                              
                           
                           <label for="reasons">Reason <span class="asterisk">*</span></label>
                            <select name="reasons" id="reasons" required>
                                <option value=""></option>
                                <option value="Health Related Problem">Health Related Problem</option>
                                <option value="Family Issue">Family Issue</option>
                                <option value="Traffic">Traffic</option>
                                <option value="Bad Weather">Bad Weather</option>
                                <option value="Appointment">Appointment</option>
                                <option value="Others">Others</option>
                            </select>
                       
                        <label for="Date">Start Date <span class="asterisk">*</span></label>
                        <input type="date" placeholder="Date" id="Date" name="startdate" required>

                            <select name="Status" id="Status" style="display: none;">
                                <option value="Accepted">Accepted</option>
                            </select>
                        <label for="Date">End Date <span class="asterisk">*</span></label>
                        <input type="date" placeholder="Date" id="Date" name="enddate" required>

                        <input type="hidden" placeholder="Date" id="Date" name="modified" required>

                        </div>
                        
                    </div>
                    <div class="content">
                        <div class="coninfo">
                            <div id="textarea">
                                <label for="Description" name ="Description">Statement <span class="asterisk">*</span></label>

                                <textarea id="statement" name="statemen" rows="29" cols="60" style="margin-top: 25px; box-shadow: 5px 5px 5px rgb(139, 134, 134);" required></textarea>
                            </div>
                        </div>
                        <div class="coninfo1">
                            <label for="Image" name ="Image">Proof of Absence</label>
                            <!--<input type="image" style="border-style:outset" height="560" width="470"/>--> 
                            <input type="file" id="inputFile" style="width:88%; margin-top: 33px; margin-right: -85px; " name="file" onchange="readURL(this);" /> <button type="button" onclick="removeImg()">Remove</button>
                            <img id="file" src="#" style="border-style:outset" height="445" width="465" " required/>
                    
                            
                        </div>
                    </div>
                </form>
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
                                .width(465)
                                .height(445);
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