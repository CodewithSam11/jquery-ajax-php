<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Load recods using the Ajax by selectbox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <table id="main" border="0" cellpadding="0" class="ms-3 mt-3">
        <tr>
            <td id="header">
                Load Records using the selectbox <br>
                with PHP & ajax<br>
            </td>
        </tr>
        <tr>
            <td id="table-form">
                <form action="">
                    Select City : <select name="" id="country-box" class="form-control">
                        <option value="">Select Country</option>
                    </select>
                </form>
            </td>
        </tr>
        <tr>
            <td id="table-data"></td>
        </tr>
    </table>
    <script type="text/javascript" src="../js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $.ajax({
                url : 'load-country.php',
                type : "POST",
                dataType : "json",
                success : function(data){
                    $.each(data, function(key, value) {
                        $("#country-box").append("<option value='" +value.country+ "'>" + value.country + "</option>");
                    });
                },
                error: function(xhr, status, error) {
                console.error("Error fetching data:", error); // Error handling
                }
            });

            // load table data
            $("#country-box").change(function() {
                var country = $(this).val();

                if(country == "") {
                    $("#table-data").html("");
                } else {
                    $.ajax({
                        url : "load-table.php",
                        type : "POST",
                        data : {country : country},
                        success : function(data) {
                            $("#table-data").html(data);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>