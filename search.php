<?php
	$empno = $_REQUEST['empid'];
	if(empty($empno)){
		$error = "Field does not empty";
	}
	include_once("config.php");
	$result = mysqli_query($mysqli, "SELECT * FROM emp where empno=$empno");
?>
<html>
<head>
	<title>Search</title>
</head>
<center><h3>Search Employee</h3></center>
<div><a style="color:grey;" href="index.php">Home</a></div>
<br>
<form action="search.php" method="POST">
<span style="color:grey;">Enter Employee Id. :</span>
<input type=text name="empid" placeholder="Enter Employee id...">
<span style="color:red;">*<?php echo $error;?></span>
<br>
<input type="submit" value="Submit" name="Submit">
<br>

<br>
<center>
<table>
	<tr bgcolor='#CCCCCC'>
	<td>Employee Id.</td>
	<td>Name</td>
	<td>Salary</td>
	</tr>
	<?php
	$res = mysqli_fetch_array($result);
	echo "<tr>";
	echo "<td>".$res['empno']."</td>";
	echo "<td>".$res['empname']."</td>";
	echo "<td>".$res['sal']."</td>";
	echo "</tr>";
?>
</table>
</center>
</form>
</html>
