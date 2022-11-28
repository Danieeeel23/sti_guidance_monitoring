<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--font-->
    <link rel="stylesheet" href="style5.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
">
    <title>List of Inquiry</title>
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
                    <h2>Inquiry</h2>
                    

                </div>

            </div>
        </div>
    </div>
    <div class="main1">
        <div class="title2" >
          <h1>List of Inquiries</h1>
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
              <th>Names</th>
              <th>Title</th>
              <th>Category</th>
              <th>Date</th>
            </tr>
            <tr>
                
              <td><span><input type="checkbox"></span>
              </span>Marlene Lara</td>
               <td></span>Inquiry 1</td>
               <td></span>Unread</td>
              <td>June 15, 2022 <span>&#8942</span></td>
            </tr>
            <tr>
                <td><span><input type="checkbox"></span>
                </span>Xavier Ribalde</td>
                <td></span>Inquiry 2</td>
                <td></span>Replied</td>
               <td>June 15, 2022 <span>&#8942</span></td>
              </tr>
              <tr>
                <td><span><input type="checkbox"></span>
                </span>Melanie Lucas</td>
                <td></span>Inquiry 3</td>
                <td></span>Read</td>
               <td>June 15, 2022 <span>&#8942</span></td>
              </tr>
              <tr>
                <td><span><input type="checkbox"></span>
                </span>Oden Hidalgo</td>
                <td></span>Inquiry 4</td>
               <td>June 15, 2022 <span>&#8942</span></td>
              </tr>
          </table>
    </div>

   
</body>
</html>