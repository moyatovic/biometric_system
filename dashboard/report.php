<?php

      require('../db/dbconn.php');
      $employees =  array();
      $data = json_decode(file_get_contents("php://input"), TRUE);
     // $date = date('Y-m-d', strtotime($data['date']));
     $date = date('Y-m-d');

      $query = "SELECT * FROM timesheet where entry_date ='".$date."'";

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