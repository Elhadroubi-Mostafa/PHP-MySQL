<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    div{
      margin: 10px;
      width: 350px;
      
    }
    div input{
      padding: 5px;
    }
    button{
      color:#fff;
      background: green;
      border: none;
      border-radius: 10px;
      padding: 10px 20px;
      font-weight: bold;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <h1>PHP MySQL Insert Data</h1>
  <form action="" method="post">
    <div>FirstName: <input type="text" name="fname"></div>
    <div>LastName: <input type="text" name="lname"></div>
    <div>Email: <input type="text" name="email"></div>
    <div>phone: <input type="number" name="phone"></div> 
    <div>
      Gender: 
      <input type="radio" name="gender" value="male">Male
      <input type="radio" name="gender" value="female">Female
    </div>
    <button type="submit" name="submit">Insert</button>
  </form>
  <?php
    $con = new PDO("mysql:host=localhost; dbname=myDB", 'root', '');
    try{
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];

        $stmt = $con->prepare("SELECT * FROM students WHERE email = '$email'");
        $stmt->execute();
        $row = $stmt->rowCount();
        if($row > 0){
          echo "user already exist!";
        }else{
          $stmt2 = $con->prepare("INSERT INTO students(fname, lname,
          email, phone, gender) VALUES('$fname', '$lname', '$email', '$phone', '$gender')");
          $stmt2->execute();
          echo "Data inserted successfully";
        }
      }
    }catch(PDOException $e){
      echo "There was an error in inserting data" . $e->getMessage();
    }
    ?>
</body>
</html>