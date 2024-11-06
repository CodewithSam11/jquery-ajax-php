<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table id="main" border="0" cellspacing="0">
        <tr>
            <td id="header">
                <h1>Php with Ajax </h1>
            </td>
        </tr>
        <tr>
            <td>
                <input type="button" id="load-button" value="Load Data">
            </td>
        </tr>
        <tr>
            <td id="table-data">
                <table border="1" width="100%" cellspacing="0" cellpadding="10px">
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                    </tr>
                    <tr>
                        <td align="center">1</td>
                        <td>Yahoo Baba</td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>

    <script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#load-button").on("click",function(){
                $.ajax({
                    url: 'ajax-load.php',
                    type: 'POST',
                    success: function (data) {
                        $("#table-data").html(data);
                    }
                });
            });
        });
    </script>
</body>
</html>