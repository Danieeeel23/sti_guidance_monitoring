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
    <link rel="stylesheet" href="Lists_of_Announcement.css">
    <link href="css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="delete_script.js"></script>

    <title>Lists of Announcement</title>
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
                    <span class="icon"><img src="Images/sidebar_menu/Excuse_slip.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title2" ><br>Excuse Slip</span>
                    </a>
                </li>
                <li><a href="">
                    <div class="dropdown2">
                        <span class="icon" style="padding-top: -100px;"><img src="Images/sidebar_menu/Manage_Users.svg" alt=""></span>
                        <a class="dropbtn2" style="margin-top: -40px;">
                            <span class="title">Manage Users</span>
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
                    <span class="icon"><img src="Images/sidebar_menu/Announcement.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title" ><br>Announcement</span>
                    </a>
                </li>
                <li>
                    <a href="Student_Record.php">
                    <span class="icon"><img src="Images/sidebar_menu/Student_Record.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title1" ><br>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Concerns.php">
                    <span class="icon"><img src="images/sidebar_menu/Concerns.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title3" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="List_of_Inquiries.php">
                    <span class="icon"><img src="Images/sidebar_menu/Inquiry.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title4" ><br>Inquiry</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="main">
            <span id="logo"><img src="Images/sti_logo.png" alt=""></span>
            <div class="topbar">
                <div class="toptitle">
                    <h2>Announcement</h2>
                </div>
                <div class="icons">
                    <div class="dropdown">
                        <button class="dropbtn" onclick="myFunction()"> <i class="fa fa-bell"></i></button>
                        <div class="dropdown-content" id="myDropdown">
                        <a href="#">Action</a>
                        <a href="#">Another Action</a>
                        <a href="#">Something Else</a>
                    </div> 
                </div> 
                <script>
                /* When the user clicks on the button, 
                toggle between hiding and showing the dropdown content */
                function myFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
                }

                // Close the dropdown if the user clicks outside of it
                window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                    }
                }
                }
                </script>                   
                <i class="fa fa-question-circle"></i>
                </div>
                <div class="dropdown1">
                    <button class="dropbtn1" onclick="myFunction1()">Admin</button>
                    <div class="dropdown-content1" id="myDropdown1">
                        <a href="../logins/logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
                /* When the user clicks on the button, 
                toggle between hiding and showing the dropdown content */
                function myFunction1() {
                document.getElementById("myDropdown1").classList.toggle("show");
                }

                // Close the dropdown if the user clicks outside of it
                window.onclick = function(event) {
                if (!event.target.matches('.dropbtn1')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content1");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                    }
                }
                }
                </script>
                <div class="main1">
                <?php include('message.php'); ?>
                    <div class="title2">
                      <h1>Lists of Announcement</h1>
                      <div class="bot">
                        <span class="create">
                            <form action="Manage_Announcement.php" method="POST">
                            <input type="submit" class="btn btn-primary btn-lg" value="Create">
                            </form>
                        </span>
        
                      <span class="delete"><input type="submit" value="Delete" id="delete_records"></span>
                    
                    </div>
                    </div>
                   
                <div class="card-header">
                    <table id="myDataTable" class="hover" style="margin-left: 80px;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Title</th>
                                <th>Participants</th>
                                <th>Category</th> 
                                <th>Author</th> 
                                <th>Start_Date</th> 
                                <th>End_Date</th>
                                <th>Update</th>           
                            </tr>
                        </thead>
                        <tbody>
                        <?php 

                                $query = "SELECT * FROM `announcement`";
                                $query_run = mysqli_query($link, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $announcement)
                                    {
                                        ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="emp_checkbox" data-emp-id="<?= $announcement['Announcement_ID']; ?>">
                                            </td>
                                            <td><?= $announcement['Title']; ?></a></td>
                                            <td><?= $announcement['Participants']; ?></td>
                                            <td><?= $announcement['Category']; ?></td>
                                            <td><?= $announcement['Author']; ?></td>
                                            <td><?= $announcement['Start_Date']; ?></td>
                                            <td><?= $announcement['End_Date']; ?></td>
                                            <td><a href="Update_Announcement.php?id=<?= $announcement['Announcement_ID']; ?>"><button type="submit" class="btn btn-update" style="margin-left: 15px;">View</button></a></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    
                                }
                            ?>
                       
                            <!-- and so on... -->
                        </tbody>
                    </table>
                </div>
                <!-- <script>
                    //one row clickable
                    document.addEventListener("DOMContentLoaded", () => {
                        const rows = document.querySelectorAll("tr[data-href]");
                        rows.forEach(row => {
                            row.addEventListener("click", () => {
                                window.location.href = row.dataset.href;
                            });
                        });
                    });
                </script> -->

                <script src="js/jquery-3.6.1.min.js"></script>
                <script src="js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
                <script>
                    $(document).ready( function () {
                        $('#myDataTable').DataTable( {
                            pageLength : 5,
                            lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]]
                        } )
                    } );
                </script>
                <style>
                    .card-header{                       
                        margin-left: -45px;
                        text-align: center;
                        margin-top: -120px;
                        width: 90%;
                    }
                    label{
                        margin-left: 80px;
                        margin-bottom: -1100px;
                    }
                    div#myDataTable_length.dataTables_length{
                        margin-top: -20px;
                        margin-bottom: 30px;
                    }
                    div#myDataTable_info.dataTables_info{
                        margin-left: 80px;
                        margin-top: 10px;
                    }
                    div#myDataTable_paginate.dataTables_paginate.paging_simple_numbers{
                        margin-right: -95px;
                        margin-top: 10px;
                    }
                    div#myDataTable_filter.dataTables_filter{
                        margin-right: 300px;
                        margin-top: -10px;
                    }
                    table.dataTable th, table.dataTable td{
                        border-bottom: 10px solid #f3f3f3;
                        font-size: 16px; 
                    }
                    table.dataTable td{
                        background-color: white;
                        height: 10px;
                    }
                </style>

                <script>
                $('#delete_records').on('click', function(e) { 
	                var employee = [];  
	                $(".emp_checkbox:checked").each(function() {  
		                 employee.push($(this).data('emp-id'));
	                });	
	                if(employee.length <=0)  {  
		                alert("Please select records.");  
	                }  
	                else { 	
		                WRN_PROFILE_DELETE = "Are you sure you want to delete "+(employee.length>1?"these":"this")+" row?";  
		                var checked = confirm(WRN_PROFILE_DELETE);  
		                if(checked == true) {			
			                var selected_values = employee.join(",");
			                $.ajax({ 
                                type: "POST",  
                                url: "delete_announcement.php",  
                                cache:false,  
                                data: 'emp_id='+selected_values,  
                                success: function(response) {	
                                    // remove deleted employee rows
                                    var emp_ids = response.split(",");
                                    for (var i=0; i < emp_ids.length; i++ ) {						
                                        $("#"+emp_ids[i]).remove();
                                        window.location.reload(); 
					                }									
				                }   
			                });				
		                }  
	                }  
                });
                </script>    
            

   
</body>
</html>