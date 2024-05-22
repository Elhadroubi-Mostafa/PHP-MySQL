<?php
// echo "fgdfggf";
  $con = new PDO("mysql:host=localhost;dbname=myDB", 'root', '');
  $search = $_POST['search'];
  // echo "$search";
  $stmt = $con->prepare("SELECT * FROM students WHERE email LIKE '%$search%'");
  $stmt->execute();
  $row = $stmt->rowCount();
  if($row > 0){
    $fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    foreach ($fetch as $rows){
    $output .="<tr>
                <td>" . $rows['id'] . "</td>
                <td>" . $rows['fname'] . "</td>
                <td>" . $rows['lname'] . "</td>
                <td>" . $rows['email'] . "</td>
                <td>" . $rows['phone'] . "</td>
                <td>" . $rows['gender'] . "</td>
              </tr>";
    }
    echo $output;
  }
  else{
    $output = "No email available";
    echo $output;
  }
?>