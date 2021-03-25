<?php
session_start();
include "./connect.php";
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE username ='$username' AND password = '$password'"); 
    $stmt->execute();
    $count = $stmt ->rowCount();
    $error= array();
    if($count > 0){
        $_SESSION['user'] = $username;
        header("location: home.php");
     }else{
        $error['login'] = 'sai mat khau hoac ten dang nhap';
            // header("location: login.php");
    } 
}
if(isset($_SESSION['user'])){
    header("location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h3>Login</h3>
    <form action="", method="POST">
        <label>Username</label>
        <input type="text" name="username"><br>
        <label>Password</label>
        <input type="text" name="password"><br>
        <label style="color: red;"><?php
        if(isset($error['login'])){
            echo $error['login'];
        }
        ?>
        </label><br>
        <input type="submit" name="login", value="login"><br>
    </form>
    <hr>
    <button><a href="register.php">Register</a></button>

</body>
</html>