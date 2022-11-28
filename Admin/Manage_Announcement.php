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
    <link rel="stylesheet" href="Manage_Announcement.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script>
    if(window.history.replaceState) 
    {
	    window.history.replaceState(null, null, window.location.href);
    }
</script>
    <title>Manage Announcement</title>
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
                    <span class="titleb" ><br>Announcement</span>
                    </a>
                </li>
                <li>
                    <a href="Student_Record.php">
                    <span class="icon"><img src="images/sidebar_menu/Student_Record.svg" alt=""></span>
                    <span class="titlec" ><br>Student Record</span>
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
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                      <h1>Manage Announcement</h1>
                      <div class="summit">
                            
                            <input type="submit" class="btnn" name="create_announcement" value="Create" style="width: 150px; height: 30px; margin-top: 5px; margin-left: 320px; font-size: 15px;">

                        </div>
                    </div>
                    </div>
                      
                    <div class="bsinfo">
                        <h4>Basic Information</h4>
                        <div class="info">
                            
                            <span id="btk"> <input type="hidden" placeholder=""  name="announcement_id" id="announcement_id" readonly></span>
                            <label for="Name">Author</label>
                            <span id="btk"> <input type="text" placeholder="Name"  name="author"></span>
                        <br>
                            <label for="Name1">Title</label>
                            <span id="btk"> <input type="text" placeholder="Title"  name="title"></span>


                            <br>    
                            <label for="Date1">Start Date</label>
                            <input type="date" placeholder="Date" id="Date" name="start_date">
                        <br>
                        <br>
                            <label for="Date">End Date</label>
                            <input type="date" placeholder="Date" id="Date" name="end_date">
                            <br>
                            <br>    
                        <label for="Violation" name ="Violation">Category</label>
                        <select class="Violation" placeholder="Type of Violation" name="category">
                            <option value="Category">Category</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Expired">Expired</option>
                            </select>

                            <div class="container1">
                                <div class="select-btn">
                                    <span class="btn-text">Select Participants</span>
                                    <span class="arrow-dwn">
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </span>
                                </div>

                                <ul class="list-items">
                                    <li class="item">
                                        <span class="">
                                            <input type="checkbox" name="participants[]" value="All"> All
                                        </span>                                        
                                    </li>
                                    <li class="item">
                                        <span class="">
                                            <input type="checkbox" name="participants[]" value="ICT"> ICT
                                        </span>
                                    </li>
                                    <li class="item">
                                        <span class="">
                                            <input type="checkbox" name="participants[]" value="ABM"> ABM
                                        </span>
                                    </li>
                                    <li class="item">
                                        <span class="">
                                            <input type="checkbox" name="participants[]" value="STEM"> STEM
                                        </span>
                                    </li>
                                    <li class="item">
                                        <span class="">
                                            <input type="checkbox" name="participants[]" value="HUMSS"> HUMSS
                                        </span>
                                    </li>
                                    <li class="item">
                                        <span class="">
                                            <input type="checkbox" name="participants[]" value="TVL"> TVL
                                        </span>
                                    </li>
                                    <li class="item">
                                        <span class="">
                                            <input type="checkbox" name="participants[]" value="GAS"> GAS
                                        </span>
                                    </li>
                                    <li class="item">
                                        <span class="">
                                            <input type="checkbox" name="participants[]" value="Parents"> Parents
                                        </span>
                                    </li>
                                    <li class="item">
                                        <span class="">
                                            <input type="checkbox" name="participants[]" value="Teachers"> Teachers
                                        </span>
                                    </li>
                                </ul>
                            </div>

                            <!-- JavaScript -->
                            <script>
                                const selectBtn = document.querySelector(".select-btn"),
                                items = document.querySelectorAll(".item");

                            selectBtn.addEventListener("click", () => {
                                selectBtn.classList.toggle("open");
                            });

                            </script>
               
                        </div>
                        
                    </div>
                    <div class="content">
                        <div class="coninfo">
                            <div id="textarea">
                                <label for="Description" name ="Description"><strong>Description</strong></label>

  <textarea id="statement" name="statemen" rows="28" cols="60" style="margin-top: 25px; box-shadow: 5px 5px 5px rgb(139, 134, 134);" required>name:william  date: august  section : bsit  cLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, 
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
                            <label for="Image" name ="Image"><strong>Image</strong></label>
                            <input type="file" id="inputFile" style="width:88%; margin-top: 33px; margin-right: -85px;" class="inputfile" name="file" onchange="readURL(this);" required/> 
                            <button type="button" onclick="removeImg()">Remove</button>
                            <img id="file" src="#" style="box-shadow: 5px 5px 5px rgb(139, 134, 134);" height="430" width="420" required/>                                                     
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
                                .width(420)
                                .height(430);
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
   
   
 