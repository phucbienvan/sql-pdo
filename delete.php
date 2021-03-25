<?php
include "./connect.php";
try {
    $id = $_GET['id'];
    $sql = "DELETE FROM accounts WHERE id= '$id'";
    $conn->exec($sql);
    header("location: home.php");

} 
catch (PDOException $e) {
    echo 'Lỗi' . "<br>" . $e->getMessage();
}
?>