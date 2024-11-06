<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using the JSON encode function</title>
</head>
<body>
    <!----- json_encode is used to convert the array into the json object --------->
    <div id="main">
        <div id="header">
            <h1>Json is used to convert the array into Json object</h1>
        </div>

        <div id="load-data">
            <table id="load-table" border="1" cellpadding="10px" width="100%">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Country</th>
                </tr>
            </table>
        </div>
    </div>

    <script type="text/javascript" src="../js/jquery-3.7.1.min.js"></script>
    <script>
    //    $.getJSON(
    //     "fetch-json.php",
    //     function(data) {
    //         $.each(data, function(key, value){
    //             $("#load-data").append(value.id + " " + value.name + " "+value.age + "<br>");
    //         });
    //     } 
    //    );
    // We can also using the ajax so the given example below...
        $.ajax({
        url: "fetch-json.php",
        type: 'GET',
        data: {id : 2}, // giving static but i can give by form and it will fetch only particular record
        dataType:  "JSON", // default format is text or xml so i have used the dataType otherwise it gives an error
        success: function(data) {
            $.each(data, function(key, value){
                $("#load-table").append("<tr><td>" + value.id + "</td><td>" + value.name + "</td><td>" + value.age + "</td><td>" + value.country + "</td></tr>");
            });
        } 
       });
    </script>
</body>
</html>