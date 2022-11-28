<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--font-->
    <link rel="stylesheet" href="Content_of_Excuse_letter.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css
">

    <title>View of Excuse Slip</title>
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
                    <span class="icon"><img src="Images/sidebar_menu/Mask group.svg" alt=""></span>
                    <span class="title1" ><br>Home</span>
                    </a>
                </li>
                <li><a href="Lists_of_Subjects.php">
                    
                        <span class="icon"><img src="Images/sidebar_menu/Edit Calendar.svg" alt=""></span>
                        <span class="title" ><br>Attendance</span>
                       
                    </a>
              
                </li>
                <li>
                    <a href="Lists_of_Failing_Grades.php">
                    <span class="icon"><img src="Images/sidebar_menu/Terms and Conditions.svg" alt=""></span>
                    <span class="title" ><br>Record Failing Grades</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Excuse_Letter.php">
                    <span class="icon"><img src="Images/sidebar_menu/Vector.svg" alt=""></span>
                    <span class="title" ><br>View of Excuse Slip</span>
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
                    <i class="fa fa-bell"></i>
                    <i class="fa fa-search"></i>

                </div>
                <div class="icons1">
                    <h3>Teacher</h3>
                    <i class="fa fa-angle-down"></i></div>
                </div>
            
                </div>
                <div class="main1">
                    <div class="title2" >
                      <h1>Content of Excuse Letter</h1>
                     
                    </div>
                    <div class="bsinfo">
                        <form action="">
                        <h4>Basic Information</h4>
                        <div class="info">

                            <label for="Name">Search</label>
                            <span id="btk"> <input type="text" placeholder="Search..."  name="search"></span>

                            <label for="Status" name ="Status">Status</label>
                            <select class="Status" placeholder="Status" name="Status">
                                <option value="0">Status</option>
                                <option value="1">Request</option>
                                <option value="2">Rejected</option>
                                <option value="3">Accepted</option>
                                </select>
                        
                            <br>    
                            <label for="Name">Name</label>
                            <span id="btk"> <input type="text" placeholder="Name"  name="search"></span>
                            <label for="Name">Year</label>
                            <span id="btk"> <input type="text" placeholder="Year"  name="search"></span>
                            <label for="Name">Strand</label>
                            <span id="btk"> <input type="text" placeholder="Strand"  name="search"></span>
                            <label for="Name">Section</label>
                            <span id="btk"> <input type="text" placeholder="Section"  name="search"></span>
                        <br>
                       
                        <label for="Date">Start Date</label>
                        <input type="date" placeholder="Date" id="Date" name="date">

                        <label for="Date">End Date</label>
                        <input type="date" placeholder="Date" id="Date" name="date">

                 
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
                            <label for="Image" name ="Image">Image</label>
                            <input type="image" src="images/image 4.png" style="border-style:outset" height="560" width="470"/> 
                            <button class="btn" style="width:88%"><i class="fa fa-download"></i> Upload</button>
                            <button class="btnn">Send to Teacher</button>

                            
                            
                        </div>
                    </div>
                </form>
                </div>
                </div>