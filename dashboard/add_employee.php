<?php
  session_start();
 // require('isloggedin.php');
  require('../db/dbconn.php');

// fetching encoded json data from angular
  $data = json_decode(file_get_contents("php://input"), TRUE);
  // $firstname = $data['firstname'];
  // $lastname = $data['lastname'];
  // $middlename = $data ['lastname'];
  // $dob = $data['dob'];
  // $gender = $data['gender'];
  // $marital = $data['marital'];
  // $address = $data['address'];
  // $phone = $data['phone'];
  // $joinedDate = $data['joinedDate'];
  // $department  = $data['department'];
  // $role = $data['role'];
  // $employmentType = $data['employmentType'];
  // $createdBy = $data['createdBy'];

  $firstname = "adeleke"; 
  $lastname = "badekale";
  $middlename= "michael" ;
  $dob= "08/08/1996"; 
  $gender="male";
  $marital="single";
   $address = "G12, Pinnock Beach Estate, osapa london, lagos"; $phone="07017363892"; 
   $joinedDate="03/07/2018"; 
   $department= "Technology";
    $role= "intern";
    $employmentType = "contract";
    $createdBy= "HR"; 

  $query = "INSERT INTO employee
            VALUES($firstname, $lastname, $middlename, $dob, $gender,$marital, $address, $phone, $joinedDate, $department, $role, $employmentType, $createdBy)" or die(mysql_error());
            echo "successfully added";


?>