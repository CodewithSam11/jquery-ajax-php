<?php

$conn = mysqli_connect("localhost","root","","jq-ajx") or die("Connection has been failed");

if (isset($_POST['date1']) && isset($_POST['date2']) ) {
    $min = $_POST['date1'];
    $max = $_POST['date2'];

    $sql = "SELECT * from employees where fake_dob BETWEEN '{$min}' AND '{$max}'";
} else {
    $sql = "SELECT * from employees ORDER BY id asc";
}

$result = mysqli_query($conn, $sql) or die("query unsuccessfull");
$output = "";

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) {
        $dob = date('d M, Y', strtotime($row['fake_dob']));
        $output .= "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['country']}</td>
                    <td>{$dob}</td>
                    </tr>";
    }
    echo $output;
} else {
    echo "<h2>No Record Found.</h2>";
}

?>