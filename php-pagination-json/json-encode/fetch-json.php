<?php

$conn = mysqli_connect("localhost","root","","jq-ajx") or die("Connection failed");

// $sql = "SELECT * from employees"; /////// for id 
$sql = "SELECT * from employees where id = {$_GET['id']}";

$result = mysqli_query($conn, $sql) or die("Query has been failed");

// $output = mysqli_fetch_all($result); // in this i am getting the multidimensional array so i am convert it into associative array.

$output = mysqli_fetch_all($result, MYSQLI_ASSOC); // it is in the associative arrays

echo json_encode($output);
// json_encode will convert the multi-dimensional array to the json object

?>