<?php

session_start();

if(isset($_SESSION['user'])) {
    echo '{"status": true}';
} else {
    header('HTTP// 300 log in');
    echo '{"status": false}';
}
?>