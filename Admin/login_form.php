<?php
//connect to database
@include 'config.php';
//creates session
session_start();
//a conditional statement where you can set the time in login attempts. It also counts your login session.
if(isset($_POST['submit'])){
   $time=time()-60;
   $ip_address=getIpAddr();
   $check_login_row=mysqli_fetch_assoc(mysqli_query($link, "SELECT COUNT(*) AS total_count FROM logs WHERE try_time>$time AND ip_address='$ip_address'"));
   $total_count=$check_login_row['total_count'];
   if($total_count==3){
      $error[]="Too Many Failed Attempts. Please Login After 60 Secs";
   }else{
      $email = mysqli_real_escape_string($link, $_POST['email']);
      $pass = mysqli_real_escape_string($link, $_POST['password']);

      $select = " SELECT * FROM credentials WHERE Email = '$email' && Password = '$pass' ";
      $result = mysqli_query($link, $select);

      if(mysqli_num_rows($result) > 0){

         $row = mysqli_fetch_array($result);
         mysqli_query($link, "DELETE FROM logs WHERE ip_address='$ip_address'");

         if($row["Role"] == 'Admin'){

            $_SESSION['admin_id'] = $row["Credential_ID"];
            header('location:admin_page.php');

         }elseif($row["Role"] == 'Teacher'){

            $_SESSION['teacher_id'] = $row["Credential_ID"];
            header('location:teacher_page.php');

         }elseif($row["Role"] == 'Student'){

            $_SESSION['student_id'] = $row["Credential_ID"];
            header('location:student_page.php');

         }elseif($row["Role"] == 'Parent'){

            $_SESSION['parent_id'] = $row["Credential_ID"];
            header('location:parent_page.php');
         }
     
      }else{
         $total_count++;
         $rem_attm=3-$total_count;
         if($rem_attm==0){
            $error[]="Too Many Failed Attempts. Please Login After 60 Secs";
         }else{
            $error[] = "Incorrect Email or Password $rem_attm Attempts Remaining!";
         }
         $try_time=time();
         mysqli_query($link, "INSERT INTO logs(ip_address,try_time) VALUES ('$ip_address','$try_time')");
      }
   }

};

function getIpAddr(){
   if (!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ipAddr=$_SERVER['HTTP_CLIENT_IP'];
   }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ipAddr=$_SERVER['HTTP_X_FORWARDED_FOR'];
   }else{
      $ipAddr=$_SERVER['REMOTE_ADDR'];
   }
   return $ipAddr;
}

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <title>Login Page | Guidance Monitoring System</title>
    <link rel="stylesheet" href="login_form.css">
    <script type="text/javascript" src="animate.js"></script>
   <script>
   if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
   </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
   
  <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="alert alert-danger" style="margin-left:570px; margin-top: 30dp;">'.$error.'</span>';
         };
      };
      ?>

   <?php
         if(isset($_SESSION['status']))
         {
            ?>
            <div class="alert alert-success" style="width: 24rem; margin-left: 575px; padding-top: 10px; padding-bottom: 10px;">
               <h5><?= $_SESSION['status']; ?></h5>
            </div>
            <?php
            unset($_SESSION['status']);
         }
         else if(isset($_SESSION['status_danger']))
         {
            ?>
            <div class="alert alert-danger" style="width: 20rem; margin-left: 700px; margin-top: 200px; padding-top: 10px; padding-bottom: 10px;">
               <h5><?= $_SESSION['status_danger']; ?></h5>
            </div>
            <?php
            unset($_SESSION['status_danger']);
         }
         ?>

    <div class="center">

      <form action="" method ="post">
        <h1>Login</h1>
       
          <div class="txt_field">
              <input type="email"name="email" required>
              <span></span>
              <label >Email</label>
          </div>
          <div class="txt_field">
            <input type="password" name="password" required>
            <span></span>
            <label >Password</label>
        </div>
        <div class="link_forget-pass_text-left"><a href="password-reset.php" style="color: rgb(148, 142, 142); text-decoration:none; ">Forgot Password?
         </a></div>
        <div>     
            <input type="submit"name="submit" value = "Login">      
        </div>
        
       </div>
      </form>
  </div>
  </body>
</html>