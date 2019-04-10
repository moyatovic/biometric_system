<?php 
  require("../db/dbconn.php");




  
// returns list of employees
$employees = [];


  $query = "SELECT employee.id, firstname,lastname,middlename, dob,gender,marital_status,home_address,phone_number,joinedfirmdate, employment_type, pin, department.department_name FROM employee 
            INNER JOIN department ON employee.department = department.id";
    
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

