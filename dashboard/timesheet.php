<?php 

    require('../db/dbconn.php');

    $data = json_decode(file_get_contents("php://input"), TRUE);

    $query = "SELECT e.firstname, e.lastname, e.department, t.time_in, t.time_out 
              FROM employee e, timesheet t,
              WHERE e.id = t.employee_name";
     
     if ($result = $conn->query($query)) {
      while ($row = $result->fetch_assoc()) {
        $response[] = $row[]; 
      }
      echo json_encode($response);
    }


?>