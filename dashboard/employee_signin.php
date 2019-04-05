<?php
   
    require("../db/dbconn.php");

 session_start();
    $entry_time = date('h:i:s');
    $entry_date = date('Y-m-d');
    $data = json_decode(file_get_contents("php://input"), TRUE);
    $username = $data['user_id'];
    echo $username;
    
    if($username){
    $query = "SELECT * FROM timesheet where employee_name = '".$username."' AND time_out = null AND entry_date = '".$entry_date."'";

    $result = mysqli_query($conn, $query);
    
    $numrows = mysqli_num_rows($result);
    
    echo $numrows;
    
    if($numrows==0){

      $query = "INSERT INTO timesheet (id,employee_name,time_in, entry_date) VALUES(null,'$username','$entry_time','$entry_date')";

      if (mysqli_query($conn, $query)) {                  
        echo " successfully";mysqli_close($conn);
  } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }
      
      
//            return true;
      }
      else {
        echo "Cannot Sign in twice without signing out!";
        
        if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
          header( "HTTP/1.1 400 BAD REQUEST" );

          exit;
        }
        
      }
    }
    

?>

