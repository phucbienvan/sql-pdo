<?php
include "./connect.php";
// lay thong tin 1 user qua id;
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$stmt = $conn->prepare("SELECT id, username, email, password FROM accounts WHERE id ='$id'"); 
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC); 
$result = $stmt->fetchAll();
//sau khi nhan update
if (isset($_POST['update'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    try{
        $sql = "UPDATE accounts SET username = '$username', password = '$password', email = '$email'  WHERE id= '$id'"; 
        $stmt = $conn ->prepare($sql);
        $stmt->execute();
    }catch (PDOException $e) {
        echo 'Lỗi'. "<br>" . $e->getMessage();
    }
    header("location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <button><a href="home.php">Home</a></button>
    <hr>
    <form action="" method="POST">
        <?php 
        foreach($result as $item){
            ?>
        <label>Username</label>
        <input type="text" name="username", value="<?php echo $item['username'] ?>"><br>
        <label>Password</label>
        <input type="text" name="password", value="<?php echo$item['password'] ?>" ><br>
        <label>Email</label>
        <input type="text" name="email", value="<?php echo$item['email']?>"><br>
        <input type="submit" name="update" value="Update">
        <?php }?>
    </form>

</body>
</html>
