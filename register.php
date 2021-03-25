<?php
session_start();
include "./connect.php";
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    try {
        $sql = "INSERT INTO accounts(username, email, password) VALUES ('$username', '$email', '$password')";
        $conn -> exec($sql);
        echo "Thêm record thành công";
        header("location: login.php");    } 
    catch (PDOException $e) {
        echo $e->getMessage();
    }
     
    // Ngắt kết nối
    // $conn = null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h3>Register</h3>
    <button><a href="home.php">Home</a></button>
    <hr>
    <form action="", method="POST">
        <label>Username</label>
        <input type="text" name="username"><br>
        <label>Email</label>
        <input type="text" name="email"><br>
        <label>Password</label>
        <input type="text" name="password"><br>
        <input type="submit" name="register", value="Register">
    </form>
    <hr>
    <button><a href="login.php">Login</a></button>
</html>