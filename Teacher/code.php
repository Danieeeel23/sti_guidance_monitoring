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

//insert failing grades data
if (isset($_POST['save_failing_grades'])) {
    $classid = mysqli_real_escape_string($link, $_POST['classid']);
    $subjectid = mysqli_real_escape_string($link, $_POST['classid']);
    $studentids = explode(":", mysqli_real_escape_string($link, $_POST['studentid']));
    $firstnames = explode(":", mysqli_real_escape_string($link, $_POST['firstname']));
    $lastnames = explode(":", mysqli_real_escape_string($link, $_POST['lastname']));
    $grades = $_POST['Grades'];
    $status = "Invalid";
    $date = date("Y/m/d");

    if ($studentids) {
        //check if class id already exists otherwise insert
        $classidquery = "SELECT DISTINCT Class_ID FROM failing_grades";
        $classidquery_run = mysqli_query($link, $classidquery);

        if (mysqli_num_rows($classidquery_run) > 0) {
            $classes = mysqli_fetch_array($classidquery_run);
            foreach ($classidquery_run as $classes) {
                if ($classes['Class_ID'] == $classid) {
                    //Update Function
                    for ($i = 0; $i < count($studentids) - 1; $i++) {
                        //grades data validation
                        if ($grades[$i] < 75) {
                            $status = "Failed";
                        } else {
                            $status = "Passed";
                        }
                        $query = "UPDATE `failing_grades` SET `Grades` = $grades[$i] ,`Status` = '$status' WHERE `Class_ID` = $classid AND `Student_ID` = '$studentids[$i]'";
                        $query_run = mysqli_multi_query($link, $query);
                    }
                    $message = "Successfully Updated Grades ";
                } else {
                    //Insert Function
                    for ($i = 0; $i < count($studentids) - 1; $i++) {
                        //grades data validation
                        if ($grades[$i] < 75) {
                            $status = "Failed";
                        } else {
                            $status = "Passed";
                        }
                        $query = "INSERT INTO `failing_grades`(`Class_ID`, `Student_ID`, `First_Name`, `Last_Name`, `Grades`, `Status` ) VALUES 
                     ('$classid','$studentids[$i]','$firstnames[$i]','$lastnames[$i]', '$grades[$i]', '$status')";
                        $query_run = mysqli_multi_query($link, $query);
                    }
                    $message = "BAKIT INSERT LANG? " . $classid . $classes['Class_ID'];
                }
            }
        }
        //If no rows inside table yet
        else {
            //Insert Function
            for ($i = 0; $i < count($studentids) - 1; $i++) {
                //grades data validation
                if ($grades[$i] < 75) {
                    $status = "Failed";
                } else {
                    $status = "Passed";
                }
                $query = "INSERT INTO `failing_grades`(`Class_ID`, `Student_ID`, `First_Name`, `Last_Name`, `Grades`, `Status` ) VALUES 
             ('$classid','$studentids[$i]','$firstnames[$i]','$lastnames[$i]', '$grades[$i]', '$status')";
                $query_run = mysqli_multi_query($link, $query);
            }
            $message = "No rows on table yet";
        }
    }

    if ($query_run) {
        $_SESSION['message'] = $message;
        header("Location: Lists_of_Failing_Grades.php");
        exit(0);
    } else {
        echo "FAILED!";
    }
}
