<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    div{
      margin: 10px;
      width: 150px;
      
    }
    div input{
      padding: 5px;
    }
  </style>
</head>
<body>
  <form action="" method="post">
    <div>Table name: <input type="text" name="tableName"></div>
    <div>Column 1: <input type="text" name="cln1"></div>
    <div>Column 2: <input type="text" name="cln2"></div>
    <div>Column 3: <input type="text" name="cln3"></div>
    <div>Column 4: <input type="text" name="cln4"></div>
    <div>Column 5: <input type="text" name="cln5"></div>
    <button type="submit" style="padding: 10px; color:#fff; background:green; border:none; border-radius:10px; font-weight:bold">Connect Table</button>
  </form>
  <?php
  try{
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $tableName = $_POST['tableName'];
      $cln1 = $_POST['cln1'];
      $cln2 = $_POST['cln2'];
      $cln3 = $_POST['cln3'];
      $cln4 = $_POST['cln4'];
      $cln5 = $_POST['cln5'];
      $sql = "CREATE TABLE IF NOT EXISTS $tableName(
      id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      $cln1 VARCHAR(30) NOT NULL,
      $cln2 VARCHAR(30) NOT NULL,
      $cln3 VARCHAR(30) NOT NULL,
      $cln4 VARCHAR(30) NOT NULL,
      $cln5 VARCHAR(30) NOT NULL)";
      $con = new PDO("mysql:host=localhost;dbname=myDB", 'root', '');
      $con->exec($sql);
      echo "Table has been created successfully";
    }
    
  }catch(PDOException $e){
    echo "There was an error in creating table!!!";
  }
  ?>
</body>
</html>