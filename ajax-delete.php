<?php

$student_id = $_POST["id"];

$conn = mysqli_connect("localhost","root","","jq-ajx") or die("Connection Failed");

$sql = "DELETE from students where id = {$student_id}";

// $result = mysqli_query($conn, $sql) or die ("query has been failed");

if (mysqli_query($conn, $sql)) {
    echo 1;
}
else {
   echo 0;
}
?>