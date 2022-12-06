<?php
session_start();
require 'config.php';
$link = mysqli_connect("localhost", "root", "", "sti guidance monitoring");

//delete single data
if (isset($_POST['delete_student'])) {
    $student_id = mysqli_real_escape_string($link, $_POST['delete_student']);

    $query = "DELETE FROM student WHERE Student_ID='$student_id' ";
    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

//delete multiple student data
if (isset($_POST['stud_delete_multiple_btn'])) {
    $all_id = $_POST['stud_delete_id'];
    $extract_id = implode(',', $all_id);
    // echo $extract_id;

    $query = "DELETE FROM student WHERE Student_ID IN($extract_id) ";
    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        $_SESSION['status'] = "Multiple Data Deleted Successfully";
        header("Location: index.php");
    } else {
        $_SESSION['status'] = "Multiple Data Not Deleted";
        header("Location: index.php");
    }
}

//delete multiple excuse letter data
if (isset($_POST['excuse_delete_multiple_btn'])) {
    $all_id = $_POST['excuse_delete_id'];
    $extract_id = implode(',', $all_id);
    // echo $extract_id;

    $query = "DELETE FROM `excuse letter` WHERE Excuse_Letter_ID IN($extract_id) ";
    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        $_SESSION['message'] = "Multiple Data Deleted Successfully";
        header("Location: Excuseslip.php");
    } else {
        $_SESSION['message'] = "Multiple Data Not Deleted";
        header("Location: Excuseslip.php");
    }
}

if (isset($_POST['parent_delete_multiple_btn'])) {
    $all_id = $_POST['parent_delete_id'];
    $extract_id = implode(',', $all_id);
    // echo $extract_id;

    $query = "DELETE FROM `parent` WHERE Parent_ID IN($extract_id) ";

    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        $_SESSION['message'] = "Multiple Data Deleted Successfully";
        header("Location: Lists_of_Parent.php");
    } else {
        $_SESSION['message'] = "Multiple Data Not Deleted";
        header("Location: Lists_of_Parent.php");
    }
}

