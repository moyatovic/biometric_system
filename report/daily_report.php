<?php

  require('../db/dbconn.php');

  $data = json_decode(file_get_contents("PHP://input"),true);
  $date =  date('Y-m-d', strtotime(mysqli_real_escape_string($conn, $data['date']))); 
  
  $employees = [];

  //select the User id that exist in timesheet table 
  $sel_query = "SELECT employee.firstname, employee.lastname, department.department_name, timesheet.time_in, time_out, timesheet.entry_date FROM timesheet  
  INNER JOIN employee  ON timesheet.employee_id = employee.id
  INNER JOIN department ON employee.department = department.id WHERE timesheet.entry_date = '".$date."'  ORDER BY employee~_id";
  
  
  $stmt = $conn->prepare($sel_query);

    
    $stmt->execute();
  
   $result = $stmt->get_result();

    if($result->num_rows >0 ){
      
      $i=0;
                  
     while ($row=$result->fetch_object()) {
         $employees[$i] = $row;
         $i++;
        
         }
      
      echo json_encode($employees);

      }
      else{
        echo json_encode($result);
      }
    
     mysqli_close($conn);  

    
?>