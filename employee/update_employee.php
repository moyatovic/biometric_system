<?php
$data = json_decode(file_get_contents("php://input"));
require("../db/dbconn.php");
$query = "UPDATE employee SET
 firstname = $data->firstname
  lastname = $data->lastname
  middlename = $data->lastname
  dob = date('Y-m-d', strtotime($data->dob)
  gender = $data->gender
  marital_status = $data->marital
  home_address = $data->home_address
  phone_number = $data->phone
  joinedfirmdate = date('Y-m-d', strtotime($data->joinedDate))
  department  = $data->department_name
  pin = $data->role
  employmentType = $data->employment_type";


$qry = $conn->query($query);
$conn->close();
?>