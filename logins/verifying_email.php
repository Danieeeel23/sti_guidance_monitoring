<?php
@include 'config.php';

if (isset($_POST["submit"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
 
        // check if credentials are okay, and email is verified
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