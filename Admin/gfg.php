<?php
  
// Get the user id 
$user_id = $_REQUEST['studentno'];
  
// Database connection
$link = mysqli_connect("localhost", "root", "", "sti guidance monitoring");
  
if ($user_id !== "") {
      
    // Get corresponding first name and 
    // last name for that user id    
    $query = mysqli_query($link, "SELECT *, CONCAT(First_Name,' ',Middle_Name,' ',Last_Name) AS Names FROM student WHERE Student_ID='$user_id'");
  
    $row = mysqli_fetch_array($query);
  
    // Get the first name
    $first_name = $row["Names"];
  
    // Get the first name
    $year_level = $row["Year_Level"];

    $strand = $row["Strand"];

    $section = $row["Section"];
}
  
// Store it in a array
$result = array("$first_name", "$year_level", "$strand", "$section");
  
// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>