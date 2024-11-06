<?php

$name = $_POST['fullname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$country = $_POST['country'];

$conn = mysqli_connect("localhost","root","","jq-ajx") or die('connection has been failed');

$sql = "INSERT into employees(name, age, gender, country) VALUES('{$name}', $age, '{$gender}', '{$country}')"; 

if (mysqli_query($conn, $sql) > 0) {
    echo "Hello $name your record is saved.";
} else {
    echo "can't save the data";
}


?>