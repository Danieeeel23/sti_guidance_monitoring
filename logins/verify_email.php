<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>User Account Activation by Email Verification using PHP</title>
<!-- CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
if($_GET['key'] && $_GET['token'])
{
include "config.php";
$email = $_GET['key'];
$token = $_GET['token'];
$query = mysqli_query($link,
"SELECT * FROM `credentials` WHERE `Email_Verification_Link`='".$token."' and `Email`='".$email."';"
);
$d = date('Y-m-d H:i:s');
if (mysqli_num_rows($query) > 0) {
$row= mysqli_fetch_array($query);
if($row['Email_Verified_At'] == NULL){
mysqli_query($link,"UPDATE credentials set Email_Verified_At ='" . $d . "' WHERE Email='" . $email . "'");
$msg = "Congratulations! Your email has been verified.";
}else{
$msg = "You have already verified your account with us";
}
} else {
$msg = "This email has been not registered with us";
}
}
else
{
$msg = "Danger! Your something goes to wrong.";
}
?>
<div class="container mt-3">
<div class="card">
<div class="card-header text-center">
User Account Activation by Email Verification using PHP
</div>
<div class="card-body">
<p><?php echo $msg; ?></p>
</div>
</div>
</div>
</body>
</html>