<?php
    if(isset($_SESSION['message'])) :
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
.alert {
  position: absolute;
  margin: 20px 190px 0 400px;
  padding: 20px;
  width: 800px;
  background-color: #B2C8DF;
  color: black;
  border-radius: 10px;
}

</style>
</head>
<body>

<div class="alert" id="alert">
  <span onclick="this.parentElement.style.display='none';"></span> 
  <strong>Hey!</strong> <?= $_SESSION['message']; ?>
</div>

<!-- automatically close alert message -->
<script type="text/javascript">
    $("#alert").show().delay(3000).fadeOut();
</script>

</body>
</html>


<?php 
    unset($_SESSION['message']);
    endif;
?>