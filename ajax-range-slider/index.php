<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax range slider in PHP</title>
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div id="header">
        <h1>Search with Range Slider <br> using the PHP & Ajax</h1>
    </div>
    <div id="slider-wrap">
        <div>
            <label class="mb-3">Age Between:</label>
            <span id="age"></span>
        </div>
        <div id="slider" class="mb-3 col-md-6"></div>
    </div>
    <div id="content">
        <table id="table-data" border="0" width="80%" >
            <thead>
                <th width="50px">Id</th>
                <th width="80px">Name</th>
                <th width="50px">Age</th>
                <th width="120px">City</th>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- <script src="js/jquery-ui.min.js"></script> -->
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>

    <script>
        $(document).ready(function() {
            var v1 = 15;
            var v2 = 25;
            $( "#slider" ).slider({
                range: true,
                min: 13,
                max: 30,
                values: [v1, v2],
                slide: function(event, ui){
                    $("#age").html( ui.values[0] + " - " + ui.values[1]);
                    v1 = ui.values[0];
                    v2 = ui.values[1];
                    loadTable(v1, v2)
                    
                }
            });
            $("#age").html( $("#slider").slider("values",0) + " - " + $("#slider").slider("values",1));
            function loadTable(range1, range2) {
            $.ajax({
                url : "get-data.php",
                type : "POST",
                data : {range1 : range1, range2 : range2},
                success : function(data) {
                    $("#table-data tbody").html(data);
                } 
            })
        }
        loadTable(v1,v2);
        });
    </script>
</body>
</html>