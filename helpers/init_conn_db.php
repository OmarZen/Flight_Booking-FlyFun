<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = 'flightbooking';
$db_port = 3307;

$conn = mysqli_connect($servername, $db_username, $db_password, $db_name, $db_port);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connection sucess";
