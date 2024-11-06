<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP and Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <table id="main" border="0" cellpadding="0" class="ms-3 mt-3">
        <tr>
            <td id="header">
                Auto complete Textbox
                with PHP & ajax<br>
            </td>
        </tr>
        <tr>
            <br>
            <td id="table-form">
                <form action="" id="search-form">
                   <div id="autocomplete">
                        <input type="text" id="country-box" class="form-control" placeholder="Enter country" autocomplete="off">
                        <div id="countryList"></div>
                   </div>
                   <br>
                   <input type="submit" value="Submit" class="form-control" id="search-btn">
                </form>
            </td>
        </tr>
        <tr>
            <td id="table-data"></td>
        </tr>
    </table>
    <script type="text/javascript" src="../js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#country-box").keyup(function() {
                var country = $(this).val();

                if(country != '') {
                    $.ajax({
                        url : 'load-country.php',
                        method : 'POST',
                        data : {country: country},
                        success : function(data){
                            $("#countryList").fadeIn("fast").html(data);
                        }
                    });
                } else {
                    $("#countryList").fadeOut();
                    $("#table-data").html("");
                }
            });

            $(document).on('click','#countryList li', function() { //click event will work on li & then function call
                $("#country-box").val($(this).text());
                $("#countryList").fadeOut();
            });

            $("#search-btn").on('click',function(e){
                e.preventDefault();

                var country = $('#country-box').val();

                if(country == "") {
                    alert("Please enter the country name");
                    $("#table-data").html("");
                } else {
                    $.ajax({
                        url : 'load-table.php',
                        method : 'POST',
                        data : {country: country},
                        success : function(data){
                            $("#table-data").html(data);
                        }
                    })
                }
            });
        });
    </script>
</body>
</html>