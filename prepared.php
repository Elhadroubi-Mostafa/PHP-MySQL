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
    form{
      width: 100%;
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
      text-align: center;
    }
    .container{
      width: 100%;
      display: flex;
    }
  </style>
</head>
<body>
  <h1>PHP MySQL Get Last Inserted ID</h1>

  <form action="" method="post">
    <div class="container">
      <div>
        <div>FirstName: <input type="text" name="fname1"></div>
        <div>LastName: <input type="text" name="lname1"></div>
        <div>Email: <input type="text" name="email1"></div>
        <div>phone: <input type="number" name="phone1"></div> 
        <div>
          Gender: 
          <input type="radio" name="gender1" value="male">Male
          <input type="radio" name="gender1" value="female">Female
        </div>
      </div>
      <div>
        <div>FirstName: <input type="text" name="fname2"></div>
        <div>LastName: <input type="text" name="lname2"></div>
        <div>Email: <input type="text" name="email2"></div>
        <div>phone: <input type="number" name="phone2"></div> 
        <div>
          Gender: 
          <input type="radio" name="gender2" value="male">Male
          <input type="radio" name="gender2" value="female">Female
        </div>
      </div>
    </div>
    <button type="submit" name="submit">Insert</button>
  </form>
  <?php
    $con = new PDO("mysql:host=localhost; dbname=myDB", 'root', '');
    try{
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $fname1 = $_POST['fname1'];
        $lname1 = $_POST['lname1'];
        $email1 = $_POST['email1'];
        $phone1 = $_POST['phone1'];
        $gender1 = $_POST['gender1'];

        $fname2 = $_POST['fname2'];
        $lname2 = $_POST['lname2'];
        $email2 = $_POST['email2'];
        $phone2 = $_POST['phone2'];
        $gender2 = $_POST['gender2'];

        $stmt = $con->prepare("SELECT * FROM students WHERE email = '$email1' OR email = '$email2'");
        $stmt->execute();
        $row = $stmt->rowCount();
        if($row > 0){
          $fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
          foreach ($fetch as $rows){
            echo $rows['email'] . "already exist!!\n";
          }
        }else{
          $stmt2 = $con->prepare("INSERT INTO students(fname, lname,
          email, phone, gender) VALUES(:firstname, :lastname, :email, :phone, :gender)");
          $stmt2->bindParam(':firstname', $firstname);
          $stmt2->bindParam(':lastname', $lastname);
          $stmt2->bindParam(':email', $emails);
          $stmt2->bindParam(':phone', $phones);
          $stmt2->bindParam(':gender', $genders);

          $firstname = $fname1;
          $lastname = $lname1;
          $emails = $email1;
          $phones = $phone1;
          $genders = $gender1;
          $stmt2->execute();

          $firstname = $fname2;
          $lastname = $lname2;
          $emails = $email2;
          $phones = $phone2;
          $genders = $gender2;
          $stmt2->execute();

          echo "Data inserted successfully \n";
        }
      }
    }catch(PDOException $e){
      echo "There was an error in inserting data\n" . $e->getMessage();
    }
    ?>
</body>
</html>