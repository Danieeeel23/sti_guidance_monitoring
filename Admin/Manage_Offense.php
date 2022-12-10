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
    <link rel="stylesheet" href="Manage_Offense.css">
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

    <title>Manage Offense</title>
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
                <?php include('message.php'); ?>
                    <div class="title2">
                      <h1>Manage Offense</h1>
                     
                    </div>
                    <div class="bsinfo">
                        <h4>Basic Information</h4>
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="coninfo1">
                            <input type="submit" class="btnn" name="save_offense" value="Create" style="position:absolute;width: 150px; height: 30px; margin-top: -110px; margin-left: 1200px; font-size: 15px;">
          
                        </div>
                        <div class="info">
                            <label for="Stu">Search</label>
                            <span id="btk"> <input type="text" placeholder="" name="studentno" id="studentno" onkeyup="GetDetail(this.value)" value="" required></span>
                            <button class="btn"><i class="fa fa-search"></i></button>
                            <!-- <span id="btk"> <input type="hidden" placeholder=""  name="studentno" id="studentno" value="" readonly></span> -->
                            <label for="Name">Name</label><span id="btk"> <input type="text" placeholder=""  name="vfirstname" id="firstname" value="" readonly></span>
                            <label for="Name">Year</label><span id="btk"> <input type="text" placeholder=""  name="vyrlvl" id="yrlvl" value="" readonly></span>
                            <label for="Name">Strand</label><span id="btk"> <input type="text" placeholder=""  name="vstrand" id="strand" value="" readonly></span>
                            <label for="Name">Section</label><span id="btk"> <input type="text" placeholder=""  name="vsection" id="section" value="" readonly></span>

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
                 
                       
                        
                        <label for="Violation" name ="Violation">Type of Violation</label>
                        <select class="Violation" placeholder="" name="Violation" required>
                        <option value="No input."></option>
                        <?php
                        $link = mysqli_connect("localhost", "u794078053_danieeel", "TheG0dHid4lg0&R1b4ld3", "u794078053_monitoring");
                        $query = "SELECT * FROM `offense`";
                        $query_run = mysqli_query($link, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $offense) {
                        ?>
                                <option value="<?= $offense['Type_of_Violation']; ?>"><?= $offense['Type_of_Violation']; ?></option> <br>
                        <?php
                            }
                        } else {
                            echo "No Offense Found";
                        }
                        ?>
                    </select>

                         
                        <label for="Offense" name ="Offense">Type of Offense</label>
                        <select class="Offense" name="Offense" required>
                            <option value="No input"></option>
                            <option value="Minor Offense">Minor Offense</option>
                            <option value="Major Offense A">Major Offense A</option>
                            <option value="Major Offense B">Major Offense B</option>
                            <option value="Major Offense C">Major Offense C</option>
                            <option value="Major Offense D">Major Offense D</option>
                            </select>
                        
                         
                        <label for="Level_Offense" name ="Offense">Level of Offense</label>
                        <select class="Level_Offense" name="Level_Offense" required>
                             <option value="No input"></option>
                             <option value="First Offense">First Offense</option>
                             <option value="Second Offense">Second Offense</option>
                             <option value="Third Offense">Third Offense</option>
                            </select>

                            <input type="hidden" name="status" value="Ongoing">
                                            
                        </div>
                        
                    </div>
                    <div class="content">
                        <div class="coninfo">
                            <div id="textarea">
                                <label for="Description" name ="Description">Description</label>

  <textarea id="statement" name="statemen" rows="29" cols="65" style="margin-top: 25px; box-shadow: 5px 5px 5px rgb(139, 134, 134);" required>name:william  date: august  section : bsit  cLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, 
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
                            <!--<input type="image" style="border-style:outset" height="560" width="470"/>--> 
                            <input type="file" id="inputFile" style="width:88%; margin-top: 33px; margin-right: -85px;" name="file" onchange="readURL(this);"/> <button type="button" onclick="removeImg()">Remove</button>
                            <img id="file" src="#" style="border-style:outset" height="440" width="410"/>
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
                                .width(410)
                                .height(440);
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