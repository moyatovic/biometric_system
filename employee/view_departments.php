<?php
$data = json_decode(file_get_contents("php://input"));
require("../db/dbconn.php");


$emp = [];

$query = "SELECT * FROM department ";
$result = mysqli_query($conn, $query);

$numrows = mysqli_num_rows($result);

if ($numrows > 0) {
    // output data of each row
    $i=0;
    while($row = $result->fetch_assoc()) {
        $emp[$i] = $row;
        $i++;
    }
    echo json_encode($emp);

} else {
    echo "0 results";
}
$conn->close();
?>
