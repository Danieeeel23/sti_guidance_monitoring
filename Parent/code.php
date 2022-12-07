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
        $_SESSION['message'] = "Multiple Data Deleted Successfully";
        header("Location: Excuseslip.php");
    }
    else
    {
        $_SESSION['message'] = "Multiple Data Not Deleted";
        header("Location: Excuseslip.php");
    }
}

if(isset($_POST['parent_delete_multiple_btn']))
{
    $all_id = $_POST['parent_delete_id'];
    $extract_id = implode(',' , $all_id);
    // echo $extract_id;

    $query = "DELETE FROM `parent` WHERE Parent_ID IN($extract_id) ";

    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Multiple Data Deleted Successfully";
        header("Location: manage_parent.php");
    }
    else
    {
        $_SESSION['message'] = "Multiple Data Not Deleted";
        header("Location: manage_parent.php");
    }
}

if(isset($_POST['update_parent']))
{
    $parent_id = mysqli_real_escape_string($link, $_POST['parent_id']);
    $pfirstname = mysqli_real_escape_string($link, $_POST['pfirstname']);
    $pmiddlename = mysqli_real_escape_string($link, $_POST['pmiddlename']);
    $plastname = mysqli_real_escape_string($link, $_POST['plastname']);
    $pbirthdate = date('Y-m-d', strtotime($_POST['pbirthday']));
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

    $query = "UPDATE parent SET First_Name='$pfirstname', Middle_Name='$pmiddlename', Last_Name='$plastname', Birthdate='$pbirthdate', Gender='$pgender', Address='$paddress', City='$pcity', Province='$pprovince', Postcode='$ppostcode', Telephone_No='$ptelno', Mobile_No='$pmobileno' WHERE Parent_ID='$parent_id'";
    $query_run = mysqli_multi_query($link, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Parent Updated Successfully";
        header("Location: manage_parent.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Parent Not Updated";
        header("Location: manage_parent.php");
        exit(0);
    }

}

//insert student data
if(isset($_POST['save_student_parent']))
{
    $student_id = mysqli_real_escape_string($link, $_POST['studentno']);
    $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($link, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
    $gender = mysqli_real_escape_string($link, $_POST['gender']);
    $birthdate = date('Y-m-d', strtotime($_POST['birthday']));
    $strand = mysqli_real_escape_string($link, $_POST['Strand']);
    $yrlvl = mysqli_real_escape_string($link, $_POST['yrlvl']);
    $section = mysqli_real_escape_string($link, $_POST['section']);
    $day = mysqli_real_escape_string($link, $_POST['Day']);
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
    $pbirthdate = date('Y-m-d', strtotime($_POST['pbirthday']));
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
    ('$pemail','$ppassword','$prole');";

    $query_run = mysqli_multi_query($link, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student and Parent Created Successfully";
        header("Location: manage_student.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student and Parent Not Created";
        header("Location: manage_student.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($link, $_POST['studentno']);
    $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($link, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
    $gender = mysqli_real_escape_string($link, $_POST['gender']);
    $birthdate = date('Y-m-d', strtotime($_POST['birthday']));
    $strand = mysqli_real_escape_string($link, $_POST['Strand']);
    $yrlvl = mysqli_real_escape_string($link, $_POST['yrlvl']);
    $section = mysqli_real_escape_string($link, $_POST['section']);
    $day = mysqli_real_escape_string($link, $_POST['Day']);
    $address = mysqli_real_escape_string($link, $_POST['address']);
    $city = mysqli_real_escape_string($link, $_POST['city']);
    $province = mysqli_real_escape_string($link, $_POST['province']);
    $postcode = mysqli_real_escape_string($link, $_POST['postcode']);
    $telno = mysqli_real_escape_string($link, $_POST['telno']);
    $mobileno = mysqli_real_escape_string($link, $_POST['mobileno']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $role = mysqli_real_escape_string($link, $_POST['role']);

    $query = "UPDATE student SET First_Name='$firstname', Middle_Name='$middlename', Last_Name='$lastname', Gender='$gender', Birthdate='$birthdate', Strand='$strand', Year_Level='$yrlvl', Section='$section', Day='$day', Address='$address', City='$city', Province='$province', Postcode='$postcode', Telephone_No='$telno', Mobile_No='$mobileno' WHERE Student_ID='$student_id'";
    $query_run = mysqli_multi_query($link, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: manage_student.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: manage_student.php");
        exit(0);
    }

}

if(isset($_POST['student_delete_multiple_btn']))
{
    $all_id = $_POST['student_delete_id'];
    $extract_id = implode(',' , $all_id);
    // echo $extract_id;

    $query = "DELETE FROM `student` WHERE Student_ID IN($extract_id) ";

    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Multiple Data Deleted Successfully";
        header("Location: manage_student.php");
    }
    else
    {
        $_SESSION['message'] = "Multiple Data Not Deleted";
        header("Location: manage_student.php");
    }
}

if(isset($_POST['save_teacher']))
{
    $teacher_id = mysqli_real_escape_string($link, $_POST['teacher_id']);
    $tfirstname = mysqli_real_escape_string($link, $_POST['tfirstname']);
    $tmiddlename = mysqli_real_escape_string($link, $_POST['tmiddlename']);
    $tlastname = mysqli_real_escape_string($link, $_POST['tlastname']);
    $department = mysqli_real_escape_string($link, $_POST['Department']);
    $tbirthdate = date('Y-m-d', strtotime($_POST['tbirthday']));
    $tgender = mysqli_real_escape_string($link, $_POST['tgender']);
    $taddress = mysqli_real_escape_string($link, $_POST['taddress']);
    $tcity = mysqli_real_escape_string($link, $_POST['tcity']);
    $tprovince = mysqli_real_escape_string($link, $_POST['tprovince']);
    $tpostcode = mysqli_real_escape_string($link, $_POST['tpostcode']);
    $ttelno = mysqli_real_escape_string($link, $_POST['ttelno']);
    $tmobileno = mysqli_real_escape_string($link, $_POST['tmobileno']);
    $temail = mysqli_real_escape_string($link, $_POST['temail']);
    $tpassword = mysqli_real_escape_string($link, $_POST['tpassword']);
    $trole = mysqli_real_escape_string($link, $_POST['trole']);

    $query = "INSERT INTO `teacher`(`Teacher_ID`, `First_Name`, `Middle_Name`, `Last_Name`, `Department`, `Birthdate`, `Gender`, `Address`, `City`, `Province`, `Postcode`, `Telephone_No`, `Mobile_No`) VALUES 
    ('$teacher_id','$tfirstname','$tmiddlename','$tlastname','$department','$tbirthdate','$tgender','$taddress','$tcity','$tprovince','$tpostcode','$ttelno','$tmobileno'); INSERT INTO `credentials` (`Email`, `Password`, `Role`) VALUES 
    ('$temail','$tpassword','$trole')";

    $query_run = mysqli_multi_query($link, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Teacher Created Successfully";
        header("Location: manage_teacher.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Teacher Not Created";
        header("Location: manage_teacher.php");
        exit(0);
    }
}

if(isset($_POST['update_teacher']))
{
    $teacher_id = mysqli_real_escape_string($link, $_POST['teacher_id']);
    $tfirstname = mysqli_real_escape_string($link, $_POST['tfirstname']);
    $tmiddlename = mysqli_real_escape_string($link, $_POST['tmiddlename']);
    $tlastname = mysqli_real_escape_string($link, $_POST['tlastname']);
    $department = mysqli_real_escape_string($link, $_POST['Department']);
    $tbirthdate = date('Y-m-d', strtotime($_POST['tbirthday']));
    $tgender = mysqli_real_escape_string($link, $_POST['tgender']);
    $taddress = mysqli_real_escape_string($link, $_POST['taddress']);
    $tcity = mysqli_real_escape_string($link, $_POST['tcity']);
    $tprovince = mysqli_real_escape_string($link, $_POST['tprovince']);
    $tpostcode = mysqli_real_escape_string($link, $_POST['tpostcode']);
    $ttelno = mysqli_real_escape_string($link, $_POST['ttelno']);
    $tmobileno = mysqli_real_escape_string($link, $_POST['tmobileno']);
    $temail = mysqli_real_escape_string($link, $_POST['temail']);
    $tpassword = mysqli_real_escape_string($link, $_POST['tpassword']);
    $trole = mysqli_real_escape_string($link, $_POST['trole']);

    $query = "UPDATE teacher SET First_Name='$tfirstname', Middle_Name='$tmiddlename', Last_Name='$tlastname', Department='$department', Birthdate='$tbirthdate', Gender='$tgender', Address='$taddress', City='$tcity', Province='$tprovince', Postcode='$tpostcode', Telephone_No='$ttelno', Mobile_No='$tmobileno' WHERE Teacher_ID='$teacher_id'";
    $query_run = mysqli_multi_query($link, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Teacher Updated Successfully";
        header("Location: manage_teacher.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Teacher Not Updated";
        header("Location: manage_teacher.php");
        exit(0);
    }

}

if(isset($_POST['teacher_delete_multiple_btn']))
{
    $all_id = $_POST['teacher_delete_id'];
    $extract_id = implode(',' , $all_id);
    // echo $extract_id;

    $query = "DELETE FROM `teacher` WHERE Teacher_ID IN($extract_id) ";

    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Multiple Data Deleted Successfully";
        header("Location: manage_teacher.php");
    }
    else
    {
        $_SESSION['message'] = "Multiple Data Not Deleted";
        header("Location: manage_teacher.php");
    }
}

if(isset($_POST['save_excuse_letter']))
{
    $image = $_FILES['file']['name'];
    $image_temp = $_FILES['file']['tmp_name'];

    $student_id = mysqli_real_escape_string($link, $_POST['studentno']);
    $efirstname = mysqli_real_escape_string($link, $_POST['efirstname']);
    $esection = mysqli_real_escape_string($link, $_POST['esection']);
    $eyrlvl = mysqli_real_escape_string($link, $_POST['eyrlvl']);
    $edescription = mysqli_real_escape_string($link, $_POST['statemen']);
    $estatus = mysqli_real_escape_string($link, $_POST['Status']); 
    $ereasons = mysqli_real_escape_string($link, $_POST['reasons']); 
    $estrand = mysqli_real_escape_string($link, $_POST['estrand']);
    $estartdate = date('Y-m-d', strtotime($_POST['startdate']));
    $eenddate = date('Y-m-d', strtotime($_POST['enddate']));
    
    if($image_temp != "")
    {
        move_uploaded_file($image_temp, "uploads/$image");
        $query = "INSERT INTO `excuse letter`(`Student_ID`, `Names`, `Section`, `Year_Level`, `Description`, `Reason_for_Absence`, `Images`, `Status`, `Strand`, `Start_Date`, `End_Date`) VALUES 
        ('$student_id','$efirstname','$esection','$eyrlvl','$edescription','$ereasons','$image','$estatus','$estrand','$estartdate','$eenddate')";
    }else
    {
        $query = "INSERT INTO `excuse letter`(`Student_ID`, `Names`, `Section`, `Year_Level`, `Description`, `Reason_for_Absence`, `Strand`, `Start_Date`, `End_Date`) VALUES 
        ('$student_id','$efirstname','$esection','$eyrlvl','$edescription','$ereasons','$estatus','$estrand','$estartdate','$eenddate')";
    }

    $query_run = mysqli_multi_query($link, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Excuse Letter Created Successfully";
        header("Location: Excuseslip.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Excuse Letter Not Created";
        header("Location: Excuseslip.php");
        exit(0);
    }
}

if(isset($_POST['update_excuse_letter']))
{
    $image = $_FILES['file']['name'];
    $image_temp = $_FILES['file']['tmp_name'];

    $excuseletter_id = mysqli_real_escape_string($link, $_POST['excuseletterno']);
    $student_id = mysqli_real_escape_string($link, $_POST['studentno']);
    $efirstname = mysqli_real_escape_string($link, $_POST['efirstname']);
    $esection = mysqli_real_escape_string($link, $_POST['esection']);
    $eyrlvl = mysqli_real_escape_string($link, $_POST['eyrlvl']);
    $edescription = mysqli_real_escape_string($link, $_POST['statemen']);
    $edatetime = date('Y-m-d H:i:s', strtotime($_POST['datetime']));
    $estatus = mysqli_real_escape_string($link, $_POST['Status']); 
    $estrand = mysqli_real_escape_string($link, $_POST['estrand']);
    $estartdate = date('Y-m-d', strtotime($_POST['startdate']));
    $eenddate = date('Y-m-d', strtotime($_POST['enddate']));

    if($image_temp != "")
    {
        move_uploaded_file($image_temp, "uploads/$image");
        $query = "UPDATE `excuse letter` SET `Status`='$estatus', `Start_Date`='$estartdate', `End_Date`='$eenddate', `Description`='$edescription', `Sent`=now(), `Images`='$image' WHERE Excuse_Letter_ID='$excuseletter_id'";   
    }else
    {
        $query = "UPDATE `excuse letter` SET `Status`='$estatus', `Start_Date`='$estartdate', `End_Date`='$eenddate', `Description`='$edescription', `Sent`=now() WHERE Excuse_Letter_ID='$excuseletter_id'";
    }

    $query_run = mysqli_multi_query($link, $query);
    if($query_run)
    {    
        $_SESSION['message'] = "Excuse Letter Updated Successfully";
        header("Location: Excuseslip.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Excuse Letter Not Updated";
        header("Location: Excuseslip.php");
        exit(0);
    }
}

if(isset($_POST['accepted_excuse_letter']))
{
    $student_id = mysqli_real_escape_string($link, $_POST['studentno']);
    $efirstname = mysqli_real_escape_string($link, $_POST['efirstname']);
    $eyrlvl = mysqli_real_escape_string($link, $_POST['eyrlvl']);
    $estrand = mysqli_real_escape_string($link, $_POST['estrand']);
    $esection = mysqli_real_escape_string($link, $_POST['esection']);
    $estartdate = date('Y-m-d', strtotime($_POST['startdate']));
    $eenddate = date('Y-m-d', strtotime($_POST['enddate']));
    $estatement = mysqli_real_escape_string($link, $_POST['statemen']);
    $ecomments = mysqli_real_escape_string($link, $_POST['ecomments']);
    
    //$file = addslashes(file_get_contents($_FILES["file"]["tmp_name"]));

    $query = "INSERT INTO `send excuse letter`(`Student_ID`, `Names`, `Year_Level`, `Strand`, `Section`, `Start Date`, `End Date`, `Statement`, `Comments`) VALUES 
    ('$student_id','$efirstname','$eyrlvl','$estrand','$esection','$estartdate','$eenddate','$estatement','$ecomments')";

    $query_run = mysqli_multi_query($link, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Excuse Letter Send Successfully";
        header("Location: Excuseslip.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Excuse Letter Not Sent";
        header("Location: Excuseslip.php");
        exit(0);
    }
}

if(isset($_POST['student_save_excuse_letter']))
{
    $student_id = mysqli_real_escape_string($link, $_POST['studentno']);
    $efirstname = mysqli_real_escape_string($link, $_POST['efirstname']);
    $esection = mysqli_real_escape_string($link, $_POST['esection']);
    $eyrlvl = mysqli_real_escape_string($link, $_POST['eyrlvl']);
    $edescription = mysqli_real_escape_string($link, $_POST['statemen']);
    $estatus = mysqli_real_escape_string($link, $_POST['Status']); 
    $ereasons = mysqli_real_escape_string($link, $_POST['reasons']); 
    $estrand = mysqli_real_escape_string($link, $_POST['estrand']);
    $estartdate = date('Y-m-d', strtotime($_POST['sstartdate']));
    $eenddate = date('Y-m-d', strtotime($_POST['sendate']));
    
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../Uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $query = "INSERT INTO `excuse letter`(`Student_ID`, `Names`, `Section`, `Year_Level`, `Description`, `Sent`, `Reason_for_Absence`, `Images`, `Status`, `Strand`, `Start_Date`, `End_Date`) VALUES 
                ('$student_id','$efirstname','$esection','$eyrlvl','$edescription',now(),'$ereasons','$fileNameNew','$estatus','$estrand','$estartdate','$eenddate')";

                $query_run = mysqli_multi_query($link, $query);
                if($query_run)
                {
                    $_SESSION['message'] = "Excuse Letter Send Successfully";
                    header("Location: Lists_of_Excuse_Letter.php");
                    exit(0);
                }
                else
                {
                    $_SESSION['message'] = "Excuse Letter Not Sent";
                    header("Location: Lists_of_Excuse_Letter.php");
                    exit(0);
                }
            } else {
                $_SESSION['message'] = "Your file is too big!";
                header("Location: Lists_of_Excuse_Letter.php");
                exit(0);
            }
        } else {
            $_SESSION['message'] = "There was an error uploading your file!";
            header("Location: Lists_of_Excuse_Letter.php");
            exit(0);
        }
    } else {
        $_SESSION['message'] = "You cannot upload files of this type!";
        header("Location: Lists_of_Excuse_Letter.php");
        exit(0);
    }
}

if(isset($_POST['save_concerns']))
{
    $parent_id = mysqli_real_escape_string($link, $_POST['parentno']);
    $pfirstname = mysqli_real_escape_string($link, $_POST['pfirstname']);
    $reason = mysqli_real_escape_string($link, $_POST['reasons']);
    $pstatus = mysqli_real_escape_string($link, $_POST['status']);
    $pstatement = mysqli_real_escape_string($link, $_POST['statemen']);
  
    $query = "INSERT INTO `concerns`(`Parent_ID`, `Name`, `Reason`, `Statement`, `Status`, `Date`) VALUES 
              ('$parent_id','$pfirstname','$reason','$pstatement','$pstatus',now())";

    $query_run = mysqli_multi_query($link, $query);
        if($query_run)
        {
            $_SESSION['message'] = "Concern Created Successfully";
            header("Location: Lists_of_Concerns.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Concern Not Created";
            header("Location: Lists_of_Concerns.php");
            exit(0);
        }  
}

if(isset($_POST['update_concerns']))
{
    $concern_id = mysqli_real_escape_string($link, $_POST['concernno']);
    $student_id = mysqli_real_escape_string($link, $_POST['studentno']);
    $cname = mysqli_real_escape_string($link, $_POST['cname']);
    $cyrlvl = mysqli_real_escape_string($link, $_POST['cyrlvl']);
    $cstrand = mysqli_real_escape_string($link, $_POST['cstrand']);
    $csection = mysqli_real_escape_string($link, $_POST['csection']);
    $ctitle = mysqli_real_escape_string($link, $_POST['ctitle']);
    $creason = mysqli_real_escape_string($link, $_POST['creason']);
    $cstatus = mysqli_real_escape_string($link, $_POST['Status']);
    $cdate = date('Y-m-d', strtotime($_POST['cdate']));  
    $cstatement = mysqli_real_escape_string($link, $_POST['statemen']);
  
    $query = "UPDATE `concerns` SET `Name`='$cname', `Title`='$ctitle', `Reason`='$creason', `Statement`='$cstatement', `Status`='$cstatus', `Date`='$cdate' WHERE Concern_ID='$concern_id'";

    $query_run = mysqli_multi_query($link, $query);
        if($query_run)
        {
            $_SESSION['message'] = "Violation Created Successfully";
            header("Location: Lists_of_Concerns.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Violation Not Created";
            header("Location: Lists_of_Concerns.php");
            exit(0);
        }  
}


?>