<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--font-->
    <link rel="stylesheet" href="manage_parent.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <title>List of Parent</title>
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
                    <a href="dash.html">
                    <span class="icon"><img src="images/sidebar_menu/Home.svg" alt=""></span>
                    <span class="title1" ><br>Home</span>
                    </a>
                </li>
                <li>
                    <a href="listofexcuseletter.html">
                    <span class="icon"><img src="images/sidebar_menu/Excuse_slip.svg" alt=""></span>
                    <span class="title2" ><br>Excuse Slip</span>
                    </a>
                </li>
                <li>
                    <a href="">
                    <span class="icon"><img src="images/sidebar_menu/Manage_Users.svg" alt=""></span>
                    <span class="title" ><br>Manage Users</span>
                    </a>
                </li>
                <li>
                    <a href="listofannoucement.html">
                    <span class="icon"><img src="images/sidebar_menu/Announcement.svg" alt=""></span>
                    <span class="title" ><br>Annoucement</span>
                    </a>
                </li>
                <li>
                    <a href="">
                    <span class="icon"><img src="images/sidebar_menu/Student_Record.svg" alt=""></span>
                    <span class="title" ><br>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="listofconcerns.html">
                    <span class="icon"><img src="images/sidebar_menu/Concerns.svg" alt=""></span>
                    <span class="title3" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="listofinquiries.html">
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
                    <h2>User</h2>
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
                      <h1>List of Parents</h1>
                      <div class="bot">
                        <span class="create">
                            <i class="fa fa-plus"></i> 
                            <input type="submit" class="btn btn-primary btn-lg" value="Create">
                        </span>
                      <span class="delete"><input type="submit" value="Delete"></span>
                    </div>
                    </div>
                   
                    <div class="search">
                       <span id="sea"><i class="fa fa-search"></i> <input type="text" placeholder="Search.." name="search"></span>
                        <label for="strand" name = "Strand"></label>
                <select id="Strand" name="Strand">
                    <option value="0">STRAND</option>
                    <option value="1">STEM</option>
                    <option value="2">ABM</option>
                    <option value="3">HUMSS</option>
                    <option value="4">TVL</option>
                    <option value="5">GAS</option>
                    
                </select>
                        <i class="fa fa-filter"></i>
                    </div>
                </div>
                </div>
                <div class="card-header">
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th >Name</th>
                                <th>Address</th>
                                <th >Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox"class="larger" name="checkbox"><span
                                    i class='fa fa-user-circle'style="font-size: 20px"></i></span>Marlene Lara</td>
                                <td>Blk I A-4 Lot 8 Brgy Sta.Cristina II</td>
                                <td>mgl764@gmail.com</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"class="larger" name="checkbox"><span
                                    i class='fa fa-user-circle'style="font-size: 20px"></i></span>Xavier Ribalde</td>
                                <td>Blk I A-6 Lot 7 Brgy Sampaguita I</td>
                                <td>xavier@yahoo.com</td>
                              
                            </tr>
                            <tr>
                                <td><input type="checkbox"class="larger" name="checkbox"><span
                                    i class='fa fa-user-circle'style="font-size: 20px"></i></span>Oden Hidalgo</td>
                                <td>Blk I A-3 Lot 4 Brgy San.Agustin II</td>
                                <td>oden15@yahoo.com</td>  
                            </tr>
                            <tr>
                                <td><input type="checkbox"class="larger" name="checkbox"><span
                                    i class='fa fa-user-circle'style="font-size: 20px"></i></span>Melanie Lucas</td>
                                <td>Blk I A-5 Lot 6 Brgy San Roque II</td>
                                <td>melanie20@yahoo.com</td>   
                            </tr>
                        </tr>
                       
                       
                            <!-- and so on... -->
                        </tbody>
                    </table>
                </div>
                    
            

   
</body>
</html>