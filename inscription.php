<?php
  include_once('connectInscription.php');

  try{
    if($_SERVER["REQUEST_METHOD"]  === 'POST'){
      $fullName = $_POST["fullName"];
      $email = $_POST['email'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $rpassword = $_POST['rpassword'];
      $check = $_POST['check'];
      // echo $fullName;
      $stmt = $con->prepare("SELECT * from inscriptiontb where email = '$email'");
      $stmt->execute();
      $row = $stmt->rowCount();
      if($row > 0){
        echo "User already exists!";
      }
      else{
        if($password == $rpassword){
          $stmt2 = $con->prepare("INSERT INTO inscriptiontb(fullName, email, username, 
          password, rpassword, agreement) VALUES('$fullName', '$email','$username', '$password','$rpassword', '$check')");
          $stmt2->execute();
          echo "Data inserted successfully";
        }
        else{
          echo "Password does not match!";
        }
      }
    }
  }catch(PDOException $e){
    echo "failed" . $e->getMessage();
  }
?>