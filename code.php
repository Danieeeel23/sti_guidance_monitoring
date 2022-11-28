<?php
session_start();
require 'config.php';
$link = mysqli_connect("localhost","root","","sti guidance monitoring");

//delete single data
if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($link, $_POST['delete_student']);

    $query = "DELETE FROM student WHERE Student_ID='$student_id' ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

//delete multiple student data
if(isset($_POST['stud_delete_multiple_btn']))
{
    $all_id = $_POST['stud_delete_id'];
    $extract_id = implode(',' , $all_id);
    // echo $extract_id;

    $query = "DELETE FROM student WHERE Student_ID IN($extract_id) ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Multiple Data Deleted Successfully";
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Multiple Data Not Deleted";
        header("Location: index.php");
    }
}

//delete multiple excuse letter data
if(isset($_POST['excuse_delete_multiple_btn']))
{
    $all_id = $_POST['excuse_delete_id'];
    $extract_id = implode(',' , $all_id);
    // echo $extract_id;

    $query = "DELETE FROM `excuse letter` WHERE Excuse_Letter_ID IN($extract_id) ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Multiple Data Deleted Successfully";
        header("Location: listsofexcuseletter.php");
    }
    else
    {
        $_SESSION['status'] = "Multiple Data Not Deleted";
        header("Location: listsofexcuseletter.php");
    }
}

//update student data
if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($link, $_POST['student_id']);

    $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($link, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($link, $_POST['lastname']);

    $query = "UPDATE student SET First_Name='$firstname', Middle_Initial='$middlename', Last_Name='$lastname' WHERE Student_ID='$student_id' ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index.php");
        exit(0);
    }

}

//insert student data
if(isset($_POST['save_student']))
{
    $student_id = mysqli_real_escape_string($link, $_POST['student_id']);
    $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($link, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
    $gender = mysqli_real_escape_string($link, $_POST['gender']);
    $birthdate = date('d-m-Y', strtotime($link, $_POST['birthday']));
    $strand = mysqli_real_escape_string($link, $_POST['Strand']);
    $yrlvl = mysqli_real_escape_string($link, $_POST['yrlvl']);
    $section = mysqli_real_escape_string($link, $_POST['section']);
    $day = mysqli_real_escape_string($link, $_POST['day']);
    $address = mysqli_real_escape_string($link, $_POST['address']);
    $city = mysqli_real_escape_string($link, $_POST['city']);
    $province = mysqli_real_escape_string($link, $_POST['province']);
    $postcode = mysqli_real_escape_string($link, $_POST['postcode']);
    $telno = mysqli_real_escape_string($link, $_POST['telno']);
    $mobileno = mysqli_real_escape_string($link, $_POST['mobileno']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $role = mysqli_real_escape_string($link, $_POST['role']);

    $parent_id = mysqli_real_escape_string($link, $_POST['parent_id']);
    $pfirstname = mysqli_real_escape_string($link, $_POST['pfirstname']);
    $pmiddlename = mysqli_real_escape_string($link, $_POST['pmiddlename']);
    $plastname = mysqli_real_escape_string($link, $_POST['plastname']);
    $pbirthdate = date('d-m-Y', strtotime($link, $_POST['pbirthday']));
    $pgender = mysqli_real_escape_string($link, $_POST['pgender']);
    $paddress = mysqli_real_escape_string($link, $_POST['paddress']);
    $pcity = mysqli_real_escape_string($link, $_POST['pcity']);
    $pprovince = mysqli_real_escape_string($link, $_POST['pprovince']);
    $ppostcode = mysqli_real_escape_string($link, $_POST['ppostcode']);
    $ptelno = mysqli_real_escape_string($link, $_POST['ptelno']);
    $pmobileno = mysqli_real_escape_string($link, $_POST['pmobileno']);
    $pemail = mysqli_real_escape_string($link, $_POST['pemail']);
    $ppassword = mysqli_real_escape_string($link, $_POST['ppassword']);
    $prole = mysqli_real_escape_string($link, $_POST['prole']);

    $query = "INSERT INTO `student`(`Student_ID`, `First_Name`, `Middle_Name`, `Last_Name`, `Gender`, `Birthdate`, `Strand`, `Year_Level`, `Section`, `Day`, `Address`, `City`, `Province`, `Postcode`, `Telephone_No`, `Mobile_No`) VALUES 
    ('$student_id','$firstname','$middlename','$lastname','$gender','$birthdate','$strand','$yrlvl','$section','$day','$address','$city','$province','$postcode','$telno','$mobileno'); INSERT INTO `credentials` (`Email`, `Password`, `Role`) VALUES 
    ('$email','$password','$role'); INSERT INTO `parent`(`Parent_ID`, `First_Name`, `Middle_Name`, `Last_Name`, `Birthdate`, `Gender`, `Address`, `City`, `Province`, `Postcode`, `Telephone_No`, `Mobile_No`) VALUES
    ('$parent_id','$pfirstname','$pmiddlename','$plastname','$pbirthdate','$pgender','$paddress','$pcity','$pprovince','$ppostcode','$ptelno','$pmobileno'); INSERT INTO `credentials` (`Email`, `Password`, `Role`) VALUES
    ('$pemail','$ppassword','$prole')";

    $query_run = mysqli_multi_query($link, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student and Parent Created Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student and Parent Not Created";
        header("Location: index.php");
        exit(0);
    }
}

?>