<?php
 session_start();
  require('../db/dbconn.php');
// fetching encoded json data from angular
  $data = json_decode(file_get_contents("php://input"), TRUE);
  $firstname = $data['firstname'];
  $lastname = $data['lastname'];
  $middlename = $data ['lastname'];
  $dob = date('Y-m-d', strtotime($data['dob']));
  $gender = $data['gender'];
  $marital = $data['marital'];
  $address = $data['address'];
  $phone = $data['phone'];
  $joinedDate = date('Y-m-d', strtotime($data['joinedDate']));
  $department  = $data['department'];
  $role = $data['role'];
  $employmentType = $data['employmentType'];
 

        $query = "INSERT INTO employee VALUE (null, '$firstname', '$lastname', '$middlename',' $dob',' $gender','$marital', '$address', '$phone', '$joinedDate', '$department', '$role',' $employmentType')" ;
                
           if (mysqli_query($conn, $query)) {
                  echo "New record created successfully";
            } else {
                  echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            
              


?>