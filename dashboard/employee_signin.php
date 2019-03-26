<?php
    session_start();
    reqiure("../db/dbconn.php");


    $entry_time = date('h:i:sa');
    $entry_date = date('d-m-Y');
    $data = json_decode(file_get_contents("php://input"), TRUE);
    $user_id = $data['user_id'];
    echo $user_id;
    
    if($user_id){
    $query = "SELECT * FROM report where employee_id = '".$user_id."' AND entry_date = '".$entry_date."'";

    $result = mysqli_query($conn, $query);
    
    $numrows = mysqli_num_rows($result);
    
    echo $numrows;
    
    if($numrows==0){

      $query = "INSERT INTO timesheet (id,employee_name,time_in, entry_date) VALUES('','$user_id','$entry_time','$entry_date')";

      mysqli_query($conn, $query);

      
      
      echo "Successfully Added";
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

