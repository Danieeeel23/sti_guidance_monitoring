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
     <link rel="stylesheet" href="Lists_of_Section.css" type="text/css">
     <link href="css/jquery.dataTables.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="delete_script.js"></script>

    <title>List of Sections</title>
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
                <li><a href="">
                    <div class="dropdown1">
                        <span class="icon" style="padding-top: -100px;"><img src="images/sidebar_menu/Manage_Users.svg" alt=""></span>
                        <a class="dropbtn1" style="margin-top: -40px;">
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
                    <span class="icon"><img src="images/sidebar_menu/Announcement.svg" alt=""></span>
                    <span class="title" ><br>Announcement</span>
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
                <div class="toptitle">
                    <h2>Section</h2>
                </div>
                <div class="icons">
                    <i class="fa fa-bell"></i>
                    <i class="fa fa-question-circle"></i>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">Admin</button>
                    <div class="dropdown-content">
                    <a href="../logins/logout.php">Logout</a>
                </div>
                </div>
                </div>
            
                </div>
                
                <div class="main1">
                <?php include('message.php'); ?>
                    <div class="title2">
                      <h1>List of Sections</h1>
                      <div class="bot">
                      <span class="delete"><input type="submit" value="Delete" id="delete_records"></span>
                      <form action="code.php" method="POST" enctype="multipart/form-data">
                        <span class="create">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" id="submit">Add Section</button>                       
                        </span>
                        
                      <!-- <span class="rows_selected" id="select_count">0 Selected</span> -->
                    </div>
                    </div>
                        <!--Accepted Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog"> 
                            <div class="modal-content"> 
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> 
                                    <h5 class="modal-title" id="exampleModalLabel">Add Section</h5>  
                                </div> 
                                <div class="modal-body"> 
                                    <!-- Data passed is displayed in this part of the modal body -->

                                <label for="Section" class="Section">Section Name</label> <input type="text" class="sect" placeholder="" name="section">               

                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#live_search").keyup(function () {
                                var query = $(this).val();
                                if (query != "") {
                                    $.ajax({
                                        url: 'ajax-live-search.php',
                                        method: 'POST',
                                        data: {
                                            query: query
                                        },
                                        success: function (data) {
                                            $('#teacher_result').html(data);
                                            $('#teacher_result').css('display', 'block');
                                            $("#teacher_result").focusout(function () {
                                                $('#teacher_result').css('display', 'none');
                                            });
                                            $("#live_search").focusin(function () {
                                                $('#teacher_result').css('display', 'block');
                                            });
                                        }
                                    });
                                } else {
                                    $('#list1').css('display', 'none');
                                }
                            });
                        });
                    </script>
                    </div>

                    <script>
                    document.querySelector('.select-field').addEventListener('click',()=>{
                        document.querySelector('.list').classList.toggle('show');
                        document.querySelector('.down-arrow').classList.toggle('rotate180');
                    });
                    </script>

                    <script>
                    document.querySelector('.select-field1').addEventListener('click',()=>{
                        document.querySelector('.list1').classList.toggle('show');
                        document.querySelector('.down-arrow1').classList.toggle('rotate180');
                    });
                    </script>

                    <script>
                    document.querySelector('.select-field2').addEventListener('click',()=>{
                        document.querySelector('.list2').classList.toggle('show');
                        document.querySelector('.down-arrow2').classList.toggle('rotate180');
                    });
                    </script>
                                    <h6 id="modal_body"></h6>
                                    <input type="submit" class="btnn" name="save_section" onClick="window.location.href=window.location.href" value="Create"> 
                                </div> 
                            </div> 
                        </div> 
                    </div>
                </div>
                </div>
                <div class="card-header">
                    <table id="myDataTable" class="hover" style="margin-left: 80px;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Section</th>
                                <!-- <th>Teacher Name</th>
                                <th>Student Name</th> -->
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 

                            $query = "SELECT * FROM `section`";
                            $query_run = mysqli_query($link, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $section)
                                {
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="emp_checkbox" data-emp-id="<?= $section['Section_ID']; ?>">
                                        </td>
                                        <td><?= $section['Section']; ?>
                                        <td><a href="Update_Section.php?id=<?= $section['Section_ID']; ?>"><button type="submit" class="btn btn-update">View</button></a></td>
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
                </form>
                
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
                                url: "delete_section.php",  
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

                <!--<script>
                    window.setInterval('refresh()', 300000); 	
                    // Call a function every 10000 milliseconds 
                    // (OR 10 seconds).

                    // Refresh or reload page.
                    function refresh() {
                        window .location.reload();
                    }
                </script>-->
   
</body>
</html>