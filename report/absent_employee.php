<?php

  require('../db/dbconn.php');

  $data = json_decode(file_get_contents("PHP://input"),true);
   $date = date('Y-m-d', strtotime("data['date']")); 
  
  $employees = [];

  //select the data from employee that do not exist in timesheet table 
  $sel_query ="SELECT employee.firstname, employee.lastname, department.department_name FROM employee 
  INNER JOIN department ON employee.department = department.id
  WHERE employee.id NOT IN 
  (SELECT t.employee_id FROM timesheet t WHERE entry_date = '".$date."')";
  
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