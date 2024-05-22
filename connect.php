
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>PHP Connect to MySQL</h1>
  <form action="" method="post">
    <button type="submit" style="padding: 10px; color:#fff; background:green; border:none; border-radius:10px; font-weight:bold">Connect Database</button>
  </form>
  <?php
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    try{
    $con = new PDO("mysql:host=localhost;dbname=myDB", 'root', '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
    catch(PDOException $e){
      echo "There was an error in connected database " . $e->getMessage();
    }
  }
?>
</body>
</html>