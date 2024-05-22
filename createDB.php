<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<h1>PHP Create a MySQL Database</h1>
  <form action="" method="post">
    <button type="submit" style="padding: 10px; color:#fff; background:green; border:none; border-radius:10px; font-weight:bold">Creat Database</button>
  </form>
  <?php
  if($_SERVER['REQUEST_METHOD']  === 'POST'){
    try{
      $con = new PDO('mysql:host=localhost', 'root', '');
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "CREATE DATABASE IF NOT EXISTS myDB";
      $con->exec($sql);
        echo "DataBase created successfully";
      }
    catch(PDOException $e){
        echo "There was an error in creating database!!" . $e->getMessage();
      }
  }
?>
</body>
</html>