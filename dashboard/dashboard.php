<?php 
  require("../db/dbconn.php");
 


  
  $date = date('Y-m-d');
  

  // $query = "SELECT * FROM timesheet JOIN employee USING employee_id WHERE date = $date";
  
// returns list of employees
$employees = [];


  $query = "SELECT employee.firstname, employee.lastname, department.department_name, timesheet.time_in,timesheet.time_out, timesheet.entry_date FROM timesheet  
  INNER JOIN employee  ON timesheet.employee_id = employee.id
  INNER JOIN department ON employee.department = department.id WHERE timesheet.entry_date = '".$date."'";
  
   if($stmt = $conn->prepare($query)){
   
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
        http_response_code(404);
      }
    }
     mysqli_close($conn);  

?>

