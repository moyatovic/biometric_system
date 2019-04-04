<html>
<body>
<?php 
  require("../db/dbconn.php");
  session_start(); 



  $data = json_decode(file_get_contents("php://input"), TRUE);
  $date = $data['date'];


  // $query = "SELECT * FROM timesheet JOIN employee USING employee_id WHERE date = $date";
  
// returns list of employees
$employees = [];


  $query = "SELECT * from EMPLOYEE";
    
  if ($result = $conn->query($query)) {
      $i = 0;                   
      while ($row = $result->fetch_assoc()) {
          $employees[$i]['id'] = $row['id'];
          $employees[$i]['name'] = $row['firstname']." ".$row['lastname'];
          $employees[$i]['department'] = $row['department'];
          $employees[$i]['role'] = $row['role'];
        
          
          }  
      echo json_encode($employees);

      }
      else{
        http_response_code(404);
      }
          
?>


</body>
</html>