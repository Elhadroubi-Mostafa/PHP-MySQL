<?php
// echo "dfgdfg";
  $con = new PDO("mysql:host=localhost;dbname=myDB", 'root', '');
  $stmt = $con->prepare("SELECT * FROM students ORDER BY email");
  $stmt->execute();
  $row = $stmt->rowCount();
  $output = "";
  if($row > 0){
    $fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($fetch as $rows){
      $output .= "<tr>
                    <td>" . $rows['id'] . "</td>
                    <td>" . $rows['fname'] . "</td>
                    <td>" . $rows['lname'] . "</td>
                    <td>" . $rows['email'] . "</td>
                    <td>" . $rows['phone'] . "</td>
                    <td>" . $rows['gender'] . "</td>
                  </tr>";
    }
  }
  else{
    $output .= "No email available!";
  }
  echo $output;
?>