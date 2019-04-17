<?php
require("../db/dbconn.php");

//fetch json from angular
$data = json_decode(file_get_contents("php://input"));
$user_id = $data['id'];


$emp = array() ;

$sel_query = "SELECT employee.id, firstname,lastname,middlename, dob,gender,marital_status,home_address,phone_number,joinedfirmdate, employment_type, pin, department.department_name FROM employee 
INNER JOIN department ON employee.department = department.id WHERE employee.id = '".$user_id."'";
$result = mysqli_query($conn, $sel_query);

$numrows = mysqli_num_rows($result);

if ($numrows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
        $emp = $row;
    }
} else {
    echo "0 results";
}
echo json_encode($emp);
$conn->close();
?>
