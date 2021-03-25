<?php
include "./connect.php";
session_start();
if(!isset($_SESSION['user'])){
    header("location: login.php");
}
try {
    $stmt = $conn->prepare("SELECT id, username, email, password FROM accounts"); 
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $result = $stmt->fetchAll();
}
catch(PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
if(isset($_POST['logout'])){
    unset($_SESSION['user']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h3>Home</h3>
    <button><a href="register.php">Register</a></button>
    <hr>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Email</td>
            <td>Password</td>
            <td>Action</td>
            <td>Action</td>
        </tr>
        
        <?php
        foreach($result as $item){
            ?>
            <tr>
            <td><?php echo $item['id'] ?></td>
            <td><?php echo $item['username'] ?></td>
            <td><?php echo $item['email'] ?></td>
            <td><?php echo $item['password'] ?></td>
            <td><a href="delete.php?id=<?php echo $item['id'];  ?>">Delete </a></td>
            <td><a href="update.php?id=<?php echo $item['id'];  ?>">Update</a></td> 

            </tr>                 
        <?php
        }
    ?>  
    </table>
    <hr>
    <form action="", method="POST">
        <input type="submit", name="logout", value="logout">
    </form>
</body>
</html>
