<?php
$servername = "localhost";
$username = "root";
$password = "satraa17";

// create connection
$conn = new mysqli($servername,$username,$password);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";


?>