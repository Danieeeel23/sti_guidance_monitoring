<?php
    session_start();
    require 'config.php';
    if(!isset($_SESSION['student_id'])){
        header('location:../logins/login_form.php');
}
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

    <title>Lists of Excuse Letter</title>
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
                    <a href="Lists_of_Concerns.php">
                    <span class="icon"><img src="images/sidebar_menu/Concerns.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title2" ><br>Concerns</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Excuse_Letter.php">
                    <span class="icon"><img src="images/sidebar_menu/Excuse_slip.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title" ><br>Excuse Letter</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Violation.php">
                    <span class="icon"><img src="images/sidebar_menu/Mask group (7).svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title3" ><br>Violation</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Failing_Grades.php">
                    <span class="icon"><img src="images/sidebar_menu/Mask group (8).svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title" ><br>Failing Grades</span>
                    </a>
                </li>
                <li>
                    <a href="Lists_of_Announcement.php">
                    <span class="icon"><img src="images/sidebar_menu/Mask group (9).svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title" ><br>Announcement</span>
                    </a>
                </li>
                

            </ul>
        </div>
        <div class="main">
            <span id="logo"><img src="images/sti_logo.png" alt=""></span>
            <div class="topbar">
                <div class="toptitle">
                    <h2>Manage Excuse Letter</h2>
                </div>
                <div class="icons">
                    <i class="fa fa-bell"></i><span class="badge badge-light">4</span>
                    <i class="fa fa-question-circle"></i>
                </div>
                <div class="dropdown">
                <?php 
                        $student_id = $_SESSION['student_id']; //session created from the credentials table that serves as the foreign key also
                        $query = "SELECT *, CONCAT(First_Name,' ',Last_Name) AS Names FROM `student` WHERE Student_ID='$student_id'"; //it compares the student id from the student table and student id from the credentials
                        $query_run = mysqli_query($link, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $student)
                            {
                                ?>
                    <button class="dropbtn"><?= $student['Names']; ?></button>
                    <div class="dropdown-content">
                    <a href="../logins/logout.php">Logout</a>
                </div>
                </div>
                </div>
            
                </div>
                <?php
                                }
                            }
                            else
                            {
                                
                            }
                        ?>
                <div class="main1">
                <?php include('message.php'); ?>
                    <div class="title2">
                      <h1>Lists of Excuse Letter</h1>
                      <div class="bot">
                        
                      <?php 
                        $student_id = $_SESSION['student_id'];
                        $query = "SELECT * FROM `student` WHERE Student_ID='$student_id'";
                        $query_run = mysqli_query($link, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $student)
                            {
                                ?>
                        <span class="create">
                            <a href="Create_Excuse_Letter.php?id=<?= $student['Student_ID']; ?>"><input type="submit" value="Create"></a>
                        </span>
        
                      <span class="delete"><input type="submit" value="Delete" id="delete_records"></span>
                    
                    </div>
                    </div>
                    <?php
                                }
                            }
                            else
                            {
                                
                            }
                        ?>
                   
                </div>
                </div>
                <div class="card-header">
                    <table id="myDataTable" class="hover" style="margin-left: 80px;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Names</th>
                                <th>Type Of Excuse</th>
                                <th>Status</th> 
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th></th>                                                           
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $student_id = $_SESSION['student_id'];
                            $query = "SELECT * FROM `excuse letter` WHERE Student_ID='$student_id'";
                            $query_run = mysqli_query($link, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $excuse)
                                {
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="emp_checkbox" data-emp-id="<?= $excuse['Excuse_Letter_ID']; ?>">
                                        </td>
                                        <td>Excuse Letter <?= $excuse['Excuse_Letter_ID']; ?></td>
                                        <td><?= $excuse['Description']; ?></td>
                                        <td><?= $excuse['Status']; ?></td>
                                        <td><?= $excuse['Start_Date']; ?></td>
                                        <td><?= $excuse['End_Date']; ?></td>
                                        <td><a href="View_Excuse_Letter.php?id=<?= $excuse['Excuse_Letter_ID']; ?>"><button type="submit" class="btn btn-view">View</button></a></td>
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
                        margin-left: 133px;
                        text-align: center;
                        margin-top: -60px;
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
                                url: "delete_letter_student.php",  
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