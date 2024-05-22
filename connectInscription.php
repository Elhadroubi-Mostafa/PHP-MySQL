<?php
  try{
    $con = new PDO("mysql:host=localhost;dbname=inscription", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected successfully";
  }catch(PDOException $e){
    echo "There was an error in connected database" . $e->getMessage();
  }
?>