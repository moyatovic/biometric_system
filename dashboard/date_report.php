<?php
require('../db/dbconn.php')
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$stmt = $conn->prepare("SELECT name FROM ? LIMIT ?");
$stmt->bind_param("ss", $obj->table, $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>