<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP ajax pagination</title>
</head>

<body>
    <div id="id-main">
        <div id="header">
            <h1>PHP & Ajax Pagination</h1>
        </div>
    </div>

    <div id="table-data">

    </div>

    <script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {            
            function loadTable(page) {
                $.ajax({
                    url: "ajax-pagination.php", 
                    type: "POST",
                    data: {
                        page_no: page
                    }, 
                    success: function (data) {
                        $("#table-data").html(data); 
                    }
                });
            }

            loadTable(1); 

            // Pagination click event
            $(document).on("click", "#pagination a", function (e) {
                e.preventDefault(); // Prevent default anchor behavior
                var page_id = $(this).attr("id"); // Get the page number from the clicked link
                loadTable(page_id); // Load the data for the selected page
            });
        });
    </script>
    </script>
</body>

</html>