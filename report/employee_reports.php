<?php

  require('../db/dbconn.php');

  $data = json_decode(file_get_contents("PHP://input"),true);
  $emp_id = mysqli_real_escape_string($conn, $data['id']);
 // $date =  date('Y-m-d', strtotime(mysqli_real_escape_string($conn, $data['date']))); 
  $emp_id = 1;
  $employees = [];

  //select the User id that exist in timesheet table 
  // $sel_query = "SELECT employee.firstname, employee.lastname, department.department_name, timesheet.time_in, timesheet.time_out, timesheet.entry_date FROM timesheet  
  // INNER JOIN employee  ON timesheet.employee_id = employee.id
  // INNER JOIN department ON employee.department = department.id WHERE timesheet.employee_id = '".$emp_id."'  ORDER BY entry_date";
  
  $sel_query = $conn->prepare("SELECT firstname, lastname, department.department_name 
                FROM employee
                INNER JOIN department ON employee.department = department.id
                WHERE employee.id = '".$emp_id."'");
  
        $sel_query->execute();
        $response = $sel_query->get_result();  
        $employees[]= $response->fetch_object();       
        
  
  $sel_query2 = "SELECT time_in, time_out, entry_date 
                 FROM timesheet
                 WHERE employee_id = '".$emp_id."'
                 ORDER BY entry_date";
      if($stmt = $conn->prepare($sel_query2)){

        $stmt->execute();
      
      $result = $stmt->get_result();
    if($result->num_rows >0 ){
      
    $i=1;
                  
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
    }
    else{
      http_response_code(400);
    }
    
?>