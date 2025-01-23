<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bps3322_monika_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
