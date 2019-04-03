<?php
  session_start();
  require('isloggedin.php');
  require('../db/dbconn.php');

// fetching encoded json data from angular
  $data = json_decode(file_get_contents("php://input"), TRUE);
  $firstname = $data['firstname'];
  $lastname = $data['lastname'];
  $middlename = $data ['lastname'];
  $dob = $data['dob'];
  $gender = $data['gender'];
  $marital = $data['marital'];
  $address = $data['address'];
  $phone = $data['phone'];
  $joinedDate = $data['joinedDate'];
  $department  = $data['department'];
  $role = $data['role'];
  $employmentType = $data['employmentType'];
  $createdBy = $data['createdBy'];


  $query = "INSERT INTO employee
            VALUES($firstname, $lastname, $middlename, $dob, $gender,$marital, $address, $phone, $joinedDate, $department, $role, $employmentType, $createdBy)" or die(mysql_error(http_response_code(400)));
            echo "successfully added";


?>