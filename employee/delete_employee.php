<?php
require("../db/dbconn.php");
$data = json_decode(file_get_contents("php://input"), true);
  $id = $data['id'];
    if(!empty($id))
    {
        $del_query=$conn->prepare("DELETE FROM employee WHERE id = $id");
        $del_query->execute();

        echo "deleted";
    }
    else {
        echo "No id received ";
        http_response_code(400);
    }

?>