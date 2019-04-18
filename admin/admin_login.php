<?php
 // connection to database file
      require('../db/dbconn.php');


      $data = json_decode(file_get_contents("php://input"), TRUE);
      $username = mysqli_real_escape_string($conn, $data['username']);
      $password = mysqli_real_escape_string($conn, md5($data['password']));
      
      //Retrieve the admin account information for the given username.
        $sel_query = "SELECT id, username, password FROM admins WHERE username = ?";
        $stmt = $conn->prepare($sel_query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    
     //If $row is FALSE.
     if($user === false){
        //Could not find a admin with that username!
         http_response_code(401);
        die('Incorrect username / password combination!');
       
    } else{
        // admin found. Check if password matches the password hash in database
        if($password == $user['password']){
           header( "HTTP/1.1 200 OK" );
            exit;
            
        } else{
            //Passwords do not match.
             http_response_code(401);
            die('Incorrect username / password combination!');
           
        }
    }
      
       
      ?>