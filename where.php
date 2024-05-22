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
    table tbody tr:nth-child(odd):hover{
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
    table tbody tr:nth-child(even):hover{
      color: #5E1675;
      background: #fff;
    }
    table tbody tr td{
      border-radius: 10px;
    }
    .inp{
      display: flex;
      justify-content: center;
      width: 500px;
      /* background: red; */
      height: 50px;
      margin: 30px auto;
    }
    .inp input{
      
      margin: 10px;
      padding: 5px;
      font-size: 16px;
      border: none;
      border-radius: 4px;
      outline: none;
      /* text-align: cente; */
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
          <table >
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
  <div class="inp"><input type="text" placeholder="email@example.com"></div>
  <script>
    const input = document.querySelector('input');
    const values = document.querySelector('table tbody tr');
    const tb = document.getElementById('tb');
      // console.log(tb.innerHTML);
    input.onkeyup = () => {
      let xhr = new XMLHttpRequest();
      xhr.open('POST', 'search.php', true);
      xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            // console.log(input.value);
            if(input.value != ""){
              tb.innerHTML = data;
              // tb.style.display = 'none';
            }
            else{
              
              // tb.style.display = 'block';
              window.location.reload();
            }
            
          }
        }
      }
      xhr.setRequestHeader('Content-type', "application/x-www-form-urlencoded")
      xhr.send("search=" + input.value);
    }
  </script>
</body>
</html>