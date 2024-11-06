<?php

$conn = mysqli_connect("localhost","root","","jq-ajx") or die("connection has been failed");

$search_term = $_POST['country'];

$sql = "SELECT distinct(country) FROM employees where country like '%{$search_term}%'";

$result = mysqli_query($conn, $sql) or die("Sql query failed");

$output = "<ul>";

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $output .= "<li>{$row['country']}</li>";
    }
} else {
    $output .= "<li>Country not found</li>";
}

$output .= "</ul>";

echo $output;

?>