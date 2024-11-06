<?php

$conn = mysqli_connect("localhost","root","","jq-ajx") or die("connction failed");

$sql = "SELECT * from students";

$result = mysqli_query($conn, $sql) or die("query has been failed");
$output = mysqli_fetch_all($result, MYSQLI_ASSOC);

// $json_data = json_encode($output); 
$json_data = json_encode($output, JSON_PRETTY_PRINT); // this is for the readable format otherwise above is correct

$file_name = "my-".date("d-m-Y").".json";

if(file_put_contents("json/{$file_name}", $json_data)) {
    echo $file_name . "File created";   
} else {
    echo "can't insert the data in the json file";
}

?>