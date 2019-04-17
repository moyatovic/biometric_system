<?php

      require('../db/dbconn.php');
      $employees =  array();
      $data = json_decode(file_get_contents("php://input"), TRUE);
     // $date = date('Y-m-d', strtotime($data['date']));
     $date = mysqli_real_escape_string($conn, date('Y-m-d'));
     
      $query = "SELECT employee.firstname, employee.lastname, department.department_name, timesheet.time_in, timesheet.entry_date FROM timesheet  
      INNER JOIN employee  ON timesheet.employee_id = employee.id
      INNER JOIN department ON employee.department = department.id WHERE timesheet.entry_date = '".$date."' ORDER BY employee_id";

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