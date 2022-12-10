<?php
    session_start();
    require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--font-->
    <link rel="stylesheet" href="Excuseslip.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <title>List of Excuse Letter</title>
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
                    <span class="icon"><img src="Images/sidebar_menu/Home.svg" alt=""></span>
                    <span class="title1" ><br>Home</span>
                    </a>
                </li>
                <li>
                    <a href="listofexcuseletter.html">
                    <span class="icon"><img src="Images/sidebar_menu/Excuse_slip.svg" alt=""></span>
                    <span class="title2" ><br>Excuse Slip</span>
                    </a>
                </li>
                <li>
                    <a href="">
                    <span class="icon"><img src="Images/sidebar_menu/Manage_Users.svg" alt=""></span>
                    <span class="title" ><br>Manage Users</span>
                    </a>
                </li>
                <li>
                    <a href="listofannoucement.html">
                    <span class="icon"><img src="Images/sidebar_menu/Announcement.svg" alt=""></span>
                    <span class="title" ><br>Annoucement</span>
                    </a>
                </li>
                <li>
                    <a href="">
                    <span class="icon"><img src="Images/sidebar_menu/Student_Record.svg" alt=""></span>
                    <span class="title" ><br>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="listofconcerns.html">
                    <span class="icon"><img src="Images/sidebar_menu/Concerns.svg" alt=""></span>
                    <span class="title3" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="listofinquiries.html">
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
                    <h2>Excuse_slip</h2>
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
                <?php include('message.php'); ?>
                    <div class="title2">
                      <h1>List of Excuse Letter</h1>
                      <div class="bot">
                        <span class="create">
                            <i class="fa fa-plus"></i>
                            <form action="Create_Excuse_Letter.php" method="POST"> 
                            <input type="submit" class="btn btn-primary btn-lg" value="Create">
                            </form>
                        </span>
                        <form action="code.php" method="POST">
                      <span class="delete"><input type="submit" value="Delete" onclick="return confirm('Are You Sure You Want To Delete?');" name="excuse_delete_multiple_btn"></span>
                    
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
                                <th></th>
                                <th>Student No</th>
                                <th>Names</th>
                                <th>Year</th>
                                <th>Section</th>
                                <th>Sent</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php 

                            $query = "SELECT * FROM `excuse letter`";
                            $query_run = mysqli_query($link, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $excuse)
                                {
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="excuse_delete_id[]" value="<?= $excuse['Excuse_Letter_ID']; ?>">
                                        </td>
                                        <td><?= $excuse['Student_ID']; ?>
                                        <td><a href="Update_Excuse_Letter.php?id=<?= $excuse['Excuse_Letter_ID']; ?>" style="text-decoration: none; color: black;" class="btn btn-info btn-sm"><?= $excuse['Names']; ?></a></td>
                                        <td><?= $excuse['Year_Level']; ?></td>
                                        <td><?= $excuse['Section']; ?></td>
                                        <td><?= $excuse['Sent']; ?></td>
                                        <td><?= $excuse['Status']; ?></td>
                                        <td><?= $excuse['Start_Date']; ?></td>
                                        <td><?= $excuse['End_Date']; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<h5 style='color:red;' align='center'> No Record Found! </h5>";
                            }
                        ?>
                       
                            <!-- and so on... -->
                        </tbody>
                    </table>
                </div>
                    
            

   
</body>
</html>