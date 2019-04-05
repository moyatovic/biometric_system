<?php
$data = json_decode(file_get_contents("php://input"));
require("../db/dbconn.php");


$emp = array() ;

$user_id = 1;
$query = "SELECT * FROM employee WHERE id = '".$user_id."'";
$result = mysqli_query($conn, $query);

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
