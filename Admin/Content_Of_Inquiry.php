<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--font-->
    <link rel="stylesheet" href="content_of_inquiry.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <title>Content of Inquiry</title>
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
                    <a href="Manage_User.php">
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
                    <a href="Lists_of_Concerns.php">
                    <span class="icon"><img src="Images/sidebar_menu/Concerns.svg" alt=""></span>
                    <span class="title3" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="List_of_Inquiries.php">
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
                    <h2>Inquiry</h2>
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
                    <div class="title2" >
                      <h1>Content of Inquiry</h1>
                     
                    </div>
                    <div class="bsinfo">
                        <form action="">
                        <h4>Basic Information</h4>
                        <div class="info">

                            <label for="Name">Name</label>
                            <span id="btk"> <input type="text" placeholder="Search..."  name="search"></span>
                            
                            <label for="Date">Date</label>
                        <input type="date" placeholder="Date" id="Date" name="date">
                        <br>    

                        <label for="Name">Title</label>
                            <span id="btk"> <input type="text" placeholder=""  name="search"></span>

                        <label for="Name">Reason for Inquiry</label>
                            <span id="btk"> <input type="text" placeholder=""  name="search"></span>
                       
                        <label for="Violation" name ="Violation">Category</label>
                        <select class="Violation" placeholder="Type of Violation" name="Violation">
                            <option value="0">Category</option>
                            <option value="1">Unread</option>
                            <option value="2">Replied</option>
                            <option value="3">Read</option>
                            <option value="4">Unread</option>
                            </select>

                         
        
                            </select>
                            
                 
                        </div>
                        
                    </div>
                    <div class="content">
                        <div class="coninfo">
                            <div id="textarea">
                                <label for="Description" name ="Description">Description</label>

  <textarea id="statement" name="statemen" rows="32" cols="65" style="margin-top: 25px; box-shadow: 5px 5px 5px rgb(139, 134, 134);">name:william  date: august  section : bsit  cLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, 
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
                            <button class="btnn">Done</button>

                            
                            
                        </div>
                    </div>
                </form>
                </div>
                </div>