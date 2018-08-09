<?php
include("config.php");
	$id = $_REQUEST['id'];
	$result = mysqli_query($mysqli, "DELETE FROM `emp` WHERE empno=$id");
	header("Location:index.php");
?>
