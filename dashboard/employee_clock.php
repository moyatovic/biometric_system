<?php
   
    require("../db/dbconn.php");

    session_start();

    $entry_time = date('H:i:sa');
    $entry_date = date('Y-m-d');
    $user_id = $_GET['id'];
  
    echo $user_id;
    
    if($user_id > 0){
    $query = "SELECT * FROM timesheet where employee_id = '".$user_id."' AND time_out IS NULL AND entry_date = '".$entry_date."'";
    if($stmt = $conn->prepare($query)){
    
      $stmt->execute();
    
     $result = $stmt->get_result();
echo "No of records : ".$result->num_rows."<br>";
     
      if($result->num_rows == 0 ){
     
      $query = "INSERT INTO timesheet (id,employee_id,time_in, entry_date) VALUES(null,$user_id,CURTIME(),'$entry_date')";

      if (mysqli_query($conn, $query)) {                  
        echo " successfully";
        mysqli_close($conn);
  } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }
      
      
//            return true;
      }
      else {
        $row=$result->fetch_object();
        $id = $row->id;
       echo $id;
        $query = "UPDATE timesheet set time_out = CURTIME() WHERE employee_id = '".$user_id."' AND  entry_date = '".$entry_date."' AND id = $id ";

        if (mysqli_query($conn, $query)) {                  
          echo " successfully updated";
          mysqli_close($conn);
    } else {
          echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
        
      }
    }
  }

?>

