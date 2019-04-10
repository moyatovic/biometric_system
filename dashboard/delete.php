<?php
require("../db/dbconn.php");
$data = json_decode(file_get_contents("php://input"), true);
    if(!empty($data['id']))
    {
        $del_query=$conn->prepare("DELETE FROM employee WHERE id=:id");
        $del_query->bindParam(':id', $data['id']);
        $chk_ins=$del_query->execute();
    }
    $sel_query = $conn->prepare("select * from tbl_name order by id ");
    $sel_query->execute();
    echo json_encode($sel_query->fetchAll());

?>