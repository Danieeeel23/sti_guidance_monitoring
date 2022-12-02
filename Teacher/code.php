<?php
session_start();
require 'config.php';
$link = mysqli_connect("localhost", "root", "", "sti guidance monitoring");

//insert attendance data
if (isset($_POST['save_attendance'])) {
    $classid = mysqli_real_escape_string($link, $_POST['classid']);
    $subjectid = mysqli_real_escape_string($link, $_POST['classid']);
    $studentids = explode(":", mysqli_real_escape_string($link, $_POST['studentid']));
    $firstnames = explode(":", mysqli_real_escape_string($link, $_POST['firstname']));
    $lastnames = explode(":", mysqli_real_escape_string($link, $_POST['lastname']));
    $status = $_POST['Status'];
    $date = date("Y/m/d");

    if ($studentids) {
        for ($i = 0; $i < count($studentids) - 1; $i++) {
            $query = "INSERT INTO `attendance`(`Class_ID`, `Student_ID`, `Student_First_Name`, `Student_Last_Name`, `Date`, `Status` ) VALUES 
             ('$classid','$studentids[$i]','$firstnames[$i]','$lastnames[$i]','$date', '$status[$i]' )";
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
