<?php
$servername= "localhost";
$username = "root";
$password = "satraa17";
$dbname = "car_dealer_inventory";
$tbci = "current_inventory";

try{
    $connection = new mysqli($servername,$username,$password,$dbname);
    if($connection->connect_error){
        die("Connection Failed: $connection->connect_error");
    }
    $ins = "select * from $tbci";
    $rs = mysqli_query($connection,$ins);
    echo 'hello';
}
catch(Exception $e){
    echo 'error';
}
?>