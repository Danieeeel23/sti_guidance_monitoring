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
    <link rel="stylesheet" href="Lists_of_Teacher.css">
    <link href="css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="delete_script.js"></script>

    <title>List of Teacher</title>
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
                    <span class="icon"><img src="images/sidebar_menu/Excuse_slip.svg" alt=""></span><span class="badge2 badge-primary">4</span>
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
                            <a href="Lists_of_Subjects.php">Subjects</a>
                            <a href="Lists_of_Section.php">Sections</a>
                            <a href="Lists_of_Schedule.php">Classes</a>
                        </div>
                    </div></a>            
                </li>
                <li>
                    <a href="Lists_of_Announcement.php">
                    <span class="icon"><img src="images/sidebar_menu/Announcement.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title" ><br>Announcement</span>
                    </a>
                </li>
                <li>
                    <a href="Student_Record.php">
                    <span class="icon"><img src="images/sidebar_menu/Student_Record.svg" alt=""></span><span class="badge2 badge-primary">4</span>
                    <span class="title" ><br>Student Record</span>
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
                    <span class="icon"><img src="images/sidebar_menu/Inquiry.svg" alt=""></span><span class="badge2 badge-primary">4</span>
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
                    <i class="fa fa-bell"></i><span class="badge badge-light">4</span>
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
                      <h1>List of Teacher</h1>
                      <div class="bot">
                        <span class="create">
                            <form action="MyUserTech.php" method="POST"> 
                            <input type="submit" class="btn btn-primary btn-lg" value="Create"> 
                            </form>
                        </span>
                      <span class="delete"><input type="submit" value="Delete" id="delete_records"></span>
                      <form action="" method="POST" enctype="multipart/form-data">
                      <input type="file" id="inputFile" style="width:88%; margin-top: 33px; margin-right: -85px; " name="excel" onchange="readURL(this);" required/> 
                      <span class="import"><input type="submit" name="imports" value="Import"></span>
                      </form>
                    </div>
                    </div>
                   
                </div>
                </div>
                <div class="card-header">
                    <table id="myDataTable" class="hover" style="margin-left: 80px;">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Names</th>
                                <th>Department</th> 
                                <th>Update</th>  
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 1;
                                $query = "SELECT *, CONCAT(First_Name,' ',Middle_Initial,' ',Last_Name) AS Names FROM `teacher`";
                                $query_run = mysqli_query($link, $query);

                                    foreach($query_run as $teacher) :
 
                                        ?>
                                        <tr>
                                            <td> <?php echo $i++; ?> </td>
                                            <td>
                                                <input type="checkbox" class="emp_checkbox" data-emp-id="<?= $teacher['Teacher_ID']; ?>">
                                            </td>
                                            <td><?= $teacher['Names']; ?></a></td>
                                            <td><?= $teacher['Department']; ?></td>
                                            <td><a href="Teacher_Update.php?id=<?= $teacher['Teacher_ID']; ?>"><button type="submit" class="btn btn-update" style="margin-left: 15px;">View</button></a></td>
                                        </tr>
                                        <?php endforeach; ?>

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
                            lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']]
                        } )
                    } );
                </script>
                <style>
                    .card-header{                       
                        margin-left: 140px;
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
                                url: "delete_teacher.php",  
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
                 <?php
                    if(isset($_POST['imports']))
                    {
                        $fileName = $_FILES['excel']['name'];
                        $fileExtension = explode('.', $fileName);
                        $fileExtension = strtolower(end($fileExtension));

                        $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;
                        $targetDirectory = '../Uploads/' . $newFileName;
                        move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

                        error_reporting(0);
                        ini_set('display_errors', 0);

                        require "excelReader/excel_reader2.php";
                        require "excelReader/SpreadsheetReader.php";

                        $reader = new SpreadsheetReader($targetDirectory);
                        foreach($reader as $key => $row){
                            $teacher_id = $row[0];
                            $firstname = $row[1];
                            $middlename = $row[2];
                            $lastname = $row[3];
                            $department = $row[4];
                            $birthdate = $row[5];
                            $gender = $row[6];                           
                            $address = $row[7];
                            $city = $row[8];
                            $province = $row[9];
                            $postcode = $row[10];
                            $telno = $row[11];
                            $mobileno = $row[12];
                            $query = "INSERT INTO `teacher` VALUES 
                                ('$teacher_id','$firstname','$middlename','$lastname','$department','$birthdate','$gender','$address','$city','$province','$postcode','$telno','$mobileno')";
                                echo "<meta http-equiv='refresh' content='0'>";
                            $query_run = mysqli_multi_query($link, $query);
                            if($query_run)
                            {
                                $_SESSION['message'] = "Excel File Imported Successfully";             
                            }
                            else
                            {
                                $_SESSION['message'] = "Excel File Not Imported";
                            }  
                        }  
                    }
                ?>

</body>
</html>