<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--font-->
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
">
    <title>List of Student</title>
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
                <li>
                    <a href="Manage_User.php">
                    <span class="icon"><img src="images/sidebar_menu/Manage_Users.svg" alt=""></span>
                    <span class="title" ><br>Manage Users</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Announcement.php">
                    <span class="icon"><img src="images/sidebar_menu/Announcement.svg" alt=""></span>
                    <span class="title" ><br>Annoucement</span>
                    </a>
                </li>
                <li>
                    <a href="Student_Record.php">
                    <span class="icon"><img src="images/sidebar_menu/Student_Record.svg" alt=""></span>
                    <span class="title" ><br>Student Record</span>
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
                <div class="title1">
                    <h2></h2>
                    

                </div>

            </div>
        </div>
    </div>
    <div class="main1">
        <div class="title2" >
          <h1>List of Excuse Letter</h1>
          <div class="bot">
          <span class="create"><input type="submit" value="Create"></span>
          <span class="delete"><input type="submit" value="Delete"></span>
          
        </div>
        </div>
        <div class="search">
           <span id="sea"> <input type="text" placeholder=" Search" name="search"></span>
            <label for="Strand" name = "Strand"></label>
    <select id="Strand" name="Strand">
      <option value="ABM">ABM</option>
      <option value="BSIT">BSIT</option>
      <option value="HRM">HRM</option>
    </select>
            <i class="fa fa-filter"></i>
        </div>
    </div>
    </div>
    <div class="table1">
        <table >
            <tr>
              <th>Student No</th>
              <th>Names</th>
              <th>Year & Section</th>
              <th>Sent</th>
              <th> Status</th>
              <th>Start date</th>
              <th>End date</tr>
              
            </tr>
            <tr>
                
              <td><span><input type="checkbox"></span>
              </span>10000</td>
               <td></span>Jonah Mae Alejo</td>
               <td></span>Grade 11 - ABM 1-A</td>
               <td></span>June 11, 2022</td>
               <td></span>Request</td>
               <td></span>June 11, 2022</td>
              <td>June 15, 2022 <span>&#8942</span></td>
            </tr>
            <tr>
                <td><span><input type="checkbox"></span>
                </span>10000</td>
                <td></span>Daniel Lois Hidalgo</td>
                <td></span>Grade 11 - ICT 1-A</td>
                <td></span>Just now</td>
                <td></span>Request</td>
                <td></span>June 11, 2022</td>
               <td>June 15, 2022 <span>&#8942</span></td>
              </tr>
              <tr>
                <td><span><input type="checkbox"></span>
                </span>10000</td>
                <td></span>William Ribalde</td>
                <td></span>Grade 11 - STEM 1-A</td>
                <td></span>June 11, 2022</td>
                <td></span>Rejected</td>
                <td></span>June 11, 2022</td>
               <td>June 15, 2022 <span>&#8942</span></td>
              </tr>
              <tr>
                <td><span><input type="checkbox"></span>
                </span>10000</td>
                <td></span>Keane Klyde Lara</td>
                <td></span>Grade 11 - ICT 1-A</td>
                <td></span>June 11, 2022</td>
                <td></span>Accepted</td>
                <td></span>June 11, 2022</td>
               <td>June 15, 2022 <span>&#8942</span></td>
              </tr>
          </table>
    </div>

   
</body>
</html>