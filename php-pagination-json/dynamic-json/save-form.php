<?php

if($_POST['fullname'] != "" && $_POST['age'] != "" && $_POST['city'] != "") {
    
    if(file_exists('json/employee-data.json')) {

        $current_data = file_get_contents('json/employee-data.json');
        $array_data = json_decode($current_data, true);

        $new_data = array(
            'name' => $_POST['fullname'],
            'age' => $_POST['city'],
            'city' => $_POST['city'],
        );

        $array_data[] = $new_data;
        $json_data = json_encode($array_data, JSON_PRETTY_PRINT);

        if(file_put_contents('json/employee-data.json', $json_data)) {
            echo "<h3>Successfully save data in json file</h3>";
        } else {
            echo "json file doesn't exist";
        }
    } else {
        "Failed to save the data in json file";
    }

} else {
    echo "<h3>All fields are required</h3>";
}

?>


<!--
 ///////////////////   file_get_contents()   //////////////
The PHP function file_get_contents() is used to read an entire file into a string. It's a versatile tool that can be used for a variety of tasks, including: Reading local files, Retrieving data from URLs, Parsing JSON responses, and Customizing requests with advanced options. -->