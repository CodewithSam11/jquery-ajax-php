<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data in DB using the PHP</title>
    <style>
     #modal {
    background: rgba(0,0,0,0.7);
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 100;
    display: flex;
    justify-content: center;
    align-items: center; /* Center the modal vertically */
    display: none;
}

#modal h2 {
    margin: 0 0 15px;
    padding-bottom: 10px;
    border-bottom: 1px solid #000;
}

#modal-form {
    background: #fff;
    width: 40%;
    padding: 15px;
    border-radius: 4px;
    position: relative; /* Ensure close button stays inside the modal */
}

#close-btn {
    background: red;
    color: white;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 50%;
    position: absolute;
    top: -1px;
    right: -10px; /* Changed to right for better positioning */
    cursor: pointer;
    text-align: center;
}
    </style>
</head>

<body>
    <table id="main" border="0" cellspacing="0">
        <tr>
            <td>
                <h1 id="header">Add records with php and ajax</h1>
            </td>
        </tr>
        <div id="search-bar">
            <label for="search">Search :</label>
            <input type="text" id="search" autocomplete="off">
        </div>
        <tr>
            <td id="table-form">
                <form id="addForm">
                    First Name: <input type="text" id="fname" name="fname">&nbsp;&nbsp;&nbsp;&nbsp;
                    Last Name: <input type="text" id="lname" name="lname">
                    <input type="submit" id="save-button" value="Save">
                </form>
            </td>
        </tr>
        <tr>
            <td id="table-data">

            </td>
        </tr>
    </table>
    
    <div id="error-message"></div>
    <div id="success-message"></div>

    <div id="modal">
        <div id="modal-form">
            <h2>Edit Form</h2>
            <div id="close-btn">X</div>
            <table cellpadding="10px" width="100%">
               
            </table>
            
        </div>
    </div>

    <script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            function loadTable() {
                $.ajax({
                    url: "ajax-load.php",
                    type: "GET",
                    data: {},
                    success: function (data) {
                        $("#table-data").html(data);
                    }
                });
            }
            loadTable();

            ///// insert code here //////////////
            $("#save-button").on("click", function (e) {
                e.preventDefault();
                var fname = $("#fname").val();
                var lname = $("#lname").val();

                if (fname == "" || lname == "") {
                    $("#error-message").html("All fields are required.").slideDown().css("color",
                        "red");
                    $("#success-message").slideUp();
                } else {
                    $.ajax({
                        url: "ajax-insert.php",
                        type: "POST",
                        data: {
                            first_name: fname,
                            last_name: lname
                        },
                        success: function (data) {

                            if (data == 1) {
                                loadTable();
                                $("#addForm").trigger("reset");
                                $("#success-message").html("Data inserted successfully.")
                                    .slideDown();
                                $("#error-message").slideUp();
                            } else {
                                $("#error-message").html("can't save records.").slideDown();
                                $("#success-message").slideUp();
                            }
                        }

                    });
                }


            });

            // delete button starts here

            $(document).on("click", ".delete-btn", function () {
                if (confirm("Do you really want to delete this record?")) {

                
                    var studentId = $(this).data('id');
                    var element = this;
                
                $.ajax({
                    url: "ajax-delete.php",
                    type: "POST",
                    data: {
                        id: studentId
                    },
                    success: function (data) {

                        if (data == 1) {
                            $(element).closest("tr").fadeOut();
                            $("#success-message").html("Data deleted successfully.")
                                .slideDown();
                            $("#error-message").slideUp();
                        } else {
                            $("#error-message").html("can't delete record.").slideDown();
                            $("#success-message").slideUp();
                        }
                    }
                });
            }
            });

            // edit button satrts here
            $(document).on("click", ".edit-btn", function () {
                $("#modal").show();
                var studentId = $(this).data("eid");

                $.ajax({
                    url: "load-update-form.php",
                    type: "POST",
                    data: {id: studentId},
                    success: function(data) {
                        $("#modal-form table").html(data);
                    }
                })
            });

            // close buttons here
            $("#close-btn").on("click", function () {
                $("#modal").hide();
            });

            // Save update form
            $(document).on("click", "#edit-submit", function () {
                var stuId = $("#edit-id").val();
                var fname = $("#edit-fname").val();
                var lname = $("#edit-lname").val();

                $.ajax({
                    url: "ajax-update-form.php",
                    type: "POST",
                    data: {id : stuId, first_name: fname, last_name: lname},
                    success: function(data) {
                        if (data == 1) {
                            $("#modal").hide();
                            loadTable(); 
                        }
                    }
                })
            });

            //Live search 
            $("#search").on("keyup", function () {
                var search_term = $(this).val();

                $.ajax({
                    url: "ajax-live-search.php",
                    type: "POST",
                    data: {search: search_term},
                    success: function(data) {
                        $("#table-data").html(data);
                    }
                })
            });

        });
    </script>
</body>

</html>