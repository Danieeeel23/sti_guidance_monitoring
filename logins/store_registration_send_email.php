<?php
@include 'config.php';
require_once("PHPMailer/PHPMailerAutoload.php");

if (isset($_POST["submit"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer;

    try{
        //Enable verbose debug output
        $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

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

        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('guidance.stidasma@gmail.com');

        //Add a recipient
        $mail->addAddress($email);

        //Set email format to HTML
        $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Email verification';
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 12px;">' . $verification_code . '</b></p>
                            <p>Your email address is: <b style="font-size: 12px;">' . $email . '</p>
                            <p>Your password is: <b style="font-size: 12px;">' . $password . '</p>';

        $mail->send();
        // echo 'Message has been sent';

        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
       
        exit();
    }catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    $sql = "SELECT * FROM credentials WHERE Email = '" . $email . "'";
        $result = mysqli_query($link, $sql);
 
        if (mysqli_num_rows($result) == 0)
        {
            die("Email not found.");
        }
 
        $user = mysqli_fetch_object($result);
 
        if (!password_verify($password, $user->Password))
        {
            die("Password is not correct");
        }
 
        if ($user->Email_Verified_At == null)
        {
            die("Please verify your email <a href='email-verification.php?email=" . $email . "'>from here</a>");
        }
 
        echo "<p>Your login logic here</p>";
        exit();
}
     
?>

