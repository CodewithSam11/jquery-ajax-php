<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag and drop using the Ajax</title>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <div id="main">
        <div id="header">
            <h2 class="ms-1">Drag and drop files using the DropZone with the PHP</h2>
        </div>
        <div id="content" class="col-md-6 ms-5">
            <form action="" class="dropzone" id="file_upload"></form>
            <button id="upload-btn" class="btn btn-primary mt-2 ms-3">Upload</button>
        </div>
        
    </div>
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#file_upload",{
            url: "upload.php",
            parallelUploads : 3,
            uploadMultiple : 3,
            acceptedFiles: '.png,.jpg,.jpeg',
            autoProcessQueue : false, // it means file will not upload after just the drag & drop if user click on upload then it will upload.
            success : function(file, response) {
                if(response ==  true) {
                    $("#content .message").hide();
                    $("#content").append('<div class="bg-success text-white message mt-2">Images uploaded successfully.</div>');
                } else {
                    $("#content").append('<div class="bg-danger text-light mt-2">Images can\'t uploaded.</div>');
                }
            }   
        });

        $("#upload-btn").click(function(){
                myDropzone.processQueue();  
        });
    </script>
</body>
</html>