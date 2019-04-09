<?php 
  require("../db/dbconn.php");
  session_start(); 



  
// returns list of employees
$employees = [];


  $query = "SELECT * FROM employee";
    
  if ($result = $conn->query($query)) {
      $i = 0;                   
      while ($row = $result->fetch_assoc()) {
          $employees[$i] = $row;
          $i++;
          
          }  
      echo json_encode($employees);

      }
      else{
        http_response_code(404);
      }
     mysqli_close($conn);     
?>

