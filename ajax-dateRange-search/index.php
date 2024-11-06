<!-- jquery-ui    library is used to build this -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Date Range Search using the date Range picker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>Search in Date Range <br> using PHP & Ajax</h1>
            <br>
        </div>
        <div id="date-wrap" class="d-flex col-md-8">
            <label for="" class="fw-bold ms-2">From</label>
            <input type="text" name="" id="from" autocomplete="off" class="form-control ms-3">
            <label for="to" class="ms-2 fw-bold">To</label>
            <input type="text" name="" id="to" autocomplete="off" class="form-control ms-3">
        </div>
        <br>
        <div id="content" class="">
            <table id="table-data" width="100%" cellpadding="10px" border="0">
                <thead>
                    <th width="50px" class="bg-primary text-white">Id</th>
                    <th class="bg-primary text-white">Name</th>
                    <th class="bg-primary text-white" width="90px">City</th>
                    <th class="bg-primary text-white">DOB</th>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(function () {
            var minD;
            var maxD;
            var dateFormat = "mm/dd/yy",
                from = $("#from")
                .datepicker({
                    changeMonth: true,
                    changeYear: true,
                    numberOfMonths: 1,
                    yearRange: "1990:2005"
                })
                .on("change", function () {
                    to.datepicker("option", "minDate", getDate(this));
                    minD = $(this).val();
                    if(minD !== "" && maxD !== "") {
                        loadTable(minD, maxD);
                    }
                }),
                to = $("#to").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    numberOfMonths: 1,
                    yearRange: "1990:2005"
                })
                .on("change", function () {
                    from.datepicker("option", "maxDate", getDate(this));
                    maxD = $(this).val();
                    if(minD !== "" && maxD !== "") {
                        loadTable(minD, maxD);
                    }
                });

            function getDate(element) {
                var date;
                try {
                    date = $.datepicker.parseDate(dateFormat, element.value);
                } catch (error) {
                    date = null;
                }
                return date;
            }

            function loadTable(date1, date2) {
                $.ajax({
                    url : 'get-data.php',
                    type : "POST",
                    data : { date1 : date1, date2 : date2},
                    success: function(response) {
                        $("#table-data tbody").html(response);
                    } 
                });
            }
            loadTable(minD, maxD);
        });
    </script>
</body>

</html>