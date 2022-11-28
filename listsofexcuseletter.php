<?php
    session_start();
    require 'config.php';

    //this code is to identify the user, prevent the link address from accessing freely and redirect only to login form
    if(!isset($_SESSION['admin_id'])){
        header('location:admin_page.php');
     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--font-->
    <link rel="stylesheet" href="listsofexcuseletter.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <title>List of Student</title>
</head>
<body>
    <div class="container">

    <?php include('message.php'); ?>

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
                    <h2>Excuse Slip</h2>
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
                    <div class="title2">
                    <form action="code.php" method="POST">
                      <h1>List of Excuse Letter</h1>
                      <div class="bot">
                        <span class="create">
                            <i class="fa fa-plus"></i>
                            <a class="button1" href="create.php" role="button">Create</a>
                        </span>
                        <button class="btn btn-primary" type="submit" onclick="return confirm('Are You Sure You Want To Delete?');" name="excuse_delete_multiple_btn">Delete</button>
                    </div>
                    </div>
                   
                    <div class="search">
                       <span id="sea"><i class="fa fa-search"></i> <input type="text" placeholder="Search.." name="search"></span>
                        <label for="strand" name = "Strand"></label>
                <select id="Strand" name="Strand">
                    <option value="0">Status</option>
                    <option value="1">Request</option>
                    <option value="2">Accepted</option>
                    <option value="3">Rejected</option>
                    
                </select>
                        <i class="fa fa-filter"></i>
                    </div>
                </div>
                </div>
                <div class="card-header">
                    <table id="tables" class="styled-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th >Student No</th>
                                <th>Names</th>
                                <th >Year & Section</th>
                                <th>Sent</th>
                                <th >Status</th>
                                <th>Start Date</th>
                                <th > End Date</th>                              
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
                                            <td><?= $excuse['Student_ID']; ?></td>
                                            <td><?= $excuse['Names']; ?></td>
                                            <td><?= $excuse['Year&Section']; ?></td>
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
                </form>
                </div>
                    
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
                <script src="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"></script> 
                <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script> 
                 
                <script>
                $(document).ready( function () {
                    $('#tables').DataTable();
                } );
                </script>
   
</body>
</html>