<?php
   
    require("../db/dbconn.php");

    

    $entry_time = date('H:i:sa');
    $entry_date = date('Y-m-d');
    $user_id = $_GET['id'];
  
   
    
    if($user_id > 0){
    $sel_query = "SELECT * FROM timesheet where employee_id = '".$user_id."' AND time_out IS NULL AND entry_date = '".$entry_date."'";
    if($stmt = $conn->prepare($sel_query)){
    
      $stmt->execute();
    
     $result = $stmt->get_result();

     
      if($result->num_rows == 0 ){
     
      $ins_query = "INSERT INTO timesheet (id,employee_id,time_in, entry_date) VALUES(null,$user_id,CURTIME(),'$entry_date')";

      if (mysqli_query($conn, $ins_query)) { 
        $sel_query = $conn->prepare("SELECT firstname from employee where id = $user_id"); 
        $sel_query->execute();
        $result = $sel_query->get_result();  
        $row=$result->fetch_object();       
        echo json_encode($row);      
        mysqli_close($conn);
        http_response_code(200);
  } else {
        echo "Error: " . $ins_query . "<br>" . mysqli_error($conn);
  }
      
      
//            return true;
      }
      else {
        $row=$result->fetch_object();
        $id = $row->id;
      
        $up_query = "UPDATE timesheet set time_out = CURTIME() WHERE employee_id = '".$user_id."' AND  entry_date = '".$entry_date."' AND id = $id ";

        if (mysqli_query($conn, $up_query)) { 
          $sel_query = $conn->prepare("SELECT firstname from employee where id = $user_id"); 
          $sel_query->execute();
          $result = $sel_query->get_result();  
          $row=$result->fetch_object();  
          echo json_encode($row);      
          mysqli_close($conn);
          http_response_code(200);                 
          
         
    } else {
          echo "Error: " . $up_query . "<br>" . mysqli_error($conn);
    }
        
      }
    }
  }

?>

