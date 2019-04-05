<?php
  require('../db/dbconn.php'); 


    $entry_time = date('h:i:s');
    $entry_date = date('Y-m-d');

    $data = json_decode(file_get_contents("php://input"), TRUE);
    $user_id = $data['user_id'];
    echo $user_id;

    print_r("hello world!");
    echo "Reached Here!";
    //        if(isset($_POST['user_id'])) {








  //Enter Data
      if($user_id) {
        
                    
        $query = "SELECT * FROM timesheet where employee_name = '".$user_id."' AND time_out = null AND entry_date = '".$entry_date."'";

        $result = mysqli_query($conn, $query);
        
        $numrows = mysqli_num_rows($result);
        
        
        if($numrows==0){
        $query = "UPDATE timesheet set time_out = '".$entry_time."' WHERE employee_name = '".$user_id."' AND  entry_date = '".$entry_date."'";

        if (mysqli_query($conn, $query)) {                  
          echo " successfully updated";mysqli_close($conn);
    } else {
          echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
       
        
        
      
        }
        else {
          echo "User has not been signed in!";
          header( "HTTP/1.1 400 BAD REQUEST" );

            exit;
          }
          
        }
    
      
    ?>