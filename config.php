<?php
@ini_set("output_buffering", "Off");
@ini_set('implicit_flush', 1);
@ini_set('zlib.output_compression', 0);
@ini_set('max_execution_time',1200);
header('Content-type: text/html;  charset=utf-8' );

/**
 * LOGIN INFORMATION INTO DB
 */
$servername = 'localhost';
$password = '';
$username='root';
$dbname = 'alaus';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}