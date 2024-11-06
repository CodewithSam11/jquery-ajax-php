<?php

$conn = mysqli_connect("localhost","root","","jq-ajx") or die("Connection has been failed");

if(isset($_POST['range1']) && isset($_POST['range1'])) {
    $min = $_POST['range1'];
    $max = $_POST['range2'];

    $sql = "SELECT * from employees WHERE age BETWEEN {$min} AND {$max}";
} else {
    $min = '';
    $max = '';
    $sql = "SELECT * from employees ORDER BY id asc";
}

$result = mysqli_query($conn, $sql) or die("query has been failed");
$output = '';

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
                    <td align='center'>{$row['id']}</td> 
                    <td>{$row['name']}</td>
                    <td align='center'>{$row['age']}</td>
                    <td>{$row['country']}</td>    
                    </tr>";
    }
    echo $output;
} else {
    echo "No record found";
}


?>