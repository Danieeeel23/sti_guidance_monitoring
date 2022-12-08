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
    $remarks = mysqli_real_escape_string($link, $_POST['remarks']);
    $date = date("Y-m-d");
    
    if ($studentids) {
        //check if class id already exists otherwise insert
        $classidquery = "SELECT DISTINCT Class_ID, Date FROM attendance";
        $classidquery_run = mysqli_query($link, $classidquery);

        if (mysqli_num_rows($classidquery_run) > 0) {
            foreach ($classidquery_run as $classes) {
                if ($classid == $classes['Class_ID'] && $date == $classes['Date']) {
                    $today = $classid;
                }
            }
        }
        if($today){
            for ($i = 0; $i < count($studentids) - 1; $i++) {
                $query = "UPDATE `attendance` SET `Status` = '$status[$i]' WHERE Student_ID = '$studentids[$i]' AND Date = '$date'";
                $query_run = mysqli_multi_query($link, $query);
            }
        }
        else{
            for ($i = 0; $i < count($studentids) - 1; $i++) {
                $query = "INSERT INTO `attendance`(`Class_ID`, `Student_ID`, `Student_First_Name`, `Student_Last_Name`, `Date`, `Status`, `Remarks`) VALUES 
                 ('$classid','$studentids[$i]','$firstnames[$i]','$lastnames[$i]','$date', '$status[$i]', '$remarks')";
                $query_run = mysqli_multi_query($link, $query);
            }
        }
    
    }

    if ($query_run) {
        $_SESSION['message'] = "Attendance Created Successfully";
        
    } else {
        $_SESSION['message'] = "Failed to Create Attendance";
    }
    header("Location: Attendance_Classes.php");
        exit(0);
}

//insert failing grades data
if (isset($_POST['save_grades'])) {
    $classid = mysqli_real_escape_string($link, $_POST['classid']);
    $subjectid = mysqli_real_escape_string($link, $_POST['classid']);
    $subjectname = mysqli_real_escape_string($link, $_POST['subjectname']);
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
                //Wag mong subukang kumulang sa 60
                if ($grades[$i] < 60) {
                    $grades[$i] = 60;
                }
                //o sumobra sa 99 
                elseif ($grades[$i] > 99) {
                    $grades[$i] = 99;
                } else {
                    $grades[$i] = $grades[$i];
                }
                //grades data validation
                if ($grades[$i] < 75) {
                    $status = "Failed";
                } else {
                    $status = "Passed";
                } 
                /* Issue na napansin ni Papi Sals
                    Pag nag insert ng grades
                    Then insert student
                    Hindi napansin yung ibang students kasi chinecheck lang yung existing yung class, not the student
                    Bale nag uupdate lang sya, imbis na mag insert ng missing students
                    dito ko ichecheck kung existing na yung student sa table. Pag hindi, insert. 
                */
                $selectquery = "SELECT * FROM failing_grades WHERE Student_ID = '$studentids[$i]'";
                $selectquery_run = mysqli_query($link, $selectquery);
                if(mysqli_num_rows($selectquery_run) > 0){
                    $query = "UPDATE `failing_grades` SET `Grades` = $grades[$i] ,`Status` = '$status' WHERE `Class_ID` = $existingclass AND `Student_ID` = '$studentids[$i]' AND `Quarter` = '$selectedquarter'";
                    $query_run = mysqli_multi_query($link, $query);
                }else{
                    if ($selectedquarter == "1st") {
                        $grades = $grades1st;
                    } else {
                        $grades = $grades2nd;
                    }
                //insert first quarter
                $query = "INSERT INTO `failing_grades`(`Class_ID`, `Student_ID`, `First_Name`, `Last_Name`, `Subject_Name`, `Quarter`, `Grades`, `Status`) VALUES 
                ('$classid','$studentids[$i]','$firstnames[$i]','$lastnames[$i]', '$subjectname', '1st', '$grades[$i]', '$status')";
                $query_run = mysqli_query($link, $query);

                //Set default values for 2nd quarter
                $queryy = "INSERT INTO `failing_grades`(`Class_ID`, `Student_ID`, `First_Name`, `Last_Name`, `Subject_Name`, `Quarter`, `Grades`, `Status`) VALUES 
                ('$classid','$studentids[$i]','$firstnames[$i]','$lastnames[$i]', '$subjectname', '2nd', '$grades[$i]', '$status')";
                $query_run1 = mysqli_query($link, $queryy);
                }
            }
            if ($query_run) {
                $message = "Successfully Updated Grades ";
            } elseif ($query_run && $query_run1){
                $message = "Successfully Inserted Missing Students ";
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
                //insert first quarter
                $query = "INSERT INTO `failing_grades`(`Class_ID`, `Student_ID`, `First_Name`, `Last_Name`, `Subject_Name`, `Quarter`, `Grades`, `Status`) VALUES 
             ('$classid','$studentids[$i]','$firstnames[$i]','$lastnames[$i]', '$subjectname', '1st', '$grades[$i]', '$status')";
                $query_run = mysqli_multi_query($link, $query);

                //Set default values for 2nd quarter
                $query1 = "INSERT INTO `failing_grades`(`Class_ID`, `Student_ID`, `First_Name`, `Last_Name`, `Subject_Name`, `Quarter`, `Grades`, `Status`) VALUES 
             ('$classid','$studentids[$i]','$firstnames[$i]','$lastnames[$i]', '$subjectname', '2nd', 60, '$status')";
                $query_run1 = mysqli_multi_query($link, $query1);
            }
            if ($query_run && $query_run1) {
                $message = "Successfully Inserted Grades";
            } else {
                $message = "Failed to Insert Students! ";
            }
        }
    }

    $_SESSION['message'] = $message;
    header("Location: Grades_Classes.php");
    exit(0);
}

//update attendance data
if (isset($_POST['update_attendance'])) {
    $classid = mysqli_real_escape_string($link, $_POST['classid']);
    $subjectid = mysqli_real_escape_string($link, $_POST['classid']);
    $studentids = explode(":", mysqli_real_escape_string($link, $_POST['studentid']));
    $firstnames = explode(":", mysqli_real_escape_string($link, $_POST['firstname']));
    $lastnames = explode(":", mysqli_real_escape_string($link, $_POST['lastname']));
    $status = $_POST['Status'];
    $date = mysqli_real_escape_string($link, $_POST['selecteddate']);

    if ($studentids) {
        for ($i = 0; $i < count($studentids) - 1; $i++) {
            $query = "UPDATE `attendance` SET `Status` = '$status[$i]' WHERE Student_ID = '$studentids[$i]' AND Date = '$date'";
            $query_run = mysqli_multi_query($link, $query);
        }
    }

    if ($query_run) {
        $_SESSION['message'] = "Attendance Updated Successfully";
    } else {
        $_SESSION['message'] = "Failed to Create Attendance";
    }
    header("Location: Attendance_Classes.php");
    exit(0);
}
