<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    h1{
      text-align: center;
    }
    table thead tr th{
      padding: 10px 35px;
      color: aqua;
      background: black;
      
      /* text-align: center; */
      
    }
    table{
      margin: auto;
    }
    tr:nth-child(odd){
      color: #fff;
      background: orangered;
      font-size: 18px;
      font-weight: bold;
      text-align: center;
    }
     tr td:nth-child(even){
      color: red;
      background: blue;
      font-size: 18px;
      font-weight: bold;
    }
    
  </style>
</head>
<body>
  <h1>PHP MySQL Select Data</h1>
  
      <?php
        $con = new PDO("mysql:host=localhost;dbname=myDB", 'root', '');
        $stmt = $con->prepare("SELECT * FROM students");
        $stmt->execute();
        $row = $stmt->rowCount();
        if($row > 0){
          ?>
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>firstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>phone</th>
                <th>Gender</th>
              </tr>
            </thead>
            <tbody>
              <?php
          $fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
          foreach ($fetch as $rows){
            ?>
            <tr>
              <td><?php echo $rows['id'];?></td>
              <td><?php echo $rows['fname'];?></td>
              <td><?php echo $rows['lname'];?></td>
              <td><?php echo $rows['email'];?></td>
              <td><?php echo $rows['phone'];?></td>
              <td><?php echo $rows['gender'];?></td>
            </tr>
          </tbody>
    <?php
          }
        }
        else{
          echo "No data exist!";
        }
      ?>
      
  </table>
</body>
</html>