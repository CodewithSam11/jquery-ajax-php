<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulk delete or multiple delete using the Checkboxes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>
<body>
    <div id="main">
        <div id="header">
            <h2>Bulk delete or multiple delete using the Checkboxes</h2>
        </div>
        <div id="sub-header">
            <button id="delete-btn" class="btn btn-danger">Delete</button>
        </div>
        <div id="table-data">

        </div>

        <div id="error-message"></div>
        <div id="success-message"></div>
    </div>
    <script type="text/javascript" src="../js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            function loadData(){
                $.ajax({
                    url : 'load-data.php',
                    tyepe : 'POST',
                    success : function(data) {
                        $("#table-data").html(data);
                    } 
                })
            }
            loadData();

            $("#delete-btn").on("click", function(){
                var id = [];

                $(":checkbox:checked").each(function(key){
                    id[key] = $(this).val();
                });
                    // console.log(id);
                    if(id.length === 0){
                        alert("Please select at least one checkbox");
                    } else {
                        if (confirm("Do you really want to delete these records?")) {
                            $.ajax({
                            url : "delete-data.php",
                            data : {id : id},
                            type: "POST",
                            success : function(data) {
                                // console.log(data);  

                                if (data == 1) {
                                    $("#success-message").html("Data deleted successfully").addClass('text-success').slideDown();
                                    $("#error-message").slideUp();
                                    loadData();
                                } else {
                                    $("#error-message").html("Can't delete data").addClass('text-danger').slideDown();
                                    $("#success-message").slideUp();
                                }
                            },
                        });
                    }
                }
                
            });
        });
    </script>
</body>
</html>