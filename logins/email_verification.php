<?php
 
    if (isset($_POST["verify_email"]))
    {
        $email = $_POST["email"];
        $verification_code = $_POST["verification_code"];
 
        // connect with database
        $link = mysqli_connect("localhost", "root", "", "sti guidance monitoring");
 
        // mark email as verified
        $sql = "UPDATE `credentials` SET Email_Verified_At = NOW() WHERE `Email` = '" . $email . "' AND `Verification_Code` = '" . $verification_code . "'";
        $result  = mysqli_query($link, $sql);
 
        if (mysqli_affected_rows($link) == 0)
        {
            die("Verification code failed.");
        }
 
        echo "<p>You can login now.</p>";
        exit();
    }
 
?>

<form method="POST">
    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
    <input type="text" name="verification_code" placeholder="Enter verification code" required />
 
    <input type="submit" name="verify_email" value="Verify Email">
</form>