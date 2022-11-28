<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['parent_id'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Parent Page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>Hi, <span>Student</span></h3>
      <h1>Welcome <span><?php echo $_SESSION['parent_id'] ?></span></h1>
      <p>This is Parent Page</p>
      <a href="login_form.php" class="btn">Login</a>
      <a href="logout.php" class="btn">Logout</a>
   </div>

</div>

</body>
</html>