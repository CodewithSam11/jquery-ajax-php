<?php

$student_id = $_POST["id"];

$conn = mysqli_connect("localhost","root","","jq-ajx") or die("connection failed");

$sql = "SELECT * from students where id = {$student_id}";
$result = mysqli_query($conn,$sql) or die("SQL query failed"); 

$output = "";
if (mysqli_num_rows($result) > 0) {
    $output = '';
    while($row = mysqli_fetch_assoc($result)) {
        $output .= " <tr>
                    <td>First Name:</td>
                    <td><input type='text' name='edit-fname' id='edit-fname' value='{$row["first_name"]}'></td>
                    <td><input type='text' name='edit-fname' hidden id='edit-id' value='{$row["id"]}'></td>
                </tr>
                <tr> 
                    <td>Last Name:</td>
                    <td><input type='text' name='edit-lname' id='edit-lname' value='{$row["last_name"]}'></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' name='edit-submit' id='edit-submit' value='Update'></td>
                </tr>
                <div id='close-btn'>X</div>"; 
        }

    mysqli_close($conn);
    echo $output;

} else {
    echo "<h2>Record Not found</h2>";
}
?>