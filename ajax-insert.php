<?php

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$date = date('Y-m-d H:i:s');

$conn = mysqli_connect("localhost","root","","jq-ajx") or die("Connection Failed");

$sql = "INSERT into students(first_name, last_name, created_at) VALUES('{$first_name}','{$last_name}','{$date}')";
// $result = mysqli_query($conn, $sql) or die("Query has been failed"); 
if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}

?>