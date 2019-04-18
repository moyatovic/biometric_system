<?php 
  require("../db/dbconn.php");
 


  
  $date = date('Y-m-d');
  

  
  $employees = [];


  $sel_query = "SELECT employee.firstname, employee.lastname, department.department_name, timesheet.time_in, timesheet.entry_date FROM timesheet  
  INNER JOIN employee  ON timesheet.employee_id = employee.id
  INNER JOIN department ON employee.department = department.id WHERE timesheet.entry_date = '".$date."' AND time_out IS NULL ORDER BY time_in";
  
   if($stmt = $conn->prepare($sel_query)){
   
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
        $employees[]= array("firstname"=>" ","lastname"=>" ", "department"=>" ", "time_in"=>" ", "entry_date"=>"$date" );
        echo json_encode($employees);
      }
    }
     mysqli_close($conn);  

?>

