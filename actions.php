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
            ?>
            <tr>
              <td><?php echo $rows['id'];?></td>
              <td><?php echo $rows['fname'];?></td>
              <td><?php echo $rows['lname'];?></td>
              <td><?php echo $rows['email'];?></td>
              <td><?php echo $rows['phone'];?></td>
              <td><?php echo $rows['gender'];?></td>
              <!-- <div> -->
                <td><a href="update.php?id=<?php echo $rows['id'];?>"><i class="fa-solid fa-pen" ></i></a></td>
                <td><a href="delete.php?id=<?php echo $rows['id'];?>"><i class="fa-solid fa-trash"></i></a></td>
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
  
  <script>
    const insertBtn = document.querySelector('#btn');
    const tb = document.getElementById('tb');
    const updateBtn = document.querySelectorAll('.update');
    const deleteBtn = document.querySelectorAll('.delete');
    
    
    
  
  </script>
</body>
</html>