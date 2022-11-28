<?php
session_start();
include('config.php');

//Load Composer's autoloader
require_once("PHPMailer/PHPMailerAutoload.php");

function send_password_reset($get_name,$get_email,$token)
{
    $mail = new PHPMailer;
    $mail->isSMTP();                  
    
    $mail->CharSet="UTF-8";
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPDebug = false;
    $mail->Debugoutput = 'html';
    $mail->Port = 587; 

    $mail->Username   = 'guidance.stidasma@gmail.com';                     
    $mail->Password   = 'tnufgftypgjmcdug';     
                             
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth   = true;
    $mail->isHTML(true);           

    $mail->setFrom('guidance.stidasma@gmail.com',$get_name);
    $mail->addAddress($get_email);     
    $mail->Subject = "Reset Password Notification";    
    $email_template = "
        <h2>Greetings!</h2>
        <h3>A message from the Office of the Guidance Department STI College Dasmarinas</h3>
        <h3>We've noticed a password reset request for your account.</h3>
        <a href='http://localhost/Thesis/Admin/password-change.php?token=$token&email=$get_email'> Reset My Password </a>
    ";

    $mail->Body = $email_template;
    $mail->send();
}

if(isset($_POST['password_reset_link']))
{
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT Email FROM credentials WHERE Email='$email' LIMIT 1";
    $check_email_run = mysqli_query($link, $check_email);

    if(mysqli_num_rows($check_email_run) > 0)
    {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['Name'];
        $get_email = $row['Email'];

        $update_token = "UPDATE credentials SET verify_token='$token' WHERE Email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($link, $update_token);

        if($update_token_run)
        {
            send_password_reset($get_name,$get_email,$token);
            $_SESSION['status'] = "We Emailed You A Password Reset Link!";
            header("Location: password-reset.php");
            exit(0);
        }
        else
        {
            $_SESSION['status_danger'] = "Something Went Wrong. #1";
            header("Location: password-reset.php");
            exit(0);
        }
    }else
    {
        $_SESSION['status_danger'] = "No Email Found";
        header("Location: password-reset.php");
        exit(0);
    }
}

if(isset($_POST['password_update']))
{
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $new_password = mysqli_real_escape_string($link, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($link, $_POST['confirm_password']);
    $token = mysqli_real_escape_string($link, $_POST['password_token']);

    if(!empty($token))
    {
        if(!empty($email) && !empty($new_password) && !empty($confirm_password))
        {
            $check_token = "SELECT verify_token FROM credentials WHERE verify_token='$token' LIMIT 1";
            $check_token_run = mysqli_query($link, $check_token);

            if(mysqli_num_rows($check_token_run) > 0)
            {
                if($new_password == $confirm_password)
                {
                    $update_password = "UPDATE credentials SET Password='$new_password' WHERE verify_token='$token' LIMIT 1";
                    $update_password_run = mysqli_query($link, $update_password);

                    if($update_password_run)
                    {
                        $new_token = md5(rand())."funda";
                        $update_to_new_token = "UPDATE credentials SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1";
                        $update_to_new_token_run = mysqli_query($link, $update_to_new_token);

                        $_SESSION['status'] = "New Password Successfully Updated!";
                        header("Location: login_form.php");
                        exit(0);
                    }
                    else
                    {
                        $_SESSION['status_danger'] = "Did Not Update Password. Something Went Wrong!";
                        header("Location: password-change.php?token=$token&email=$email");
                        exit(0);
                    }
                }
                else
                {
                    $_SESSION['status_danger'] = "New Password and Confirm Password Does Not Match!";
                    header("Location: password-change.php?token=$token&email=$email");
                    exit(0);
                }
            }
            else
            {
                $_SESSION['status_danger'] = "You've Already Modified Your Password, Cannot Proceed!";
                header("Location: password-change.php?token=$token&email=$email");
                exit(0);
            }
        }
        else
        {
            $_SESSION['status_danger'] = "Complete the Requirements!";
            header("Location: password-change.php?token=$token&email=$email");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status_danger'] = "No Token Available";
        header("Location: password-change.php");
        exit(0);
    }
}
?>
