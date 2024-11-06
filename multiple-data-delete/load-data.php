<?php

$conn = mysqli_connect("localhost","root","","jq-ajx") or die("COnnection has been failed");

$sql = "SELECT * FROM employees";

$result = mysqli_query($conn, $sql) or die("Query has been failed");

$output = "";

if (mysqli_num_rows($result) > 0) {
    $output .= "<table border='0' width='100%' cellpadding='10px' cellspacing='2px'>
                <tr>
                    <th width='30px'></th>
                    <th width='60px'>ID</th>
                    <th>Name</th>
                    <th width='90px'>Age</th>
                    <th width='90px'>Country</th>
                </tr>";

    while($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
                    <td align='center'><input type='checkbox' value='{$row['id']}'></td>
                    <td align='center'>{$row['id']}</td>
                    <td align='center'>{$row['name']}</td>
                    <td align='center'>{$row['age']}</td>
                    <td align='center'>{$row['country']}</td>
                    </tr>";
    }
    $output .= "</table>";

    echo $output;
} else {
    echo "<h2>No records found</h2>";
}

?>