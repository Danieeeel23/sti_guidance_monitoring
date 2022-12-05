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
        header("Location: Attendance_Classes.php");
        exit(0);
    } else {
        echo "FAILED!";
    }
}

//insert failing grades data
if (isset($_POST['save_grades'])) {
    $classid = mysqli_real_escape_string($link, $_POST['classid']);
    $subjectid = mysqli_real_escape_string($link, $_POST['classid']);
    $studentids = explode(":", mysqli_real_escape_string($link, $_POST['studentid']));
    $firstnames = explode(":", mysqli_real_escape_string($link, $_POST['firstname']));
    $lastnames = explode(":", mysqli_real_escape_string($link, $_POST['lastname']));
    $grades1st = $_POST['Grades1st'];
    // $quarters1st = $_POST['Quarters1st'];
    $grades2nd = $_POST['Grades2nd'];
    // $quarters2nd = $_POST['Quarters2nd'];
    $selectedquarter = $_POST['selectedquarter'];
    $status = "Invalid";
    $date = date("Y/m/d");

    if ($studentids) {
        //check if class id already exists otherwise insert
        $classidquery = "SELECT DISTINCT Class_ID FROM failing_grades";
        $classidquery_run = mysqli_query($link, $classidquery);

        if (mysqli_num_rows($classidquery_run) > 0) {
            foreach ($classidquery_run as $classes) {
                if ($classid == $classes['Class_ID']) {
                    $existingclass = $classid;
                }
            }
        }
        if ($existingclass) {
            if ($selectedquarter == "1st") {
                $grades = $grades1st;
            } else {
                $grades = $grades2nd;
            }
            //Update Function
            for ($i = 0; $i < count($studentids) - 1; $i++) {
                //grades data validation
                if ($grades[$i] < 75) {
                    $status = "Failed";
                } else {
                    $status = "Passed";
                }
                $query = "UPDATE `failing_grades` SET `Grades` = $grades[$i] ,`Status` = '$status' WHERE `Class_ID` = $existingclass AND `Student_ID` = '$studentids[$i]' AND `Quarter` = '$selectedquarter'";
                $query_run = mysqli_multi_query($link, $query);
            }
            if ($query_run) {
                $message = "Successfully Updated Grades ";
            } else {
                $message = "FAILED ";
            }
        } else {
            if ($selectedquarter == "1st") {
                $grades = $grades1st;
            } else {
                $grades = $grades2nd;
            }
            //Insert Function
            for ($i = 0; $i < count($studentids) - 1; $i++) {
                //grades data validation
                if ($grades[$i] < 75) {
                    $status = "Failed";
                } else {
                    $status = "Passed";
                }
                $query = "INSERT INTO `failing_grades`(`Class_ID`, `Student_ID`, `First_Name`, `Last_Name`, `Quarter`, `Grades`, `Status` ) VALUES 
             ('$classid','$studentids[$i]','$firstnames[$i]','$lastnames[$i]', '1st', '$grades[$i]', '$status')";
                $query_run = mysqli_multi_query($link, $query);

                //Set default values for 2nd quarter
                $query1 = "INSERT INTO `failing_grades`(`Class_ID`, `Student_ID`, `First_Name`, `Last_Name`, `Quarter`, `Grades`, `Status` ) VALUES 
             ('$classid','$studentids[$i]','$firstnames[$i]','$lastnames[$i]', '2nd', 0, '$status')";
                $query_run1 = mysqli_multi_query($link, $query1);
            }
            if ($query_run) {
                $message = "Successfully Inserted Grades";
            } else {
                $message = "Failed!";
            }
        }
    }

    $_SESSION['message'] = $message;
    header("Location: Grades_Classes.php");
    exit(0);
}
