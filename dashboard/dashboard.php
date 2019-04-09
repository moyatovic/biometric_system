<?php 
  require("../db/dbconn.php");
  session_start(); 



  $data = json_decode(file_get_contents("php://input"), TRUE);
  $date = date('Y-m-d', strtotime($data['date']));
  

  // $query = "SELECT * FROM timesheet JOIN employee USING employee_id WHERE date = $date";
  
// returns list of employees
$employees = [];


  $query = "SELECT e.firstname, e.lastname d.department, t.time_in,t.time_out FROM ((timesheet t, 
  INNER JOIN employee e ON t.employee_id = e.id)
  INNER JOIN department d ON e.department = d.id) WHERE entry_date = $date ";
    
  if ($result = $conn->query($query)) {
      $i = 0;                   
      while ($row = $result->fetch_assoc()) {
          $employees[$i] = $row;
          $i++;
          echo "it works but it empty";
          }  
      echo json_encode($employees);

      }
      else{
        http_response_code(404);
      }
     mysqli_close($conn);     
?>

