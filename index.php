<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    $user = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];
    

include_once("config.php");
 

$result = mysqli_query($mysqli, "SELECT * FROM emp");
?>
 
<html>
<head>    
    <title>Homepage</title>
    <style type="text/css">
        .odd{
            background-color: lightgrey;
        }
        .even{
            background-color: white;
        }
    </style>
</head>
 <p>Welcome <?php echo $user; ?> and User id is <?php echo $user_id; ?></p>

<body>
    <a href="add.html">Add New Data</a><br/><br/>
    <a href="logout.php">Logout</a><br/><br/>
 
    <table width='80%' border=0>
        <tr bgcolor='lightpink'>
            <td>Emp_id</td>
            <td>Name</td>
            <td>Salary</td>
            <td>Update</td>
        </tr>
        <?php 
            $i = 0;
        while($res = mysqli_fetch_array($result)) {         
            if($i % 2 != 0){
                $classes = "odd";
            }
            else{
                $classes = "even";
            }
            echo "<tr class=".$classes.">";
            echo "<td>".$res['empno']."</td>";
            echo "<td>".$res['empname']."</td>";
            echo "<td>".$res['sal']."</td>";    
            echo "<td><a href=\"update.php?id=$res[empno]\">Edit</a> | <a href=\"delete.php?id=$res[empno]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
            $i++;
        }
        ?>
    </table>
</body>
</html>
