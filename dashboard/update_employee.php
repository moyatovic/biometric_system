<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php";
$sql = "UPDATE employees SET
 firstname = $data->firstname
  lastname = $data->lastname
  middlename = $data->lastname
  $dob = date('Y-m-d', strtotime($data->dob
  $gender = $data['gender'];
  $marital = $data['marital'];
  $address = $data['address'];
  $phone = $data['phone'];
  $joinedDate = date('Y-m-d', strtotime($data['joinedDate']));
  $department  = $data['department'];
  $role = $data['role'];
  $employmentType = $data['employmentType'];"


$qry = $conn->query($sql);
if($data->name){
}
$conn->close();
?>