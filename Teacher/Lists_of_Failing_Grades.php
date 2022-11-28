

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--font-->
    <link rel="stylesheet" href="Lists_of_Failing_Grades.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css
">

    <title>Lists of Failing Grades</title>
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
                    <h2>Lists of Failing Grades</h2>
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
                    <div class="title2">
                      <h1>Lists of Failing Grades</h1>
                      <div class="bot">
                        <span class="create">
                            <i class="fa fa-plus"></i>
                            <form action="MyUserTech.php" method="POST"> 
                            <input type="submit" class="btn btn-primary btn-lg" value="Create"> 
                            </form>
                        </span>
                        <form action="code.php" method="POST">
                     
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
                                <th >List of Subjects</th>
                                <th>Year & Section</th>
                                <th>Last Modified</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox"class="larger" name="checkbox">Information Assurance and Security</td>
                                <td>Grade 11 - ABM 1 - A</td>
                                <td>June 06,2022 1:00 PM</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"class="larger" name="checkbox">Advance Systems and Architecture</td>
                                <td>Grade 11 - STEM 1-A </td>
                                <td>June 06,2022 1:00 PM</td>
                              
                            </tr>
                            <tr>
                                <td><input type="checkbox"class="larger" name="checkbox">Web Systems and Technologies</td>
                                <td>Grade 11 - ICT 1 - A</td>
                                <td>June 06,2022 1:00 PM</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"class="larger" name="checkbox">Management Information Systems</td>
                                <td>Grade 11 - ICT 1 - A</td> 
                                <td>June 06,2022 1:00 PM</td>
                            </tr>
                        </tr>
                       
                       
                            <!-- and so on... -->
                        </tbody>
                    </table>
                    </form>
                </div>
                    
            

   
</body>
</html>