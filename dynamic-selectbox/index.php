<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dependent selectbox using the AJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <div id="main">
        <div id="header">
            <h1 class="ms-3">Dynamic Dependent Select Box in<br>PHP & jquery Ajax</h1>
        </div>
        <div id="content">
            <form action="">
                <label class="ms-3 mt-3">Country :</label>
                <div class="col-md-3 ms-3">
                    <select name="" id="country" class="form-control">
                        <option value="">Select a Country</option>
                    </select>
                </div>
                <br><br>
                <label class="ms-3 mt-3">State :</label>
                <div class="col-md-3 ms-3">
                    <select name="" id="state" class="form-control">
                        <option value="">Select a State</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="../js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            function loadData(type, category_id) {
                $.ajax({
                    url : 'load-cs.php',
                    type: 'POST',
                    data: {type: type, id : category_id},
                    success: function(data) {
                        if (type == "stateData") {
                            $("#state").html(data);
                        } else {
                            $("#country").append(data);
                        }
                        
                    }
                });
            }
            loadData();
            $("#country").on("change", function() {
                var country = $("#country").val();

                if (country != "") {
                    loadData("stateData", country);
                }
                else {
                    $("#state").html("");
                }                
            })
        })
    </script>
</body>

</html>