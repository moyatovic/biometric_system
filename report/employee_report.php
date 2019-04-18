<?php

require('../db/dbconn.php');

$query = "SELECT employee.firstname, employee.lastname, department.department_name, timesheet.time_in, timesheet.entry_date FROM timesheet  
INNER JOIN employee  ON timesheet.employee_id = employee.id
INNER JOIN department ON employee.department = department.id ORDER BY employee_id";

if ($result = $conn->query($query)) {
  $i = 0;                   
  while ($row = $result->fetch_assoc()) {
      $employees[$i] = $row;
      $i++;
      
      } 
    // print_r($employees);
  echo json_encode($employees);

  }
  else{
    echo "nope"; 
    http_response_code(405);
  }
 mysqli_close($conn);  
?>