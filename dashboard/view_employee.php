<?php
$data = json_decode(file_get_contents("php://input"));
require("../db/dbconn.php");
$sql = "SELECT * FROM employees WHERE id = '$data->id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
     $emp = array() ;
    while($row = $result->fetch_assoc()) {
        $emp[] = $row;
    }
} else {
    echo "0 results";
}
echo json_encode($emp);
$conn->close();
?>
