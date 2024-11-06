<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax image upload and remove</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <style>
        #preview img{
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div id="main">
        <div id="header">

        </div>
        <div id="content" class="mt-3">
            <form action="" id="submit-form" class="ms-3">
                <div class="form-group col-md-3 mb-3">
                    <label for="">Select Image</label>
                    <input type="file" name="file" id="upload-file" class="form-control">
                    <span class="small text-primary">Allowed File Type - jpg, jpeg, png, gif</span>
                </div>
                <input type="submit" name="upload-button" id="upload-btn" value="Upload" class="btn btn-primary">
            </form>
            <br>
            <div id="preview" class="d-none">
                <h3 class="bg-success text-light">Image Preview</h3>
                <div id="image-preview"></div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#submit-form").on("submit",function(e){
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url : "upload.php",
                    type: "POST",
                    data: formData,
                    contentType : false, // that means same like , multipart/formData
                    processData : false, //mostly we send data in form of string or object but there is different so, default value is true
                    success : function(data) {
                        console.log("hello");
                        $("#preview").removeClass('d-none').addClass('d-block');
                        $("#image-preview").html(data);
                        $("#upload-file").val('');
                    } 

                });
            });

            // Delete image code here
            $(document).on("click","#delete-btn",function() {
                if (confirm("Are you sure you want to delete this image?")) {
                    var path = $("#delete-btn").data("path"); // special data atribute used in upload.php

                    $.ajax({
                        url : 'delete.php',
                        type : "POST",
                        data : { path : path },
                        success : function(data) {
                            if(data != "") {
                                $("#preview").addClass('d-none').removeClass('d-block');
                                $("#image-preview").html(''); 
                            }
                        } 
                    })
                }
            });
        });
    </script>

</body>
</html>