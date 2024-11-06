<?php

$emmployee_id = $_POST['id'];

$str = implode(",",$emmployee_id);

// echo $str;

$conn = mysqli_connect("localhost","root","","jq-ajx") or die("Connection has been failed");

$sql = "DELETE from employees where id IN ({$str})";

if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}
?>