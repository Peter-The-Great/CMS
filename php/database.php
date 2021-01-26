<?php
    $user = 'root';
    $pass = '';
    $db = 'cmstest';
    $host = '127.0.0.1';

    $conn = new mysqli($host, $user, $pass, $db) or die("Unable to connect");
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
?>