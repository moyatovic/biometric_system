<?php

      require('../db/dbconn.php');
      $employees =  array();
      $data = json_decode(file_get_contents("php://input"), TRUE);
     // $date = date('Y-m-d', strtotime($data['date']));
     $date = date('Y-m-d');

      $query = "SELECT e.firstname, e.lastname, d.department, t.time_in, t.time_out FROM timesheet where entry_date ='".$date."'";

      if ($result = $conn->query($query)) {
        $i = 0;                   
        while ($row = $result->fetch_assoc()) {
            $employees[$i] = $row;
            $i++;
            
            } 
          // print_r($employees);
        echo json_encode($employee);
  
        }
        else{
          http_response_code(404);
        }
       mysqli_close($conn);   
?>