<?php
  require_once "config.php";
 
  if (isset($_POST['query'])) {
      $query = "SELECT * FROM teacher WHERE First_Name LIKE '{$_POST['query']}%' LIMIT 100";
      $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
        echo '<label>Search Result<input type="checkbox" name="teacherlist[]" value="<?= $res["First_Name"]; ?>' . $res["First_Name"] . "</label><br/>";
      }
    } else {
      echo "
      <div class='alert alert-danger mt-3 text-center' role='alert'>
          Teacher not found
      </div>
      ";
    }
  }
?>