<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP ajax pagination</title>
</head>

<body>
    <div id="main">
        <div id="header">
            <h1>PHP & Ajax Pagination</h1>
        </div>
    </div>

    <div id="table-data">
        <table border="1" id="loadData" width="100%" cellspacing="0" cellpadding="10px">
            <tr>
                <th>Id</th>
                <th>Name</th>
            </tr>
           
        </table>
    </div>

    <script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        function loadTable(page) {
            $.ajax({
                url: "load-more.php",
                type: "POST",
                data: {page_no : page},
                success: function(data) {
                    if (data) {
                    $("#pagination").remove();
                    $("#loadData").append(data);
                    } else {
                        $("#ajaxbtn").html("Finished");
                        $("#ajaxbtn").prop("disabled",true);
                    }
                }
            });
        }
        loadTable();

        $(document).on("click","#ajaxbtn", function(){
            $("#ajaxbtn").html("Loading...")
            var pid = $(this).data('id')  /// i hav8e used the dynamic data-id on the load-more.php
            loadTable(pid);
        });
      });
    </script>
    </script>
</body>

</html>