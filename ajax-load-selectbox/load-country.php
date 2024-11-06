<?php

$conn = mysqli_connect("localhost","root","","jq-ajx") or die('connection failed');

$sql = "SELECT DISTINCT(country) from employees";

$result = mysqli_query($conn, $sql) or die("Query has been faiuled");

if(mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($output);
} else {
    echo "No record found";
}

?>