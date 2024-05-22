<?php $id = $_GET['id']; 
    $con = new PDO("mysql:host=localhost; dbname=myDB", 'root', '');
    try{
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];

        
          $stmt2 = $con->prepare("UPDATE students SET fname = '$fname', lname = '$lname',
          email = '$email', phone = '$phone', gender = '$gender' WHERE id = $id");
          $stmt2->execute();
          // ob_end_clean();
          header('location:actions.php'); 
          // exit;
    
      }
    }catch(PDOException $e){
      echo "There was an error in inserting data" . $e->getMessage();
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    h1{
      text-align: center;
    }
    table thead tr th{
      padding: 10px 35px;
      color: #fff;
      background: #7633FF;
      border-radius: 10px;
      /* text-align: center; */
      
    }
    body{
      background: #E1AFD1;
    }
    table tbody tr td{
      padding: 10px 35px;
    }
   
    table{
      margin: auto;
    }
    table tbody tr:nth-child(odd){
      color: #000;
      background: #7469B6;
      font-size: 18px;
      font-weight: bold;
      text-align: center;
      
    }
    table tbody tr td:nth-child(odd):hover{
      color: #7469B6;
      background: #000;
    }
    
     table tbody tr:nth-child(even){
      color: #fff;
      background: #5E1675;
      font-size: 18px;
      font-weight: bold;
      text-align: center;
    }
    table tbody tr td:nth-child(even):hover{
      color: #5E1675;
      background: #fff;
    }
    table tbody tr td{
      border-radius: 10px;
    }
    .form{
      width: 300px;
      /* background: red; */
      margin: auto;
      padding: 10px;
    }
    form div{
      font-weight: 700;
    }
    div{
      margin: 10px;
      width: 350px;
      
    }
    div input{
      padding: 5px;
    }
    button{
      color:#fff;
      background: #7469B6;
      border: none;
      border-radius: 10px;
      padding: 10px 20px;
      font-weight: bold;
      font-size: 16px;
      
    }
    
  </style>
</head>
<body>
  <h1>PHP MySQL Update and Delete Data</h1>
  
      <?php
        $con = new PDO("mysql:host=localhost;dbname=myDB", 'root', '');
        $stmt = $con->prepare("SELECT * FROM students");
        $stmt->execute();
        $row = $stmt->rowCount();
        if($row > 0){
          ?>
          <table >
            <thead>
              <tr>
                <th>ID</th>
                <th>firstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>phone</th>
                <th>Gender</th>
                <th colspan="2">Actions</th>
              </tr>
            </thead>
            <tbody id="tb">
              <?php
          $fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
          foreach ($fetch as $rows){
            // $id = $rows['id'];
            ?>
            <tr>
              <td><?php echo $rows['id'];?></td>
              <td><?php echo $rows['fname'];?></td>
              <td><?php echo $rows['lname'];?></td>
              <td><?php echo $rows['email'];?></td>
              <td><?php echo $rows['phone'];?></td>
              <td><?php echo $rows['gender'];?></td>
              <!-- <div> -->
                <td ><a href="actions.php?id=<?php echo $rows['id'];?> "><i class="fa-solid fa-pen" ></i></a></td>
                <td class="delete"><i class="fa-solid fa-trash"></i></td>
              <!-- </div> -->
            </tr>
          
    <?php
          }
        }
        
        else{
          echo "No data exist!";
        }
      ?>
      </tbody>
      
  </table>
  <!-- <div class="inp"><button>Sort</button></div> -->
  <?php $id = $_GET['id']; 
  $stmt2 = $con->prepare("SELECT * FROM students WHERE id = $id");
  $stmt2->execute();
  $Row = $stmt2->rowCount();
  if($Row > 0){
    $fetchs = $stmt2->fetch(PDO::FETCH_ASSOC);
    $fname = $fetchs['fname'];
    $lname = $fetchs['lname'];
    $email = $fetchs['email'];
    $phone = $fetchs['phone'];
    $gender = $fetchs['gender'];
  }
  ?>
  <div class="form">
    <form action="" method="post">
      <div>FirstName: <input type="text" value="<?php echo $fname;?>" name="fname"></div>
      <div>LastName: <input type="text" value="<?php echo $lname;?>" name="lname"></div>
      <div>Email: <input type="text" value="<?php echo $email;?>" name="email"></div>
      <div>phone: <input type="number" value="<?php echo $phone;?>" name="phone"></div> 
      <div>
        Gender: 
        <input type="radio" name="gender" value="male" <?php if(isset($gender) && $gender == "male"){
          echo "checked";
          }?>>Male
        <input type="radio" name="gender" value="female" <?php if(isset($gender) && $gender == "female"){
          echo "checked";
          }?>>Female
      </div>
      <button type="submit" name="submit" id="btn">Update</button>
    </form>
  </div>
  
</body>
</html>