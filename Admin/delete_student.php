<?php
include_once("config.php");
if(isset($_POST['emp_id'])) {
	$emp_id = trim($_POST['emp_id']);
	$sql = "DELETE FROM `student` WHERE Student_ID in ($emp_id)";
	$query_run = mysqli_query($link, $sql) or die("database error:". mysqli_error($link));
	echo $emp_id;
}
?>