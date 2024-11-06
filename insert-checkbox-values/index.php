<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert the values using the checkbox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <div id="main">
        <div id="header">
            <h2>Insert checkbox values in the Database <br>using the PHP & ajax</h2>
        </div>
        <div id="content">
            <form action="" id="worker-form">
                <table>
                    <tr>
                        <td><label>Name</label></td>
                        <td><input type="text" name="" id="first_name" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td valign="top"><label>Languages : </label></td>
                        <td>
                            <input type="checkbox" class="lang" value="PHP" name="" id=""> PHP<br>
                            <input type="checkbox" class="lang" value="Python" name="" id=""> Python<br>
                            <input type="checkbox" class="lang" value="C++" name="" id=""> C++<br>
                            <input type="checkbox" class="lang" value="Java" name="" id=""> Java<br>
                            <input type="checkbox" class="lang" value="C#" name="" id=""> C#<br>
                            <input type="checkbox" class="lang" value="Ruby" name="" id=""> Ruby<br>
                            <input type="checkbox" class="lang" value="Javascript" name="" id=""> Javascript<br>
                            <input type="checkbox" class="lang" value="Swift" name="" id=""> Swift<br>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button id="submit">Submit</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="../js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#worker-form").submit(function (e) {
                e.preventDefault();

                var fname = $("#first_name").val();
                var languages = [];

                $(".lang").each(function () {
                    if ($(this).is(":checked")) {
                        languages.push($(this).val());
                    }
                });
                languages = languages.toString();

                if (fname != '' && languages.length !== 0) {
                    $.ajax({
                        url: "insert-data.php",
                        type: "POST",
                        data: {
                            name: fname,
                            languages: languages
                        },
                        success: function (data) {
                            $("worker-form").trigger("reset");
                            alert(data);
                        }
                    });
                } else {
                    alert("Please fill the required form fields");
                }
            });
        });
    </script>
</body>

</html>