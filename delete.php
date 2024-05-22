<?php
  $con = new PDO("mysql:host=localhost;dbname=myDB", 'root', '');
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $con->prepare("DELETE FROM students WHERE id = $id");
    $stmt->execute();
    header('location:actions.php');
  }
?>