if (isset($_POST['update_parent'])) {
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

    if ($query_run) {
        $_SESSION['message'] = "Parent Updated Successfully";
        header("Location: Lists_of_Parent.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Parent Not Updated";
        header("Location: Lists_of_Parent.php");
        exit(0);
    }
}

//insert student data
if (isset($_POST['save_student'])) {
    require_once("PHPMailer/PHPMailerAutoload.php");

    // Generate Random Password
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
    $password = substr(str_shuffle($chars), 0, 8);

    // Encrypt password
    //$password = password_hash($password, PASSWORD_ARGON2I);

    $_SESSION['studentid'] = $student_id = rand();
    $strand_id = rand();
    $credential = mysqli_real_escape_string($link, $_POST['credential']);

    $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($link, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
    $birthdate = date('Y-m-d', strtotime($_POST['birthday']));
    $gender = mysqli_real_escape_string($link, $_POST['gender']);

    $yrlvl = mysqli_real_escape_string($link, $_POST['yrlvl']);
    $section = mysqli_real_escape_string($link, $_POST['Section']);

    $strand = mysqli_real_escape_string($link, $_POST['Strand']);
    //$_SESSION['strand'] = $strand;


    $address = mysqli_real_escape_string($link, $_POST['address']);
    $city = mysqli_real_escape_string($link, $_POST['city']);
    $province = mysqli_real_escape_string($link, $_POST['province']);
    $postcode = mysqli_real_escape_string($link, $_POST['postcode']);
    $telno = mysqli_real_escape_string($link, $_POST['telno']);
    $mobileno = mysqli_real_escape_string($link, $_POST['mobileno']);
    $email = mysqli_real_escape_string($link, $_POST['email']);

    $role = mysqli_real_escape_string($link, $_POST['role']);

    //Instantiation and passing true enables exceptions
    $mail = new PHPMailer;

    try {
        //Enable verbose debug output
        $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;

        //Send using SMTP
        $mail->isSMTP();

        //Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';

        //Enable SMTP authentication
        $mail->SMTPAuth = true;

        //SMTP username
        $mail->Username = 'guidance.stidasma@gmail.com';

        //SMTP password
        $mail->Password = 'tnufgftypgjmcdug';

        //Enable TLS encryption;
        $mail->SMTPSecure = 'tls';

        //TCP port to connect to, use 465 for PHPMailer::ENCRYPTION_SMTPS above
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('guidance.stidasma@gmail.com');

        //Add a recipient
        $mail->addAddress($email);

        //Set email format to HTML
        $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Your Account Details!';
        $mail->Body    = '<p>Good Day!</p>
                            <p>Your Guidance Department account login details.</b></p>
                            <p>Your email address is: <b style="font-size: 12px;">' . $email . '</p>
                            <p>Your password is: <b style="font-size: 12px;">' . $password . '</b></p>
                            <p>This account is intended for school purposes only. Track your school records now.</b></p>
                            <p>Thank you,</b></p>
                            <p>The Guidance Department - STI College Dasmarinas</p>';

        $mail->send();
        // echo 'Message has been sent';

        $query = "INSERT INTO `student`(`Student_ID`, `First_Name`, `Middle_Name`, `Last_Name`, `Gender`, `Birthdate`, `Strand`, `Year_Level`, `Section`, `Address`, `City`, `Province`, `Postcode`, `Telephone_No`, `Mobile_No`) VALUES 
        (" . $_SESSION['studentid'] . ",'$firstname','$middlename','$lastname','$gender','$birthdate','$strand','$yrlvl','$section','$address','$city','$province','$postcode','$telno','$mobileno'); INSERT INTO `credentials` (`Student_ID`,`Email`, `Password`, `Role`) VALUES 
        ('$student_id','$email','$password','$role');";

        $query_run = mysqli_multi_query($link, $query);
        if ($query_run) {

            header("Location: Manage_Parent.php");
            exit(0);
        } else {

            header("Location: Lists_of_Student.php");
            exit(0);
        }

        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

//insert parent data
if (isset($_POST['save_parent'])) {
    require_once("PHPMailer/PHPMailerAutoload.php");

    // Generate Random Password
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
    $password = substr(str_shuffle($chars), 0, 8);

    // Encrypt password
    //$password = password_hash($password, PASSWORD_ARGON2I);

    $_SESSION['parentid'] = $parent_id = rand();
    $_SESSION['studentid'];
    $pfirstname = mysqli_real_escape_string($link, $_POST['pfirstname']);
    $pmiddlename = mysqli_real_escape_string($link, $_POST['pmiddlename']);
    $plastname = mysqli_real_escape_string($link, $_POST['plastname']);
    $pgender = mysqli_real_escape_string($link, $_POST['pgender']);
    $paddress = mysqli_real_escape_string($link, $_POST['paddress']);
    $pcity = mysqli_real_escape_string($link, $_POST['pcity']);
    $pprovince = mysqli_real_escape_string($link, $_POST['pprovince']);
    $ppostcode = mysqli_real_escape_string($link, $_POST['ppostcode']);
    $ptelno = mysqli_real_escape_string($link, $_POST['ptelno']);
    $pmobileno = mysqli_real_escape_string($link, $_POST['pmobileno']);
    $email = mysqli_real_escape_string($link, $_POST['pemail']);
    $prole = mysqli_real_escape_string($link, $_POST['prole']);

    //Instantiation and passing true enables exceptions
    $mail = new PHPMailer;

    try {
        //Enable verbose debug output
        $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;

        //Send using SMTP
        $mail->isSMTP();

        //Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';

        //Enable SMTP authentication
        $mail->SMTPAuth = true;

        //SMTP username
        $mail->Username = 'guidance.stidasma@gmail.com';

        //SMTP password
        $mail->Password = 'tnufgftypgjmcdug';

        //Enable TLS encryption;
        $mail->SMTPSecure = 'tls';

        //TCP port to connect to, use 465 for PHPMailer::ENCRYPTION_SMTPS above
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('guidance.stidasma@gmail.com');

        //Add a recipient
        $mail->addAddress($email);

        //Set email format to HTML
        $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Your Account Details!';
        $mail->Body    = '<p>Good Day!</p>
                            <p>Your Guidance Department account login details.</b></p>
                            <p>Your email address is: <b style="font-size: 12px;">' . $email . '</p>
                            <p>Your password is: <b style="font-size: 12px;">' . $password . '</b></p>
                            <p>This account is intended for school purposes only. You can monitor your childs record and performance now.</b></p>
                            <p>Thank you,</b></p>
                            <p>The Guidance Department - STI College Dasmarinas</p>';

        $mail->send();
        // echo 'Message has been sent';

        $query = "INSERT INTO `parent`(`Parent_ID`, `Student_ID`, `First_Name`, `Middle_Name`, `Last_Name`, `Gender`, `Address`, `City`, `Province`, `Postcode`, `Telephone_No`, `Mobile_No`) VALUES
        ('$parent_id'," . $_SESSION['studentid'] . ",'$pfirstname','$pmiddlename','$plastname','$pgender','$paddress','$pcity','$pprovince','$ppostcode','$ptelno','$pmobileno'); INSERT INTO `credentials` (`Parent_ID`,`Student_ID`,`Email`, `Password`, `Role`) VALUES
        ('$parent_id'," . $_SESSION['studentid'] . ",'$email','$password','$prole'); UPDATE student SET Parent_ID='$parent_id' WHERE Student_ID='$_SESSION[studentid]'; UPDATE credentials SET Parent_ID='$parent_id' WHERE Student_ID='$_SESSION[studentid]'";

        $query_run = mysqli_multi_query($link, $query);
        if ($query_run) {
            $_SESSION['message'] = "Student and Parent Created Successfully";
            header("Location: dash.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Student and Parent Not Created";
            header("Location: dash.php");
            exit(0);
        }

        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

//update student data
if (isset($_POST['update_student'])) {
    $student_id = mysqli_real_escape_string($link, $_POST['studentno']);
    $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($link, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
    $gender = mysqli_real_escape_string($link, $_POST['gender']);
    $birthdate = date('Y-m-d', strtotime($_POST['birthday']));
    $strand = mysqli_real_escape_string($link, $_POST['Strand']);
    $yrlvl = mysqli_real_escape_string($link, $_POST['yrlvl']);
    $section = mysqli_real_escape_string($link, $_POST['section']);
    $address = mysqli_real_escape_string($link, $_POST['address']);
    $city = mysqli_real_escape_string($link, $_POST['city']);
    $province = mysqli_real_escape_string($link, $_POST['province']);
    $postcode = mysqli_real_escape_string($link, $_POST['postcode']);
    $telno = mysqli_real_escape_string($link, $_POST['telno']);
    $mobileno = mysqli_real_escape_string($link, $_POST['mobileno']);
    $role = mysqli_real_escape_string($link, $_POST['role']);

    $query = "UPDATE student SET First_Name='$firstname', Middle_Name='$middlename', Last_Name='$lastname', Gender='$gender', Birthdate='$birthdate', Strand='$strand', Year_Level='$yrlvl', Section='$section', Address='$address', City='$city', Province='$province', Postcode='$postcode', Telephone_No='$telno', Mobile_No='$mobileno' WHERE Student_ID='$student_id'";
    $query_run = mysqli_multi_query($link, $query);

    if ($query_run) {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: Lists_of_Student.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: Lists_of_Student.php");
        exit(0);
    }
}

if (isset($_POST['student_delete_multiple_btn'])) {
    $all_id = $_POST['student_delete_id'];
    $extract_id = implode(',', $all_id);
    // echo $extract_id;

    $query = "DELETE FROM `student` WHERE Student_ID IN($extract_id) ";

    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        $_SESSION['message'] = "Multiple Data Deleted Successfully";
        header("Location: manage_student.php");
    } else {
        $_SESSION['message'] = "Multiple Data Not Deleted";
        header("Location: manage_student.php");
    }
}

//insert teacher data
if (isset($_POST['save_teacher'])) {
    require_once("PHPMailer/PHPMailerAutoload.php");

    // Generate Random Password
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
    $password = substr(str_shuffle($chars), 0, 8);

    // Encrypt password
    //$password = password_hash($password, PASSWORD_ARGON2I);

    $teacher_id = rand();
    $subject_id = rand();
    $tfirstname = mysqli_real_escape_string($link, $_POST['tfirstname']);
    $tmiddlename = mysqli_real_escape_string($link, $_POST['tmiddlename']);
    $tlastname = mysqli_real_escape_string($link, $_POST['tlastname']);
    //$tsubject = $_POST['subject'];
    $subjectArray = mysqli_real_escape_string($link, $_POST['subject[]']);
    // ipasa sa new variable ung array galing sa html
    // $subject1 = subject[0];
    // $x=0;
    // while(){
    // condition nyo check if may laman ung array
    //$subjectItem[$x] = $subjectArray[$x];
    // ipasa ung laman ng array sa php variable
    //$x++;
    // mag +1 para ung x mag loop
    //  $all_sub = $all_sub . "/" . $subjectItem[$x];
    //}
    // ipasok sa final variable ung current laman plus ung dadagdag
    // programming/filipino/english
    // output na mapapasa sa table

    // explode("/", subjectDB);

    $tstrand = $_POST['strand'];
    $department = mysqli_real_escape_string($link, $_POST['Department']);
    $tgender = mysqli_real_escape_string($link, $_POST['tgender']);
    $taddress = mysqli_real_escape_string($link, $_POST['taddress']);
    $tcity = mysqli_real_escape_string($link, $_POST['tcity']);
    $tprovince = mysqli_real_escape_string($link, $_POST['tprovince']);
    $tpostcode = mysqli_real_escape_string($link, $_POST['tpostcode']);
    $ttelno = mysqli_real_escape_string($link, $_POST['ttelno']);
    $tmobileno = mysqli_real_escape_string($link, $_POST['tmobileno']);
    $email = mysqli_real_escape_string($link, $_POST['temail']);
    $trole = mysqli_real_escape_string($link, $_POST['trole']);

    //Instantiation and passing true enables exceptions
    $mail = new PHPMailer;

    try {
        //Enable verbose debug output
        $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;

        //Send using SMTP
        $mail->isSMTP();

        //Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';

        //Enable SMTP authentication
        $mail->SMTPAuth = true;

        //SMTP username
        $mail->Username = 'guidance.stidasma@gmail.com';

        //SMTP password
        $mail->Password = 'tnufgftypgjmcdug';

        //Enable TLS encryption;
        $mail->SMTPSecure = 'tls';

        //TCP port to connect to, use 465 for PHPMailer::ENCRYPTION_SMTPS above
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('guidance.stidasma@gmail.com');

        //Add a recipient
        $mail->addAddress($email);

        //Set email format to HTML
        $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Your Account Details!';
        $mail->Body    = '<p>Good Day!</p>
                            <p>Your Guidance Deparment account login details.</b></p>
                            <p>Your email address is: <b style="font-size: 12px;">' . $email . '</p>
                            <p>Your password is: <b style="font-size: 12px;">' . $password . '</b></p>
                            <p>This account is intended for school purposes only. You can manage your student records in your account and being monitored also by the Guidance Office.</b></p>
                            <p>Thank you,</b></p>
                            <p>The Guidance Department - STI College Dasmarinas</p>';

        $mail->send();
        // echo 'Message has been sent';

        $query = "INSERT INTO `teacher`(`Teacher_ID`, `First_Name`, `Middle_Initial`, `Last_Name`, `Department`, `Gender`, `Address`, `City`, `Province`, `Postcode`, `Telephone_No`, `Mobile_No`) VALUES 
        ('$teacher_id','$tfirstname','$tmiddlename','$tlastname','$department','$tgender','$taddress','$tcity','$tprovince','$tpostcode','$ttelno','$tmobileno'); INSERT INTO `credentials` (`Teacher_ID`,`Email`, `Password`, `Role`) VALUES 
        ('$teacher_id','$email','$password','$trole'); INSERT INTO `subject`(`Subject_ID`,`Teacher_ID`,`Student_ID`,`Student_Name`,`Subject_Name`) VALUES ('$subject_id','$teacher_id','$student_id','$student_name','$subjectArray'); INSERT INTO `strand`(`Subject_ID`,`Teacher_ID`,`Student_ID`,`Name`) VALUES ('$subject_id','$teacher_id','$student_id','$subjectArray'); INSERT INTO `class`(`Subject_ID`,`Teacher_ID`) VALUES ('$subject_id','$teacher_id')";

        $query_run = mysqli_multi_query($link, $query);
        if ($query_run) {
            $_SESSION['message'] = "Teacher Created Successfully";
            header("Location: Lists_of_Teacher.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Teacher Not Created";
            header("Location: Lists_of_Teacher.php");
            exit(0);
        }

        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

//update teacher data
if (isset($_POST['update_teacher'])) {
    $teacher_id = mysqli_real_escape_string($link, $_POST['teacher_id']);
    $tfirstname = mysqli_real_escape_string($link, $_POST['tfirstname']);
    $tmiddlename = mysqli_real_escape_string($link, $_POST['tmiddlename']);
    $tlastname = mysqli_real_escape_string($link, $_POST['tlastname']);
    $department = mysqli_real_escape_string($link, $_POST['Department']);
    $tgender = mysqli_real_escape_string($link, $_POST['tgender']);
    $taddress = mysqli_real_escape_string($link, $_POST['taddress']);
    $tcity = mysqli_real_escape_string($link, $_POST['tcity']);
    $tprovince = mysqli_real_escape_string($link, $_POST['tprovince']);
    $tpostcode = mysqli_real_escape_string($link, $_POST['tpostcode']);
    $ttelno = mysqli_real_escape_string($link, $_POST['ttelno']);
    $tmobileno = mysqli_real_escape_string($link, $_POST['tmobileno']);
    $trole = mysqli_real_escape_string($link, $_POST['trole']);

    $query = "UPDATE teacher SET First_Name='$tfirstname', Middle_Initial='$tmiddlename', Last_Name='$tlastname', Department='$department', Birthdate='$tbirthdate', Gender='$tgender', Address='$taddress', City='$tcity', Province='$tprovince', Postcode='$tpostcode', Telephone_No='$ttelno', Mobile_No='$tmobileno' WHERE Teacher_ID='$teacher_id'";
    $query_run = mysqli_multi_query($link, $query);

    if ($query_run) {
        $_SESSION['message'] = "Teacher Updated Successfully";
        header("Location: Lists_of_Teacher.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Teacher Not Updated";
        header("Location: Lists_of_Teacher.php");
        exit(0);
    }
}

if (isset($_POST['teacher_delete_multiple_btn'])) {
    $all_id = $_POST['teacher_delete_id'];
    $extract_id = implode(',', $all_id);
    // echo $extract_id;

    $query = "DELETE FROM `teacher` WHERE Teacher_ID IN($extract_id) ";

    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        $_SESSION['message'] = "Multiple Data Deleted Successfully";
        header("Location: manage_teacher.php");
    } else {
        $_SESSION['message'] = "Multiple Data Not Deleted";
        header("Location: manage_teacher.php");
    }
}

//insert excuse letter
if (isset($_POST['save_excuse_letter'])) {
    $student_id = mysqli_real_escape_string($link, $_POST['studentno']);
    $efirstname = mysqli_real_escape_string($link, $_POST['efirstname']);
    $estrand = mysqli_real_escape_string($link, $_POST['estrand']);
    $eyrlvl = mysqli_real_escape_string($link, $_POST['eyrlvl']);
    $esection = mysqli_real_escape_string($link, $_POST['esection']);

    $edescription = mysqli_real_escape_string($link, $_POST['statemen']);
    $ecomments = mysqli_real_escape_string($link, $_POST['comments']);
    //$modified = date('Y-m-d H:i:s', strtotime($_POST['modified']));
    $estatus = mysqli_real_escape_string($link, $_POST['Status']);
    $ereasons = mysqli_real_escape_string($link, $_POST['reasons']);
    //$ereasons = mysqli_real_escape_string($link, $_POST['reasons']); 

    $estartdate = date('Y-m-d', strtotime($_POST['startdate']));
    $eenddate = date('Y-m-d', strtotime($_POST['enddate']));

    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../Uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $query = "INSERT INTO `send_excuse_letter`(`Student_ID`, `Name`, `Strand`, `Year_Level`, `Section`, `Statement`, `Reason`, `Comments`, `Status`, `Proof_of_Absence`, `Start_Date`, `End_Date`, `Date_Issued`) VALUES 
                ('$student_id','$efirstname','$estrand','$eyrlvl','$esection','$edescription','$ereasons','$ecomments','$estatus','$fileNameNew','$estartdate','$eenddate',now()); INSERT INTO `excuse letter`(`Student_ID`, `Names`, `Section`, `Year_Level`, `Description`, `Sent`, `Reason_for_Absence`, `Images`, `Status`, `Strand`, `Start_Date`, `End_Date`) VALUES
                ('$student_id','$efirstname','$esection','$eyrlvl','$edescription',now(),'$ereasons','$fileNameNew','$estatus','$estrand','$estartdate','$eenddate')";

                $query_run = mysqli_multi_query($link, $query);
                if ($query_run) {
                    $_SESSION['message'] = "Excuse Letter Created Successfully";
                    header("Location: Lists_of_Excuse_Letter.php");
                    exit(0);
                } else {
                    $_SESSION['message'] = "Excuse Letter Not Created";
                    header("Location: Lists_of_Excuse_Letter.php");
                    exit(0);
                }
            
            }

//update excuse letter
if (isset($_POST['update_excuse_letter'])) {
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

    $image = $_FILES['file']['name'];
    $image_temp = $_FILES['file']['tmp_name'];
    $fileExt = explode('.', $image);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $fileActualExt = strtolower(end($fileExt));
    $image_id = uniqid('', true) . "." . $fileActualExt;

    if ($image_temp != "") {
        move_uploaded_file($image_temp, "../Uploads/$image_id");
        $query = "UPDATE `excuse letter` SET `Status`='$estatus', `Start_Date`='$estartdate', `End_Date`='$eenddate', `Description`='$edescription', `Sent`=now(), `Images`='$image_id' WHERE Excuse_Letter_ID='$excuseletter_id'";
    } else {
        $query = "UPDATE `excuse letter` SET `Status`='$estatus', `Start_Date`='$estartdate', `End_Date`='$eenddate', `Description`='$edescription', `Sent`=now() WHERE Excuse_Letter_ID='$excuseletter_id'";
    }

    $query_run = mysqli_multi_query($link, $query);
    if ($query_run) {
        $_SESSION['message'] = "Excuse Letter Updated Successfully";
        header("Location: Lists_of_Excuse_Letter.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Excuse Letter Not Updated";
        header("Location: Lists_of_Excuse_Letter.php");
        exit(0);
    }
}

//update request letter
if (isset($_POST['update_request_letter'])) {
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

    $image = $_FILES['file']['name'];
    $image_temp = $_FILES['file']['tmp_name'];
    $fileExt = explode('.', $image);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $fileActualExt = strtolower(end($fileExt));
    $image_id = uniqid('', true) . "." . $fileActualExt;

    if ($image_temp != "") {
        move_uploaded_file($image_temp, "../Uploads/$image_id");
        $query = "UPDATE `excuse letter` SET `Status`='$estatus', `Start_Date`='$estartdate', `End_Date`='$eenddate', `Description`='$edescription', `Sent`=now(), `Images`='$image_id' WHERE Excuse_Letter_ID='$excuseletter_id'";
    } else {
        $query = "UPDATE `excuse letter` SET `Status`='$estatus', `Start_Date`='$estartdate', `End_Date`='$eenddate', `Description`='$edescription', `Sent`=now() WHERE Excuse_Letter_ID='$excuseletter_id'";
    }

    $query_run = mysqli_multi_query($link, $query);
    if ($query_run) {
        $_SESSION['message'] = "Excuse Letter Updated Successfully";
        header("Location: Request_Letter.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Excuse Letter Not Updated";
        header("Location: Request_Letter.php");
        exit(0);
    }
}

//update rejected letter
if (isset($_POST['update_rejected_letter'])) {
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

    $image = $_FILES['file']['name'];
    $image_temp = $_FILES['file']['tmp_name'];
    $fileExt = explode('.', $image);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $fileActualExt = strtolower(end($fileExt));
    $image_id = uniqid('', true) . "." . $fileActualExt;

    if ($image_temp != "") {
        move_uploaded_file($image_temp, "../Uploads/$image_id");
        $query = "UPDATE `excuse letter` SET `Status`='$estatus', `Start_Date`='$estartdate', `End_Date`='$eenddate', `Description`='$edescription', `Sent`=now(), `Images`='$image_id' WHERE Excuse_Letter_ID='$excuseletter_id'";
    } else {
        $query = "UPDATE `excuse letter` SET `Status`='$estatus', `Start_Date`='$estartdate', `End_Date`='$eenddate', `Description`='$edescription', `Sent`=now() WHERE Excuse_Letter_ID='$excuseletter_id'";
    }

    $query_run = mysqli_multi_query($link, $query);
    if ($query_run) {
        $_SESSION['message'] = "Excuse Letter Updated Successfully";
        header("Location: Rejected_Letter.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Excuse Letter Not Updated";
        header("Location: Rejected_Letter.php");
        exit(0);
    }
}

//update accepted letter
if (isset($_POST['update_accepted_letter'])) {
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

    $image = $_FILES['file']['name'];
    $image_temp = $_FILES['file']['tmp_name'];
    $fileExt = explode('.', $image);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $fileActualExt = strtolower(end($fileExt));
    $image_id = uniqid('', true) . "." . $fileActualExt;

    if ($image_temp != "") {
        move_uploaded_file($image_temp, "../Uploads/$image_id");
        $query = "UPDATE `excuse letter` SET `Status`='$estatus', `Start_Date`='$estartdate', `End_Date`='$eenddate', `Description`='$edescription', `Sent`=now(), `Images`='$image_id' WHERE Excuse_Letter_ID='$excuseletter_id'";
    } else {
        $query = "UPDATE `excuse letter` SET `Status`='$estatus', `Start_Date`='$estartdate', `End_Date`='$eenddate', `Description`='$edescription', `Sent`=now() WHERE Excuse_Letter_ID='$excuseletter_id'";
    }

    $query_run = mysqli_multi_query($link, $query);
    if ($query_run) {
        $_SESSION['message'] = "Excuse Letter Updated Successfully";
        header("Location: Accepted_Letter.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Excuse Letter Not Updated";
        header("Location: Accepted_Letter.php");
        exit(0);
    }
}

if (isset($_POST['accepted_excuse_letter'])) {
    $excuseletter_id = mysqli_real_escape_string($link, $_POST['excuseletterno']);
    $student_id = mysqli_real_escape_string($link, $_POST['studentno']);
    $efirstname = mysqli_real_escape_string($link, $_POST['efirstname']);
    $eyrlvl = mysqli_real_escape_string($link, $_POST['eyrlvl']);
    $estrand = mysqli_real_escape_string($link, $_POST['estrand']);
    $esection = mysqli_real_escape_string($link, $_POST['esection']);
    $estartdate = date('Y-m-d', strtotime($_POST['startdate']));
    $eenddate = date('Y-m-d', strtotime($_POST['enddate']));
    $estatement = mysqli_real_escape_string($link, $_POST['statemen']);
    $ecomments = mysqli_real_escape_string($link, $_POST['comment']);
    $estatus = mysqli_real_escape_string($link, $_POST['status']);
    //$filename = mysqli_real_escape_string($link, $_POST['filename']);

    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    //$ext = pathinfo($image, PATHINFO_EXTENSION);
    $fileActualExt = strtolower(end($fileExt));
    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
    $fileDestination = '../Uploads/' . $fileNameNew;
    
    move_uploaded_file($fileTmpName, $fileDestination);
    $query = "INSERT INTO `send_excuse_letter`(`Student_ID`, `Name`, `Strand`, `Year_Level`, `Section`, `Statement`, `Comments`, `Status`, `Proof_of_Absence`, `Start_Date`, `End_Date`, `Date_Issued`) VALUES
                ('$student_id','$efirstname','$estrand','$eyrlvl','$esection','$estatement','$ecomments','$estatus','$fileNameNew','$estartdate','$eenddate',now()); UPDATE `excuse letter` SET `Status`='$estatus' WHERE Excuse_Letter_ID='$excuseletter_id'";

    $query_run = mysqli_multi_query($link, $query);
    if ($query_run) {
        $_SESSION['message'] = "Excuse Letter Sent Successfully";
        header("Location: Lists_of_Excuse_Letter.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Excuse Letter Not Sent";
        header("Location: Lists_of_Excuse_Letter.php");
        exit(0);
    }
}

if (isset($_POST['rejected_excuse_letter'])) {
    $excuseletter_id = mysqli_real_escape_string($link, $_POST['excuseletterno']);
    $student_id = mysqli_real_escape_string($link, $_POST['studentno']);
    $efirstname = mysqli_real_escape_string($link, $_POST['efirstname']);
    $eyrlvl = mysqli_real_escape_string($link, $_POST['eyrlvl']);
    $estrand = mysqli_real_escape_string($link, $_POST['estrand']);
    $esection = mysqli_real_escape_string($link, $_POST['esection']);
    $estartdate = date('Y-m-d', strtotime($_POST['startdate']));
    $eenddate = date('Y-m-d', strtotime($_POST['enddate']));
    $estatement = mysqli_real_escape_string($link, $_POST['statemen']);
    $ecomments = mysqli_real_escape_string($link, $_POST['ecomments']);
    $estatus = mysqli_real_escape_string($link, $_POST['estatus']);
    $filename = mysqli_real_escape_string($link, $_POST['filename']);

    $image = $_FILES['file']['name'];
    $image_temp = $_FILES['file']['tmp_name'];
    $fileExt = explode('.', $image);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $fileActualExt = strtolower(end($fileExt));
    $image_id = uniqid('', true) . "." . $fileActualExt;

    move_uploaded_file($image_temp, "../Uploads/$image_id");
    $query = "INSERT INTO `send_excuse_letter`(`Student_ID`, `Name`, `Year_Level`, `Strand`, `Section`, `Start_Date`, `End_Date`, `Statement`, `Comments`, `Status`, `Proof_of_Absence`) VALUES
                ('$student_id','$efirstname','$eyrlvl','$estrand','$esection','$estartdate','$eenddate','$estatement','$ecomments','$estatus','$filename'); UPDATE `excuse letter` SET `Status`='$ecomments' WHERE Excuse_Letter_ID='$excuseletter_id'";

    $query_run = mysqli_multi_query($link, $query);
    if ($query_run) {
        $_SESSION['message'] = "Excuse Letter Sent Successfully";
        header("Location: Lists_of_Excuse_Letter.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Excuse Letter Not Sent";
        header("Location: Lists_of_Excuse_Letter.php");
        exit(0);
    }
}

if (isset($_POST['student_save_excuse_letter'])) {
    $student_id = mysqli_real_escape_string($link, $_POST['studentno']);
    $efirstname = mysqli_real_escape_string($link, $_POST['sname']);
    $esection = mysqli_real_escape_string($link, $_POST['ssection']);
    $eyrlvl = mysqli_real_escape_string($link, $_POST['syear']);
    $edescription = mysqli_real_escape_string($link, $_POST['statemen']);
    $estatus = mysqli_real_escape_string($link, $_POST['Status']);
    $ereasons = mysqli_real_escape_string($link, $_POST['reasons']);
    $estrand = mysqli_real_escape_string($link, $_POST['sstrand']);
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
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../Uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $query = "INSERT INTO `excuse letter`(`Student_ID`, `Names`, `Section`, `Year_Level`, `Description`, `Reason_for_Absence`, `Images`, `Status`, `Strand`, `Start_Date`, `End_Date`) VALUES 
                ('$student_id','$efirstname','$esection','$eyrlvl','$edescription','$ereasons','$fileNameNew','$estatus','$estrand','$estartdate','$eenddate')";

                $query_run = mysqli_multi_query($link, $query);
                if ($query_run) {
                    $_SESSION['message'] = "Excuse Letter Send Successfully";
                    header("Location: Lists_of_Excuse_Letter.php");
                    exit(0);
                } else {
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

if (isset($_POST['create_announcement'])) {
    $strand_id = rand();
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $participants = $_POST['participants'];
    $category = mysqli_real_escape_string($link, $_POST['category']);
    $author = mysqli_real_escape_string($link, $_POST['author']);
    $startdate = date('Y-m-d', strtotime($_POST['start_date']));
    $enddate = date('Y-m-d', strtotime($_POST['end_date']));
    $description = mysqli_real_escape_string($link, $_POST['statemen']);

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
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../Uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                foreach ($participants as $items) {
                    $query = "INSERT INTO `announcement`(`Title`, `Participants`, `Category`, `Author`, `Start_Date`, `End_Date`, `Description`, `Image`) VALUES 
                    ('$title','$items','$category','$author','$startdate','$enddate','$description','$fileNameNew')";

                    $query_run = mysqli_multi_query($link, $query);
                }
                if ($query_run) {
                    $_SESSION['message'] = "Announcement Send Successfully";
                    header("Location: Lists_of_Announcement.php");
                    exit(0);
                } else {
                    $_SESSION['message'] = "Announcement Not Sent";
                    header("Location: Lists_of_Announcement.php");
                    exit(0);
                }
            } else {
                $_SESSION['message'] = "Your file is too big!";
                header("Location: Lists_of_Announcement.php");
                exit(0);
            }
        } else {
            $_SESSION['message'] = "There was an error uploading your file!";
            header("Location: Lists_of_Announcement.php");
            exit(0);
        }
    } else {
        $_SESSION['message'] = "You cannot upload files of this type!";
        header("Location: Lists_of_Announcement.php");
        exit(0);
    }
}

if (isset($_POST['update_announcement'])) {
    $announcement_id = mysqli_real_escape_string($link, $_POST['announcement_id']);
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $participants = mysqli_real_escape_string($link, $_POST['participants']);
    $category = mysqli_real_escape_string($link, $_POST['category']);
    $author = mysqli_real_escape_string($link, $_POST['author']);
    $startdate = date('Y-m-d', strtotime($_POST['start_date']));
    $enddate = date('Y-m-d', strtotime($_POST['end_date']));
    $description = mysqli_real_escape_string($link, $_POST['statemen']);

    $image = $_FILES['file']['name'];
    $image_temp = $_FILES['file']['tmp_name'];
    $fileExt = explode('.', $image);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $fileActualExt = strtolower(end($fileExt));
    $image_id = uniqid('', true) . "." . $fileActualExt;

    if ($image_temp != "") {
        move_uploaded_file($image_temp, "../Uploads/$image_id");
        $query = "UPDATE `announcement` SET `Title`='$title', `Participants`='$participants', `Category`='$category', `Author`='$author', `Description`='$description', `Start_Date`='$startdate', `End_Date`='$enddate', `Image`='$image_id' WHERE Announcement_ID='$announcement_id'";
    } else {
        $query = "UPDATE `announcement` SET `Title`='$title', `Participants`='$participants', `Category`='$category', `Author`='$author', `Description`='$description', `Start_Date`='$startdate', `End_Date`='$enddate' WHERE Announcement_ID='$announcement_id'";
    }

    $query_run = mysqli_multi_query($link, $query);
    if ($query_run) {
        $_SESSION['message'] = "Announcement Updated Successfully";
        header("Location: Lists_of_Announcement.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Announcement Not Updated";
        header("Location: Lists_of_Announcement.php");
        exit(0);
    }
}

//insert teacher subject / schedule
if (isset($_POST['save_schedule'])) {
    $subject = explode(":", mysqli_real_escape_string($link, $_POST['subjects']));
    $teacher = explode(":", mysqli_real_escape_string($link, $_POST['teachers']));
    $strand = explode(":", mysqli_real_escape_string($link, $_POST['strand']));
    $section = explode(":", mysqli_real_escape_string($link, $_POST['section']));
    $starttime = date('Y-m-d H:i:s', strtotime($_POST['starttime']));
    $endtime = date('Y-m-d H:i:s', strtotime($_POST['endtime']));

    $subjectid = $subject[0];
    $subjectname = $subject[1];

    $teacherid = $teacher[0];
    $teachername = $teacher[1];

    $strandid = $strand[0];
    $strandname = $strand[1];

    $sectionid = $section[0];
    $sectionname = $section[1];

    $query = "INSERT INTO `class`(`Teacher_ID`, `Teacher_Name`, `Strand_ID`, `Strand`, `Section_ID`, `Section`, `Subject_ID`, `Subject_Name`, `Start_Time`, `End_Time`) VALUES 
             ('$teacherid','$teachername','$strandid','$strandname','$sectionid','$sectionname','$subjectid','$subjectname','$starttime','$endtime')";

    $query_run = mysqli_multi_query($link, $query);

    if ($query_run) {
        $_SESSION['message'] = "Class Created Successfully";
        header("Location: Lists_of_Schedule.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Class Not Created";
        header("Location: Lists_of_Schedule.php");
        exit(0);
    }
}

//insert schedule
if (isset($_POST['save_teacher_subject'])) {
    $teacher = mysqli_real_escape_string($link, $_POST['teachers']);
    $section = mysqli_real_escape_string($link, $_POST['section']);
    $subject = mysqli_real_escape_string($link, $_POST['subjects']);
    $starttime = date('Y-m-d H:i:s', strtotime($_POST['starttime']));
    $endtime = date('Y-m-d H:i:s', strtotime($_POST['endtime']));

    $query = "INSERT INTO `class`(`Teacher_Name`, `Section`, `Subject_Name`, `Start_Time`, `End_Time`) VALUES 
             ('$teacher','$section','$subject','$starttime','$endtime')";

    $query_run = mysqli_multi_query($link, $query);

    if ($query_run) {
        $_SESSION['message'] = "Schedule Created Successfully";
        header("Location: Lists_of_Schedule.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Schedule Not Created";
        header("Location: Lists_of_Schedule.php");
        exit(0);
    }
}

if (isset($_POST['save_offense'])) {
    $student_id = mysqli_real_escape_string($link, $_POST['studentno']);
    $vfirstname = mysqli_real_escape_string($link, $_POST['vfirstname']);
    $vyrlvl = mysqli_real_escape_string($link, $_POST['vyrlvl']);
    $vstrand = mysqli_real_escape_string($link, $_POST['vstrand']);
    $vsection = mysqli_real_escape_string($link, $_POST['vsection']);
    $vdescription = mysqli_real_escape_string($link, $_POST['statemen']);
    $violation = mysqli_real_escape_string($link, $_POST['Violation']);
    $offense = mysqli_real_escape_string($link, $_POST['Offense']);
    $loffense = mysqli_real_escape_string($link, $_POST['Level_Offense']);
    $vstatus = mysqli_real_escape_string($link, $_POST['status']);

    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../Uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $query = "INSERT INTO `violation`(`Student_ID`, `Name`, `Strand`, `Year_Level`, `Section`, `Description`, `Type_of_Violation`, `Type_of_Offense`, `Level_of_Offense`, `Images`, `Status`, `Date`) VALUES 
                ('$student_id','$vfirstname','$vstrand','$vyrlvl','$vsection','$vdescription','$violation','$offense','$loffense','$fileNameNew','$vstatus',now())";

                $query_run = mysqli_multi_query($link, $query);
                if($query_run)
                {
                    $_SESSION['message'] = "Offense Created Successfully";
                    header("Location: List_of_Offense.php");
                    exit(0);
                }
                else
                {
                    $_SESSION['message'] = "Offense Not Created";
                    header("Location: List_of_Offense.php");
                    exit(0);
                }
         
}

if (isset($_POST['update_offense'])) {
    $violation_id = mysqli_real_escape_string($link, $_POST['violationno']);
    $student_id = mysqli_real_escape_string($link, $_POST['studentno']);
    $uviolation = mysqli_real_escape_string($link, $_POST['Violation']);
    $uoffense = mysqli_real_escape_string($link, $_POST['Offense']);
    $ulvloffense = mysqli_real_escape_string($link, $_POST['Level_Offense']);
    $udescription = mysqli_real_escape_string($link, $_POST['statemen']);
    $ustatus = mysqli_real_escape_string($link, $_POST['Status']);
    $udate = date('Y-m-d', strtotime($_POST['date']));

    $image = $_FILES['file']['name'];
    $image_temp = $_FILES['file']['tmp_name'];
    $fileExt = explode('.', $image);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $fileActualExt = strtolower(end($fileExt));
    $image_id = uniqid('', true) . "." . $fileActualExt;

    if ($image_temp != "") {
        move_uploaded_file($image_temp, "../Uploads/$image_id");
        $query = "UPDATE `violation` SET `Description`='$udescription', `Type_of_Violation`='$uviolation', `Type_of_Offense`='$uoffense', `Level_of_Offense`='$ulvloffense', `Images`='$image_id', `Status`='$ustatus', `Date`='$udate' WHERE Violation_ID='$violation_id'";
    } else {
        $query = "UPDATE `violation` SET `Description`='$udescription', `Type_of_Violation`='$uviolation', `Type_of_Offense`='$uoffense', `Level_of_Offense`='$ulvloffense', `Status`='$ustatus', `Date`='$udate' WHERE Violation_ID='$violation_id'";
    }

    $query_run = mysqli_multi_query($link, $query);
    if ($query_run) {
        $_SESSION['message'] = "Excuse Letter Updated Successfully";
        header("Location: List_of_Offense.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Excuse Letter Not Updated";
        header("Location: List_of_Offense.php");
        exit(0);
    }
}

if (isset($_POST['save_concerns'])) {
    $student_id = mysqli_real_escape_string($link, $_POST['studentno']);
    $cfirstname = mysqli_real_escape_string($link, $_POST['cfirstname']);
    $cyrlvl = mysqli_real_escape_string($link, $_POST['cyrlvl']);
    $cstrand = mysqli_real_escape_string($link, $_POST['cstrand']);
    $csection = mysqli_real_escape_string($link, $_POST['csection']);
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $reason = mysqli_real_escape_string($link, $_POST['reasons']);
    $cstatus = mysqli_real_escape_string($link, $_POST['status']);
    $cstatement = mysqli_real_escape_string($link, $_POST['statemen']);

    $query = "INSERT INTO `concerns`(`Student_ID`, `Name`, `Title`, `Reason`, `Statement`, `Status`, `Date`) VALUES 
              ('$student_id','$cfirstname','$title','$reason','$cstatement','$cstatus',now())";

    $query_run = mysqli_multi_query($link, $query);
    if ($query_run) {
        $_SESSION['message'] = "Violation Created Successfully";
        header("Location: Lists_of_Concerns.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Violation Not Created";
        header("Location: Lists_of_Concerns.php");
        exit(0);
    }
}

if (isset($_POST['save_subject'])) {
    $subject = mysqli_real_escape_string($link, $_POST['subject']);

    $query = "INSERT INTO `subject`(`Subject_Name`) VALUES 
              ('$subject')";

    $query_run = mysqli_multi_query($link, $query);
    if ($query_run) {
        $_SESSION['message'] = "Subject Created Successfully";
        header("Location: Lists_of_Subjects.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Subject Not Created";
        header("Location: Lists_of_Subjects.php");
        exit(0);
    }
}

if (isset($_POST['update_concerns'])) {
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

    $query = "UPDATE `concerns` SET `Name`='$cname', `Reason`='$creason', `Statement`='$cstatement', `Status`='$cstatus', `Date`='$cdate' WHERE Concern_ID='$concern_id'";

    $query_run = mysqli_multi_query($link, $query);
    if ($query_run) {
        $_SESSION['message'] = "Violation Created Successfully";
        header("Location: Lists_of_Concerns.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Violation Not Created";
        header("Location: Lists_of_Concerns.php");
        exit(0);
    }
}

if(isset($_POST['save_violation']))
{
    $offense = mysqli_real_escape_string($link, $_POST['offense']);
  
    $query = "INSERT INTO `offense`(`Type_of_Violation`) VALUES 
              ('$offense')";

    $query_run = mysqli_multi_query($link, $query);
        if($query_run)
        {
            $_SESSION['message'] = "Violation Created Successfully";
            header("Location: List_of_Offense.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Violation Not Created";
            header("Location: List_of_Offense.php");
            exit(0);
        }  
}

if(isset($_POST['save_section']))
{
    $section = mysqli_real_escape_string($link, $_POST['section']);
  
    $query = "INSERT INTO `section`(`Section`) VALUES 
              ('$section')";

    $query_run = mysqli_multi_query($link, $query);
        if($query_run)
        {
            $_SESSION['message'] = "Section Created Successfully";
            header("Location: Lists_of_Section.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Section Not Created";
            header("Location: Lists_of_Section.php");
            exit(0);
        }  
}

if(isset($_POST['imports']))
{
    $fileName = $_FILES['excel']['name'];
    $fileExtension = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExtension));

    $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;
    $targetDirectory = '../Uploads/' . $newFileName;
    move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

    error_reporting(0);
    ini_set('display', 0);

    require "excelReader/excel_reader2.php";
    require "excelReader/SpreadsheetReader.php";

    $reader = new SpreadsheetReader($targetDirectory);
    foreach ($reader as $key => $row) {
        $student_id = $row[0];
        $firstname = $row[1];
        $middlename = $row[2];
        $lastname = $row[3];
        $gender = $row[4];
        $birthdate = $row[5];
        $strand = $row[6];
        $yrlvl = $row[7];
        $section = $row[8];
        $address = $row[9];
        $city = $row[10];
        $province = $row[11];
        $postcode = $row[12];
        $telno = $row[13];
        $mobileno = $row[14];
        mysqli_query($link, "INSERT INTO `student` VALUES 
              ('$student_id','$firstname','$middlename','$lastname','$gender','$birthdate','$strand','$yrlvl','$section','$address','$city','$province','$postcode','$telno','$mobileno')");
    }
}
