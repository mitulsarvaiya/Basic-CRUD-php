<?php session_start(); 
    require("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <?php
    $error = $error_login = $error_username = $error_password = "";
    if(isset($_REQUEST['login'])){
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        if(empty($username) || empty($password)){
            if(empty($username)){
                $error_username = "Username field is mendatory";
            }
            if(empty($password)){
                $error_password = "Password field is mendatory";
            }
        }
        else{
                $query = mysqli_query($mysqli, "SELECT * FROM user WHERE user_name='$username' AND password=MD5('$password')");
                $count = mysqli_num_rows($query);
                if($count == 1){
                    $row = mysqli_fetch_array($query);

                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['username'] = $row['user_name'];
                    header("location:index.php");
                }
                else{
                    $error_login = "Invalid login data, check username or password";
                }
            }
        }
        ?>
<center>
    <table>
        <tr><center><h3><?php echo $error_login; ?></h3></center></tr>
        <form action="" method="POST">
            <tr>
                <td><label>Username</label></td>
                <td><input type="text" name="username"><span><?php echo $error_username; ?></span></td>
                
            </tr>
            <tr>
                <td><label>Password</label></td>
                <td><input type="password" name="password"><span><?php echo $error_password; ?></span></td>
                
            </tr>
            <tr>
                <td><label></label></td>
                <td><input type="submit" name="login" value="Login"></td>
            </tr>
        </form>
    </table>
</center>
</body>
</html>
