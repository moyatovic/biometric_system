<?php

session_start();

if(isset($_SESSION['user'])) {
    echo '{"status": true}';
    header('Location: dashboard.php');
} else {
    session_destroy();
    echo '{"status": false}';
    http_response_code(401);
   exit;
}
?>