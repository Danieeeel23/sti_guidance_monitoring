<?php
session_start();
require 'config.php';
$link = mysqli_connect("localhost", "root", "", "sti guidance monitoring");

//insert attendance data
if (isset($_POST['save_attendance'])) {
    $classid = mysqli_real_escape_string($link, $_POST['classid']);
    $students = $_POST['students'];
    $status = $_POST['Status'];
    $date = date("Y/m/d");

    if ($students) {
        foreach ($students as $student) {
            $studentid = $student['Student_ID'];
            $firstname = $student['First_Name'];
            $lastname = $student['Last_Name'];

            $query = "INSERT INTO `attendance`(`Class_ID`, `Student_ID`, `Student_First_Name`, `Student_Last_Name`, `Date`, `Status` ) VALUES 
             ('$classid','$subjectid','$studentid','$firstname','$lastname','$date','$subjectid','$status' )";
            $query_run = mysqli_multi_query($link, $query);
        }
    }
    if ($query_run) {
        $_SESSION['message'] = "Attendance Created Successfully";
        header("Location: Lists_of_Subjects.php");
        exit(0);
    } else {
        echo "FAILED!";
    }
}
