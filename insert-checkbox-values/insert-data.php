<?php

$conn = mysqli_connect("localhost","root","","jq-ajx") or die("connection failed");

$name = $_POST['name'];
$languages = $_POST['languages'];

$sql =  "INSERT INTO workers (name, languages) VALUES ('{$name}', '{$languages}')";

if(mysqli_query($conn, $sql)) {
    echo "Successfully saved";
} else {
    echo "Can't save the form data";    
}

?>