<?php

$conn = mysqli_connect("localhost","root","","jq-ajx") or die("Connection failed");

$sql = "SELECT * FROM employees where country = '{$_POST['country']}'";

$result = mysqli_query($conn, $sql) or die("query has been failed");

$output = "";

if(mysqli_num_rows($result) > 0 ) {
    $output .= '<table border="0" width="100%" cellpadding="10px">
                <tr>
                <th width="60px">ID</th>
                <th>Name</th>
                <th width="90px">Age</th>
                <th width="90px">City</th>
                </tr>';
    while($row = mysqli_fetch_array($result)) {
        $output .= "<tr>
                    <td align='center'>{$row["id"]}</td>
                    <td>{$row["name"]}</td>
                    <td align='center'>{$row["age"]}</td>
                    <td align='center'>{$row["country"]}</td>
                    </tr>";
    }
    $output .= "</table>";
} else {
    echo "No record found";
}

echo $output;

?>