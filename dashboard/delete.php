<?php
$data = json_decode(file_get_contents("php://input"));
include "../db/db.php";
$sql = "DELETE FROM employees WHERE _id = $data->id ";
$result = $conn->query($sql) or die(mysql_error());
echo "deleted successfully";
$conn->close();
?>