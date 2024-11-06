
<!-- craete the json file using the form  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create json file using the form data </title>
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>Save form data in the json file</h1>
        </div>

        <div id="table-data">
            <form action="save-form.php" id="submit_form" method="post">
                <table width="100%" cellpadding="10px">
                    <tr>
                        <td width="150px"><label for="">Name</label></td>
                        <td><input type="text" name="fullname" id="fullname"></td>
                    </tr>
                    <tr>
                        <td width="150px"><label for="">Age</label></td>
                        <td><input type="number" name="age" id="age"></td>
                    </tr>
                    <tr>
                        <td width="150px"><label for="">City</label></td>
                        <td><input type="text" name="city" id="city"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Submit" name="submit" id="submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>