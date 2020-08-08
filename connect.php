<?php
    $conn = new mysqli('localhost', 'root', '', 'crud');

    if( $conn->connect_errno){
        die("Connection failed" . $conn->connect_error);
    }
?>